<?php
namespace ascio\dns\importer;

use ascio\dns\Record;
use ascio\dns\RedirectionType;
use ascio\dns\WebForward;
use ascio\dns\Zone;
use ascio\lib\Ascio;

class WebForwarders extends Forwarders {
    public $type = "ascio\\dns\\WebForward";
    public $deleteRecordTypes = ["A","CNAME"];
    public function __construct($file)
    {
        $forwardersFile = file_get_contents($file);
        foreach( explode("\n",$forwardersFile) as $line) {
            $arr = explode(" ",$line); 
            $fw = new WebForward(); 
            $fw->setRedirectionType($arr[2]=="mrd" ? RedirectionType::Frame : RedirectionType::Permanent );
            $fw->setSource($arr[0]);
            $fw->setTarget($arr[1]);
            $this->forwarders[] = $fw;
        }
    }
    protected function deleteRecords(Record $forwarder, Zone $zone)  {
        foreach($zone->getRecords() as $record)  {
           if(
                $record->getSource() == $forwarder->getSource() &&
                in_array(get_class($record), ["ascio\\dns\\CNAME","ascio\\dns\\A"])                    
               ) {
                  Ascio::getClientDns()->deleteRecord($record->getId());
               }
        }
   }
}