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
        return $this->belongsTo('test\Domain','Registrant','_id');
    }


}
Ascio::setConfig();

$capsule = new Capsule;     
$capsule->addConnection((array) Ascio::getConfig()->get("db"));            
$capsule->setAsGlobal();
$capsule->bootEloquent(); 


$domain = Domain::find(16);
var_dump($domain->name);
$name = $domain->registrant->name;
var_dump($name);

// belongsTo 

$registrant = Registrant::find(34);
var_dump($registrant->domain->name);

//$domain->registrant->name ="ml";
//$domain->registrant->save();