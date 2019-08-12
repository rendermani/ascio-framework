<?php
 namespace test;
 require(__DIR__."/../vendor/autoload.php");
 use Illuminate\Database\Capsule\Manager as Capsule;
 use Illuminate\Database\Eloquent\Model;
use ascio\lib\Ascio;


class Domain extends Model {
     protected $table = "Domain";
     protected $primaryKey = "_id";
     public function registrant () {
        return $this->hasOne('test\Registrant','_id','Registrant');
    }
 }

 class Registrant extends Model {
    protected $table = "Registrant";
    protected $primaryKey = "_id";
    public function domain () {
        return $this->belongsTo('test\Domain','_id','Registrant');
    }

}
Ascio::setConfig();

$capsule = new Capsule;     
$capsule->addConnection((array) Ascio::getConfig()->get("db"));            
$capsule->setAsGlobal();
$capsule->bootEloquent(); 
/*
$domain = new Domain();
$domain->name =  "test-mani.de";

$registrant = new Registrant;
$registrant->name="mani";

$domain->registrant = $registrant;
$domain->push();
*/

$registrant = new Registrant;
$registrant->name="ml";
$registrant->save();

$domain = new Domain();
$domain->name =  "test-mani.de";
$registrant->domain()->associate($registrant);
$registrant->save();
/*
$domain2 = Domain::find($domain->getKey());
$domain2->registrant->name="ml2";
$domain2->push();
*/
