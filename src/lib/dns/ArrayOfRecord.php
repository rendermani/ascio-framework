<?php

// XSLT-WSDL-Client. Generated DB-Model class of ArrayOfRecord. Can be copied and overwriten with own functions.

namespace ascio\dns;

use ascio\lib\Ascio;

class ArrayOfRecord extends \ascio\service\dns\ArrayOfRecord {
    public function clean() : ArrayOfRecord {
        $arrayOfRecord = new ArrayOfRecord();
        foreach($this as $record) {
            if (method_exists($record,"clean")) {
                if($record->clean()) {
                    $arrayOfRecord->add($record);                    
                }
            }
        }
        return $arrayOfRecord;
    }
    public function searchType(Record $recordType) : ArrayOfRecord {
        $arrayOfRecord = new ArrayOfRecord();
        foreach($this as $record) {
            if(get_class($record) == get_class($recordType)) {
                $arrayOfRecord->add($record);
            }
        }
        return $arrayOfRecord;
    }
}
