<?php
namespace ascio\migration;

use Exception;

class File implements SourceInterface { 
    protected $data = []; 
    protected $fileName;
    protected $counters;
    public function __construct(string $fileName)
    {
        $this->fileName = $fileName;
        $this->counters = new Counters();
    }
    protected function splitFile () {
        $content = file_get_contents($this->fileName);
        $content = str_replace("\r","",$content);
        return  explode("\n",$content);
    }  
    public function readCSV(CsvOptions $options, ?callable $callback = null) : self
    {
        foreach($this->splitFile() as $nr => $line) {
            if(trim($line) == "") continue;
            $tokens = explode($options->getDelimiter(),$line);
            $data = $this->getCsvLine($options,$tokens,$nr);
            if(!$data) {
                $this->getCounters()->get("all")->increase();
                continue;
            }
            if ($callback) {
                $callback($data,$this->counters);
            } 
            $this->getCounters()->get("all")->increase();    
        }
        echo "Read CSV-File ".$this->fileName." completed.\n";
        return $this;
    }
    public function streamCSV(CsvOptions $options, ?callable $callback = null) {
        $this->checkFileExists();
        $return = [];
        $h = fopen($this->fileName, "r");
        while (($tokens = fgetcsv($h, $options->getLineLimit(), $options->getDelimiter(),$options->getEnclosure(),$options->getEscape())) !== FALSE) {
            $data = $this->getCsvLine($options,$tokens);
            if(!$data) {
                $this->getCounters()->get("all")->increase();
                continue;
            }
            if ($callback) {
                $return[] = $callback($data, $this->getCounters()->get("all"));
            }
            $this->getCounters()->get("all")->increase();
        }
        return $return;
    }
    protected function getCsvLine (CsvOptions $options,$tokens){
        $id = $tokens[$options->getIdColumnIndex()];
        $nr = $this->getCounters()->get("all")->get();
        if($nr == 0 && $options->hasHeader()) {
            $options->setFieldNames($tokens);
            return null;
        }            
        $data = [];
        foreach($tokens as $nr => $value) {
            $fieldName = $options->getFieldNames()[$nr] ? $options->getFieldNames()[$nr] : $nr;
            $data[$fieldName] = $value; 
        } 
        if($options->getMemData()) {
            $this->data[$id] = $data;
        }
        return $data;
    }
    public function readTxt () {
        $this->checkFileExists();
        foreach($this->splitFile() as $line) {
            $this->data[$line] = true;
        }
        echo "Read TXT-File ".$this->fileName." completed.\n";
    }
    function get($id) {
        return $this->data[$id];
    }
    function exists($id) {
        return array_key_exists($id,$this->data);
    }
    function reset() : self {
        file_put_contents($this->fileName,"");
        return $this;
    }
    function append($string) : self {
        file_put_contents($this->fileName,$string,FILE_APPEND);
        return $this;
    }
    function appendLn($string) : self {
        file_put_contents($this->fileName,$string."\n",FILE_APPEND);
        return $this;
    }
    protected function checkFileExists() {
        if(!file_exists($this->fileName)) {
            throw new Exception("File '".$this->fileName."' not found." );
        };
    }

    /**
     * Get the value of counters
     */ 
    public function getCounters() : Counters
    {
        return $this->counters;
    }

    /**
     * Get the value of data
     */ 
    public function getData()
    {
        return $this->data;
    }
}