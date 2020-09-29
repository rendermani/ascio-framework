<?php
namespace ascio\lib;

use ascio\v2\Registrant;

require(__DIR__."/../vendor/autoload.php");
Ascio::setConfig("keysystems");
try {
    $registrant = new Registrant();
    $registrant->setName("Manuel Lautenschlager");
    $registrant->setAddress1("adr.1");
    $registrant->setPostalCode("8888");
    $registrant->setCity("Munich");
    $registrant->setCountryCode("DE");
    $registrant->setEmail("ml@webrender.de");
    $registrant->setPhone("+49.999922222");    
    $result = Ascio::getClientV2()->createRegistrant($registrant);
    echo($result->toJson()."\n");
    $handle = $result->getRegistrant()->getHandle();
    echo "Handle: $handle\n";
    $result = Ascio::getClientV2()->deleteRegistrant($handle);
    echo($result->toJson()."\n");
} catch (AscioException $e) {
   $result = $e->getResult()->init();
   var_dump($result->getDeleteRegistrantResult()->serialize());
   echo $e->debugSoap();
}

/*
 $criteria = new SearchCriteria();
 $clauses = $criteria->createClauses();
 $clauses->addClause(new Clause())
    ->setAttribute("OwnerEntityHandle")
    ->setOperator(SearchOperatorType::Is)
    ->setValue("FURDUIDI23457");
 $result = Ascio::getClientV2()->searchDomain($criteria);
 var_dump($result->serialize());
 echo ($criteria->toJson());

 */