<?php
namespace ascio\dns\importer;
use ascio\dns\Record;
use ascio\dns\SOA;
use ascio\dns\TXT;
use ascio\dns\Zone;
use ascio\lib\AscioException;

class ZoneFileParser implements ZoneParserInterface {
    protected $zonesFileName;
    protected $soa; 
    protected $defaultPrimaryNameserver;
    protected $defaultHostmasterEmail;
    protected $importer; 
    protected $errors = []; 

    public function __construct($zoneFileName)
    {   
        $this->zonesFileName = $zoneFileName;
        $this->soa = new SOA();
    }
    public function parse(?callable $function = null) {

        $zonesFile = file_get_contents($this->zonesFileName);
        $zonesFile = str_replace("\r","",$zonesFile);
        $zonesDef = explode("\$ORIGIN",$zonesFile);
        $this->errors = [];
        foreach($zonesDef as $counter => $zoneDef) {
            try {
                $zone = $this->parseZone($zoneDef);
                if($function) $function($zone);
            } catch (ZoneParseException $e) {
                $this->errors[] = $e; 
                $this->getImporter()->writeError($e);
                // workaround for forwarders. Also create error-zone's forwarders
                if($e->getZone()->getZoneName() !== null) {
                    if($function) $function($e->getZone());
                }
            }
        }
    }
    protected function parseSoa($line) : Record {
        $tokens = explode(" ",$line);
        $this->soa->setTTL((int) $tokens[1]);
        if( $tokens[7]) $this->soa->setSerial((int) $tokens[7]);
        if( $tokens[8]) $this->soa->setRefresh((int) $tokens[8]);
        if( $tokens[9]) $this->soa->setRetry((int) $tokens[9]);
        if( $tokens[10]) $this->soa->setExpire((int) $tokens[10]);
        $this->soa->setSource("@");
        return $this->soa;
    }
    public function parseZone(string $zoneDef) : Zone {
        $this->getImporter()->incrementCounter();
        $zone = new Zone();
        $lines = explode(PHP_EOL,$zoneDef);
        if(!$lines[2])  {
            $e = new ZoneParseException("No ZoneData",407);
            $zone->setZoneName(trim($lines[1]));        
            $e->setZone($zone)->setZoneDef($zoneDef);
            throw $e; 
        }
        $zone->setZoneName(rtrim(trim($lines[0]),"."));
        $soa = $this->parseSoa($lines[1]);
        $zone->createRecords()->addRecord($soa);    
        foreach($lines as $line) {
            $lineTokens = preg_split("/[ ]+/",$line);
            $type = $lineTokens[3];
            if( count($lineTokens) > 3 &&
                $type !== "NS" && 
                $type !== "SOA" ) {
              
                if($type =="NS" && $lineTokens[0] =="@") {
                    continue; 
                }    
                if( $type =="CAA") {                    
                    $e = new ZoneParseException("Ascio doesn't support CAA-Records",408);
                    $e->setZone($zone)->setZoneDef($zoneDef);
                    throw $e; 
                }
                if($type =="SPF") {
                   continue; 
                }
                $class = "ascio\\dns\\".$type;
                $record = new $class();
                $record->setTTL((int) $lineTokens[1]);
                $suffix = in_array($lineTokens[0],["@","*"]) ? "" :  "." . $zone->getZoneName();
                $record->setSource($lineTokens[0].$suffix);
                $endLine = implode(" ",array_slice($lineTokens,4));

                switch ($type) { 
                    case "TXT": 
                        if(strlen($endLine) > 255) {
                            /**
                             * @var TXT $record
                             */
                            $e =  new ZoneParseException("Long TXT ".$record->getSource()." not allowed yet",410);
                            $e->setZone($zone)->setZoneDef($zoneDef);
                            throw $e; 
                        
                            $records = $record->splitLongTarget();
                            $records->clean();
                            $zone->getRecords()->addRecord($records);
                        } else {                           
                            $record->clean(); 
                            $record->setTarget($this->removeDot($endLine));
                            $zone->getRecords()->addRecord($record);

                        }
                    break;
                    case "A": 
                    case "AAAA": 
                        if(strpos($record->getSource(), "*") !== false) {
                            $record->setSource($record->getSource().".".$zone->getZoneName());                
                        }
                        $record->setTarget($this->removeDot($endLine));
                        $zone->getRecords()->addRecord($record);
                    break;
                    case "CNAME": 
                        if(strpos($record->getSource(), "*") !== false) {
                            $e =  new ZoneParseException("CNAME ".$record->getSource()." not allowed yet",409);
                            $e->setZone($zone)->setZoneDef($zoneDef);
                            throw $e; 
                        }
                        $record->setTarget($this->removeDot($endLine));
                        $zone->getRecords()->addRecord($record);
                    break;
                    case "MX": 
                        $record->setTarget($lineTokens[5]);
                        $record->setPriority($lineTokens[4]);
                        $zone->getRecords()->addRecord($record);
                    break;
                    case "SRV": 
                        $record->setPriority($lineTokens[4]);
                        $record->setWeight($lineTokens[5]);
                        $record->setPort($lineTokens[6]);
                        $record->setTarget($lineTokens[7]);
                        $zone->getRecords()->addRecord($record);
                    break;
                    default:
                        $record->setTarget($this->removeDot($endLine));
                        $zone->getRecords()->addRecord($record);
                    break;  
                }                         
            }
        }
        return $zone;
    }
    function removeDot($string) {
        $lastCharacter = substr($string, strlen($string)-1,1);
        if($lastCharacter==".") {
            return substr($string,0,-1);
        } else {
            return $string;
        };
    }
    /**
    * Get the value of soa
    */ 
     public function getSoa() : SOA
     {
         return $this->soa;
     }

    /**
     * Get the value of importer
     */ 
    public function getImporter() : Importer
    {
        return $this->importer;
    }

    /**
     * Set the value of importer
     *
     * @return  self
     */ 
    public function setImporter(Importer $importer)
    {
        $this->importer = $importer;

        return $this;
    }

    /**
     * Get the  errors
     */ 
    public function getErrors(callable $function) : array
    {
        foreach($this->errors as $error) {
            $function($error); 
        }
        return $this->errors;
    }
    /**
     * Get the  errors
     */ 
    public function getErrorsByType() : array
    {
        foreach($this->errors as $e) {
            $errors[$e->getCode()][] = [
                    "name" => $e->getZone()->getZoneName(),
                    "message" => $e->getMessage()
            ];
        }
        return $errors;
    }
}