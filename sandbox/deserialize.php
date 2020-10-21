<?php

use ascio\lib\Ascio;
use ascio\lib\LogLevel;
use ascio\logic\SyncPayload;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Str;

require(__DIR__."/../vendor/autoload.php");
Ascio::setConfig();


class MysqlConnector {
    function save (SyncPayload $payload) {
        Ascio::setConfig($payload->getConfig());
        $obj = $payload->getObject();    
        try {
            echo $obj->log(LogLevel::Info,Str::ucfirst($payload->action).", ID:".$payload->object->db()->getKey());   
            if($payload->isUpdate()) {
                try {
                    $type = get_class($obj);
                    $oldObject = new $type;
                    $oldObject->getById($payload->getObject()->db()->getKey());
                } catch (ModelNotFoundException $e) {
                    echo $obj->log(LogLevel::Error,Str::ucfirst($payload->action).", Not found: ".$payload->object->db()->getKey());  
                    throw new Exception("Object with the _id ".$payload->object->db()->getKey(). " not found." );
                }            
                $oldObject->set($payload->getChanges());
                $oldObject->db()->syncToDb();         
            } else {
                $obj->db()->syncToDb(); 
            }
        
            
        } catch (Exception $e) {
            if(strpos($e->getMessage(),'Duplicate entry') === false) {
                echo $e->getMessage();
                echo $e->getTraceAsString();
            
            } else {
                echo "objectId: ".$payload->object->db()->getKey();
                echo $obj->log(LogLevel::Warn,Str::ucfirst($payload->action).": Duplicate entry.");   
            }        
        }
    }

}

$json = '{
    "changes": null,
    "incremental": true,
    "id": "ascio.object.5f7b9fbb8eba06.42474903",
    "action": "update",
    "blocking": null,
    "status": "Completed",
    "workflowStatus": "Completed",
    "objectType": "ascio\\v3\\OrderInfo",
    "class": "ascio\\logic\\SyncPayload",
    "object": {
        "Status": "Completed",
        "Created": {
            "date": "2020-10-05 22:35:39.000000",
            "timezone_type": 3,
            "timezone": "UTC"
        },
        "OrderRequest": {
            "Type": "Register",
            "Period": 1,
            "Domain": {
                "Name": "testme-5f7b9fb862fa8.com",
                "Handle": "TESTME5F36315",
                "Owner": {
                    "Handle": "DOEJANE19718",
                    "FirstName": "Jane",
                    "LastName": "Doe",
                    "Address1": "Address1Test",
                    "City": "CityTest",
                    "PostalCode": "OX4 6LB",
                    "CountryCode": "GB",
                    "Phone": "+45.123456789",
                    "Email": "ml@webrender.de",
                    "DbAttributes": {
                        "_parent_id": "ascio.object.5f7b9fd9a0b229.56811393",
                        "_part_of_order": false,
                        "_parent_db_type": "ascio\\db\\v3\\DomainDb",
                        "_parent_type": "ascio\\v3\\Domain",
                        "_environment": "testing",
                        "_account": "cvkd148",
                        "_type": "ascio\\v3\\Registrant",
                        "_config": "default",
                        "_id": "ascio.object.5f7b9fd9a0c881.69761847"
                    }
                },
                "Admin": {
                    "Handle": "JD30488",
                    "FirstName": "John",
                    "LastName": "Doe",
                    "Address1": "Address1Test",
                    "City": "CityTest",
                    "PostalCode": "888349",
                    "CountryCode": "DK",
                    "Phone": "+45.123456789",
                    "Email": "ml@webrender.de",
                    "DbAttributes": {
                        "_parent_id": "ascio.object.5f7b9fd9a0b229.56811393",
                        "_part_of_order": false,
                        "_parent_db_type": "ascio\\db\\v3\\DomainDb",
                        "_parent_type": "ascio\\v3\\Domain",
                        "_environment": "testing",
                        "_account": "cvkd148",
                        "_type": "ascio\\v3\\Contact",
                        "_config": "default",
                        "_id": "ascio.object.5f7b9fd9a0df46.04842812"
                    }
                },
                "Tech": {
                    "Handle": "JD98380",
                    "FirstName": "John",
                    "LastName": "Doe",
                    "Address1": "Address1Test",
                    "City": "CityTest",
                    "PostalCode": "888349",
                    "CountryCode": "DK",
                    "Phone": "+45.123456789",
                    "Email": "ml@webrender.de",
                    "DbAttributes": {
                        "_parent_id": "ascio.object.5f7b9fd9a0b229.56811393",
                        "_part_of_order": false,
                        "_parent_db_type": "ascio\\db\\v3\\DomainDb",
                        "_parent_type": "ascio\\v3\\Domain",
                        "_environment": "testing",
                        "_account": "cvkd148",
                        "_type": "ascio\\v3\\Contact",
                        "_config": "default",
                        "_id": "ascio.object.5f7b9fd9a0f455.70205785"
                    }
                },
                "Billing": {
                    "Handle": "JD46182",
                    "FirstName": "John",
                    "LastName": "Doe",
                    "Address1": "Address1Test",
                    "City": "CityTest",
                    "PostalCode": "888349",
                    "CountryCode": "DK",
                    "Phone": "+45.123456789",
                    "Email": "ml@webrender.de",
                    "DbAttributes": {
                        "_parent_id": "ascio.object.5f7b9fd9a0b229.56811393",
                        "_part_of_order": false,
                        "_parent_db_type": "ascio\\db\\v3\\DomainDb",
                        "_parent_type": "ascio\\v3\\Domain",
                        "_environment": "testing",
                        "_account": "cvkd148",
                        "_type": "ascio\\v3\\Contact",
                        "_config": "default",
                        "_id": "ascio.object.5f7b9fd9a10bb9.41332977"
                    }
                },
                "NameServers": {
                    "NameServer1": {
                        "CreDate": {
                            "date": "0001-01-01 00:00:00.000000",
                            "timezone_type": 3,
                            "timezone": "UTC"
                        },
                        "Handle": "NSASCION394",
                        "HostName": "ns1.ascio.net",
                        "DbAttributes": {
                            "_parent_id": "ascio.object.5f7b9fd9a12167.30268181",
                            "_part_of_order": false,
                            "_parent_db_type": "ascio\\db\\v3\\NameServersDb",
                            "_parent_type": "ascio\\v3\\NameServers",
                            "_environment": "testing",
                            "_account": "cvkd148",
                            "_type": "ascio\\v3\\NameServer",
                            "_config": "default",
                            "_id": "ascio.object.5f7b9fd9a13622.42674446"
                        }
                    },
                    "NameServer2": {
                        "CreDate": {
                            "date": "0001-01-01 00:00:00.000000",
                            "timezone_type": 3,
                            "timezone": "UTC"
                        },
                        "Handle": "NSASCION397",
                        "HostName": "ns2.ascio.net",
                        "DbAttributes": {
                            "_parent_id": "ascio.object.5f7b9fd9a12167.30268181",
                            "_part_of_order": false,
                            "_parent_db_type": "ascio\\db\\v3\\NameServersDb",
                            "_parent_type": "ascio\\v3\\NameServers",
                            "_environment": "testing",
                            "_account": "cvkd148",
                            "_type": "ascio\\v3\\NameServer",
                            "_config": "default",
                            "_id": "ascio.object.5f7b9fd9a14c06.94261100"
                        }
                    },
                    "DbAttributes": {
                        "_parent_id": "ascio.object.5f7b9fd9a0b229.56811393",
                        "_part_of_order": false,
                        "_parent_db_type": "ascio\\db\\v3\\DomainDb",
                        "_parent_type": "ascio\\v3\\Domain",
                        "_environment": "testing",
                        "_account": "cvkd148",
                        "_type": "ascio\\v3\\NameServers",
                        "_config": "default",
                        "_id": "ascio.object.5f7b9fd9a12167.30268181"
                    }
                },
                "DbAttributes": {
                    "_parent_id": "ascio.object.5f7b9fd9a09ce5.23902568",
                    "_part_of_order": false,
                    "_parent_db_type": "ascio\\db\\v3\\DomainOrderRequestDb",
                    "_parent_type": "ascio\\v3\\DomainOrderRequest",
                    "_environment": "testing",
                    "_account": "cvkd148",
                    "_type": "ascio\\v3\\Domain",
                    "_config": "default",
                    "_id": "ascio.object.5f7b9fd9a0b229.56811393"
                }
            },
            "DbAttributes": {
                "_status": "Completed",
                "_parent_id": "ascio.object.5f7b9fbb8eba06.42474903",
                "_part_of_order": false,
                "_parent_db_type": "ascio\\db\\v3\\OrderInfoDb",
                "_parent_type": "ascio\\v3\\OrderInfo",
                "_environment": "testing",
                "_account": "cvkd148",
                "_type": "ascio\\v3\\DomainOrderRequest",
                "_config": "default",
                "_id": "ascio.object.5f7b9fd9a09ce5.23902568"
            }
        },
        "LastUpdated": {
            "date": "2020-10-05 22:35:57.000000",
            "timezone_type": 3,
            "timezone": "UTC"
        },
        "CreatedBy": "CVKD148",
        "OrderStatusHistory": [
            {
                "State": "Received",
                "Date": {
                    "date": "2020-10-05 22:35:28.000000",
                    "timezone_type": 3,
                    "timezone": "UTC"
                }
            },
            {
                "State": "Validated",
                "Date": {
                    "date": "2020-10-05 22:35:29.000000",
                    "timezone_type": 3,
                    "timezone": "UTC"
                }
            },
            {
                "State": "PendingPostProcessing",
                "Date": {
                    "date": "2020-10-05 22:35:44.000000",
                    "timezone_type": 3,
                    "timezone": "UTC"
                }
            },
            {
                "State": "Completed",
                "Date": {
                    "date": "2020-10-05 22:35:46.000000",
                    "timezone_type": 3,
                    "timezone": "UTC"
                }
            }
        ],
        "DbAttributes": {
            "_part_of_order": false,
            "_status": "Completed",
            "_id": "ascio.object.5f7b9fbb8eba06.42474903",
            "_parent_id": null,
            "_type": "ascio\\v3\\OrderInfo",
            "_parent_type": null,
            "_parent_db_type": null
        }
    },
    "error": null,
    "objectName": null,
    "module": null,
    "config": "default",
    "api": "v3",
    "parameters": {
        "action": "update"
    }
}';

$payload = new SyncPayload();
//$payload->deserialize(json_decode($json));

dd(json_decode($json));