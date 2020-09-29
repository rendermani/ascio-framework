<?php
namespace ascio\dns\importer;

use ascio\dns\MailForward;
use ascio\dns\Record;
use ascio\dns\Zone;
use ascio\lib\Ascio;

class MailForwarders extends Forwarders {
    public $type = "ascio\\dns\\MailForward";
    public function __construct($file)
    {
        $forwardersFile = file_get_contents($file);
        foreach( explode("\n",$forwardersFile) as $line) {
            $arr = explode(" ",$line); 
            $fw = new MailForward(); 
            $fw->setSource($arr[0]);
            $fw->setTarget($arr[1]);
            $this->forwarders[] = $fw;
        }
    }
    protected function deleteRecords(Record $forwarder, Zone $zone)  {
        foreach($zone->getRecords() as $record)  {
           if(get_class($record) == $this->type) {
                  Ascio::getClientDns()->deleteRecord($record->getId());
               }
        } 
   }
    
}
