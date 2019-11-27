# Ascio-Framework
A php framework with docker to sync and connect to the ascio-api. Scalable, based on docker and kafka.

It makes make domain-management-processes easear like:
* Sync all data from ascio to the local databases in realtime. 
* Auto-Queue blocking orders
* Scalable architecture
* Consume the poll-queue with multiple orders
* Provide one $domain->update functions. Change data, update, and all orders will be queued
* Auto unlock-relock
* REST-API:  https://app.swaggerhub.com/apis/rendermani/Ascio-Framework/1.0.0$

## Installation
1. Clone repository: `git clone https://github.com/rendermani/ascio-framework.git ascio-framework`
2. `cd ascio-framework`
3. Run `bin/init.sh`
4. Set new passwords in the **.env**
5. Enter the ascio-credentials in **config/accounts/default.json**
## Initial database sync: ascio > local
At the beginning the database is empty. As Ascio-messages are sent, when something changes, an initial sync must be done at the beginning. The  sync-orders script syncs all orders and data that belongs to the orders, like Domains or SSL-Certificates. 
* make sure the installation is complete, and **default.json** contains valid creditials and environment
* run `bin/sync-orders.sh`
## Commands
* Init framework, create tables, build: `bin/init.sh`
* Initials sync orders: `bin/sync-orders.sh`
* Start: `bin/up.sh`
* Stop: `bin/down.sh`
* Restart framework: `bin/restart-framework.sh`
* View logs: `bin/logs.sh`
* Docker shell: `docker exec -it ascio-framework-php bash`
* Execute php: `docker exec ascio-framework-php php sandbox/my-example.php`
# Example Code
Examples are in the sandbox directory. Here some examples: 
## Autoqueue the next order when blocked
First a register-order is created and a domain is registered. By setting $submitOptions->setQueue(false) the order is directly submitted. After that a expire-order is sent. But as the asynchronous register orders is still running, the expire order is queued in the database and started when the register is completed.

```php
<?php
namespace ascio\lib;
use ascio\v2\TestLib;
use ascio\lib\SubmitOptions;
use SoapFault;

require(__DIR__."/../vendor/autoload.php");
// an alternative can be set here
Ascio::setConfig();
// get Test-Domain
$domain = TestLib::getDomain("testme-".uniqid().".com");
try {
    $submitOptions = new SubmitOptions();
    // direct submit if possible
    $submitOptions->setQueue(false);
    // register the domain
    $order = $domain->register($submitOptions);
    echo "Register: ". $domain->getDomainName()." Order: ".$order->getOrderId()." ".$order->db()->_id."\n";
    // as register is running, the expire order will be auto-queued
    $order = $domain->expire($submitOptions);
    echo "Expire: ". $domain->getDomainName()." Order: ".$order->getOrderId()." ".$order->db()->_id."\n";
} catch (SoapFault $e) {
    echo "error!";
    echo $e->getMessage();
    // view SOAP-Request
    echo ascio::getClientV2()->__getLastRequest();
} catch (AscioException $e) {
    // view Ascio-Errors and the result
    echo $e->getMessage();
    var_dump($e->getResult()->getCreateOrderResult());
}
```
## The update() method
Normally it's required to know the order-type when changing data. With the update method of the domain, it's possible to change any data and the order-type will be automatically selected. If multiple order-types are required, orders are queued like in the example above. 

Some order-types can change 2 different objects. Like the owner-change can change the registrant and the admin-contact in one request. In this case, the update method only uses necessary objects. 
```php
<?php
namespace ascio\lib;
use ascio\v2\TestLib;
use SoapFault;

require(__DIR__."/../vendor/autoload.php");
// an alternative can be set here
Ascio::setConfig();
// get Test-Domain
$domain = TestLib::getDomain("testme-".uniqid().".com");
try {
    // register the domain
    $order = $domain->register();
    echo "Register: ". $domain->getDomainName()." Order: ".$order->getOrderId()." ".$order->db()->_id."\n";
    // change domain data
    $domain->getAdminContact()->setFirstName("Manuel");
    $domain->getRegistrant()->setAddress1("new adr. 123");
    $domain->getNameServers()->createNameServer3()->setHostName("ns3.ascio.net");
    // 3 orders are created: Registrant_Details_Update, Contact_Update and Nameserver_Update
    $domain->update();
} catch (SoapFault $e) {
    echo "error!";
    echo $e->getMessage();
    // view SOAP-Request
    echo ascio::getClientV2()->__getLastRequest();
} catch (AscioException $e) {
    // view Ascio-Errors and the result
    echo $e->getMessage();
    var_dump($e->getResult()->getCreateOrderResult());
}
```
## Store data into databases

All data is auto-stored in the database. If data should be stored manually, please use ``$object->produce()`` to store data into all databases. This function should be use carefully, because data could get out of sync. 

## Read data from the database

Database can be read from any database. Objects like domains have a serialize and deserialize data. Please use ``$object->deserialize()`` to import data. And ``$object->serialize($data)`` or ``$object->toJson()`` to serialize.  

Here an example of retrieving data from the database:
```php
// get Domain by databaseId
$domain->db()->getById("myId");
// get Domain by ascio domain-handle
$domain->db()->getByHandle("DomainHandle");
// get Domain by domain-name
$domain->db()->getByName("myname.com");
// get Domain order by OrderId
$order->db()->getByOrderId();
// get Order by databaseId
$order->db()->getById("myId");
// get related tables: Domain, Registrant
$order->getDomain()->getRegistrant();
// custom lavarel-query 
$domain->db()->where("Status","Active")->first();
// custom query
$domain->db()->raw("select * from domains where Status = 'Active'");
```

## Example database connector
Database connectors listen on the Kafka-service and write data into the database. It's possible to include own connectors. Right now Redis and Couch are included as examples. This is the Redit-connector. 

The process of creating connectors is: 
* create the connector in the ``docker/docker-compose.yml``. Duplicate the redis-connector, and change the script-name to your file
* create the connector file
* ``bin/down.sh``
* ``bin/up.sh``

This is an example Redis connector which is in the services directory. 

```php
<?php 
namespace ascio\lib;
require(__DIR__."/../vendor/autoload.php");
use Illuminate\Support\Str;

\Predis\Autoloader::register();

$client = new \Predis\Client([
    'scheme' => 'tcp',
    'host'   => 'redis',
    'port'   => 6379,
]);

Consumer::object(function($payload) use($client) {
    Ascio::setConfig($payload->Config);
    $obj = $payload->object;
    $client->set($obj->db()->_id,$obj->toJson());
    echo $obj->getStatusSerializer()->console(LogLevel::Info,Str::ucfirst($payload->action));  
});
```
## Read order from the API
Reads an Order from the API. When reading from the API, data is automatically synced to all databases.
```php
<?php
use ascio\v2\Order;

require(__DIR__."/../vendor/autoload.php");
Ascio::setConfig();
$order = new Order();
$order->api()->getByOrderId("TEST561580");
```
## Read domain by handle from the API
Reads an Domain from the API. When reading from the API, data is automatically synced to all databases.
```php
<?php
use ascio\v2\Domain;
require(__DIR__."/../vendor/autoload.php");
Ascio::setConfig();
$domain = new Domain();
$domain->api()->getByHandle("TEST1234");
```
## Read domain by domain-name from the API
Reads an Domain from the API. When reading from the API, data is automatically synced to all databases.
```php
<?php
use ascio\v2\Domain;
require(__DIR__."/../vendor/autoload.php");
Ascio::setConfig();
$domain = new Domain();
$domain->api()->getByName("testmeee.com");
```
## Update data from the API
```php
$order = new Order();
$order->db()->getByOrderId("TEST561580");
$order->api()->get(); 

$domain = new Domain();
$domain->db()->getByName("test.de");
$domain->api()->get();
```
## Workflow with AutoUnlock

Sometimes locks can prevent updates. This can be an issue when updating thousands of domains, and a few fail because they are locked. They would need to be unlocked and relocked again, after all operations are finished. The AutoUnlock makes this process easier

### AutoUnlock before expiring (Delete_Lock)

```php
<?php
namespace ascio\lib;

use ascio\v2\Domain;
use ascio\v2\TestLib;


require(__DIR__."/../vendor/autoload.php");
Ascio::setConfig();

$domain = new Domain();
$domain->getByHandle("TESTME5D66885");
$wf = new Workflow($domain);
// if the orders of the workflow require and unlock it will be done before submitting the orders.
// After the orders are finished the relock will be restored if possible.
$wf->getSubmitOptions()->setAutoUnlock(true);
// add the expire order-object
$wf->addTask($domain->getOrderRequest()->expire());
// submit all orders
$wf->submit();
```
### AutoUnlock before update
This example is the same like the example above, only that the declarative way is used. Instead of adding a  ``$domain->getOrderRequest()->expire()`` task, a ``$domain->getUpdateOrders()`` task is added. There could be more changes like ``$domain->getRegistrant()->setName("Manuel L")`` and an OwnerChange would be created. And the UpdateLock released if necessary. 

```php
<?php
namespace ascio\lib;
use ascio\v2\TestLib;


require(__DIR__."/../vendor/autoload.php");
Ascio::setConfig();

$domain = TestLib::getDomain("testme-".uniqid().".com");
// register domain
$domain->register();
// set AutoRenew
$domain->getAutoRenew()->set(false);
$wf = new Workflow($domain);
// if the orders of the workflow require and unlock it will be done before submitting the orders.
// After the orders are finished the relock will be restored if possible.
$wf->getSubmitOptions()->setAutoUnlock(true);
$wf->addTasks($domain->getUpdateOrders());
// submit workflow
$wf->submit();
```