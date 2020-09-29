<?php
namespace ascio\dns\importer;

use ascio\dns\ArrayOfRecord;
use ascio\dns\Record;
use ascio\dns\Zone;
use ascio\lib\Ascio;
use ascio\lib\AscioException;

abstract class Forwarders  {
    public $forwarders =[];
    /**
     * @var Zones $zones
     */
    public $type;
    public $deleteRecordTypes = [];
    function endsWith($haystack, $needle)
    {
        return strrpos($haystack, $needle) === strlen($haystack)-strlen($needle);
    }
    public function updateForwarders(Zone $zone)  {
        $forwarders = [];
        foreach($this->forwarders as $forwarder) {
            $sourceDomain = explode("@",$forwarder->getSource())[1];    
            $sourceDomain = $sourceDomain ?: $forwarder->getSource();       
            if($this->endsWith($sourceDomain,$zone->getZoneName())) {
                $forwarders[$forwarder->getSource()] = $forwarder;
            }
        }
        foreach($forwarders as $forwarder) {
            if(count($this->searchRecords($zone->getRecords(),$forwarder->getSource(),$forwarder->getTarget(),$this->type)) == 0) {
                $this->deleteRecords($forwarder,$zone);
                try {
                    if(strpos($forwarder->getSource(),"*") === false) {
                        Ascio::getClientDns()->createRecord($zone->getZoneName(), $forwarder);
                    }
                } catch (AscioException $e) {
                    $eNew = new DnsApiException($e->getMessage(),$e->getCode());
                    $eNew->setZone($zone);
                    $eNew->setResult($e->getMethod(),$e->getRequest(),$e->getStatus(),$e->getResult());
                    //throw $eNew;
                }
                    
            }       
        }
        return $forwarders;
    }
    protected function searchRecords(ArrayOfRecord $records,string $source, ?string $target = null, ?string $type = null) : ArrayOfRecord{
        $resultRecords = new ArrayOfRecord();
        foreach($records as $record) {
            /**
             * @var Record $record
             */
            if (
                (!$target || $target == $record->getTarget()) &&
                (!$type || $type == get_class($record)) &&
                 $source == $record->getSource()
            ) {
                $resultRecords[] = $record;
            }
        }
        return $resultRecords;
    }
    protected function deleteRecords(Record $forwarder, Zone $zone)  {
    }
}
