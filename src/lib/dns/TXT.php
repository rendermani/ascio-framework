<?php

// XSLT-WSDL-Client. Generated DB-Model class of TXT. Can be copied and overwriten with own functions.

namespace ascio\dns;

class TXT extends \ascio\service\dns\TXT {
    public function clean() : bool {
        $target = $this->getTarget();
        $this->setTarget(trim($this->getTarget()));
        
        if($target !== $this->getTarget()) {
            return true;
        }
        return false;
    }
    public function splitLongTarget() : ArrayOfRecord {
        $records = new ArrayOfRecord();
        if(strlen($this->getTarget()) > 255) {
            if(strpos($this->getTarget(),'"') == 0) {
                $records = $this->tokenizeTarget();
            } else {
                $records = $this->splitTarget();
            }
        } else  {
            $records->add($this);
        }
        return $records; 
    }
    private function tokenizeTarget() {
        $records = new ArrayOfRecord();
        $target = $this->getTarget();
        $target = trim($target,'"');
        $strings = explode('" "',$target);
        foreach($strings as $string) {
            $record = $this->clone();
            $record->setTarget('"'.$string.'"');
            $records->add($record);
        }
        return $records;
    }    
    private function splitTarget() : ArrayOfRecord {
        $records = new ArrayOfRecord();
        $splitted = str_split($this->getTarget(),253);
        foreach($splitted as $nr => $chunk) {
           /*  if($nr == 0) {
                $chunk = "(" . $chunk;
            }
            if($nr = count($splitted) - 1) {
                $chunk = $chunk . ")";
            } */
            $chunk = '"'.$chunk.'"';
            $record = $this->clone();
            $record->setTarget($chunk);
            $records->add($record);
        }
        return $records;
    }
    public function clone() : TXT {
        $record = new TXT();
        $record->setSource($this->getSource());
        $record->setTTL($this->getTTL());
        $record->setTarget($this->getTarget());
        return $record;
    }
}