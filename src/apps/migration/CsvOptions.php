<?php
namespace ascio\migration;

class CsvOptions {
    protected $hasHeader = false;
    protected $delimiter = ";";
    protected $enclosure = '"';
    protected $escape = '\\';
    protected $fieldNames = [];
    protected $lineLimit = 1000;
    protected $idColumnIndex = 0;
    protected $memData = true;
    protected $dataColumnIndex = 1;

    /**
     * Get the value of hasHeader
     */ 
    public function hasHeader() : bool
    {
        return $this->hasHeader;
    }

    /**
     * Set the value of hasHeader
     *
     * @return  self
     */ 
    public function setHasHeader(bool $hasHeader)
    {
        $this->hasHeader = $hasHeader;

        return $this;
    }

    /**
     * Get the value of delimiter
     */ 
    public function getDelimiter() : string
    {
        return $this->delimiter;
    }

    /**
     * Set the value of delimiter
     *
     * @return  self
     */ 
    public function setDelimiter(string $delimiter) 
    {
        $this->delimiter = $delimiter;

        return $this;
    }

    /**
     * Get the value of fieldNames
     */ 
    public function getFieldNames() : array
    {
        return $this->fieldNames;
    }

    /**
     * Set the value of fieldNames
     *
     * @return  self
     */ 
    public function setFieldNames(array $fieldNames) : self
    {
        $this->fieldNames = $fieldNames;

        return $this;
    }

    /**
     * Get the value of lineLimit
     */ 
    public function getLineLimit() : int
    {
        return $this->lineLimit;
    }

    /**
     * Set the value of lineLimit
     *
     * @return  self
     */ 
    public function setLineLimit(int $lineLimit)
    {
        $this->lineLimit = $lineLimit;

        return $this;
    }

    /**
     * Get the value of idColumnIndex
     */ 
    public function getIdColumnIndex() : int
    {
        return $this->idColumnIndex;
    }

    /**
     * Set the value of idColumnIndex
     *
     * @return  self
     */ 
    public function setIdColumnIndex(int $idColumnIndex)
    {
        $this->idColumnIndex = $idColumnIndex;

        return $this;
    }

    /**
     * Get the value of memData
     */ 
    public function getMemData() : bool 
    {
        return $this->memData;
    }

    /**
     * Set the value of memData
     *
     * @return  self
     */ 
    public function setMemData(bool $memData)
    {
        $this->memData = $memData;

        return $this;
    }

    /**
     * Get the value of dataColumnIndex
     */ 
    public function getDataColumnIndex() : int
    {
        return $this->dataColumnIndex;
    }

    /**
     * Set the value of dataColumnIndex
     *
     * @return  self
     */ 
    public function setDataColumnIndex(int $dataColumnIndex)
    {
        $this->dataColumnIndex = $dataColumnIndex;

        return $this;
    }

    /**
     * Get the value of enclosure
     */ 
    public function getEnclosure()
    {
        return $this->enclosure;
    }

    /**
     * Set the value of enclosure
     *
     * @return  self
     */ 
    public function setEnclosure($enclosure)
    {
        $this->enclosure = $enclosure;

        return $this;
    }

    /**
     * Get the value of escape
     */ 
    public function getEscape()
    {
        return $this->escape;
    }

    /**
     * Set the value of escape
     *
     * @return  self
     */ 
    public function setEscape($escape)
    {
        $this->escape = $escape;

        return $this;
    }
}