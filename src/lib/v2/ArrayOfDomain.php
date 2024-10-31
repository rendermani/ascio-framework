<?php

// XSLT-WSDL-Client. Generated DB-Model class of ArrayOfDomain. Can be copied and overwriten with own functions.

namespace ascio\v2;

use ascio\lib\SubmitOptions;

class ArrayOfDomain extends \ascio\service\v2\ArrayOfDomain {
    public function readCSV($nameOrHandleColumn) : self {
        return $this;
    }
    public function searchDb(Domain $params) : self {
        return $this;
    }
    public function queryDb($query) : self {
        return $this;
    }
    public function update(Domain $params,SubmitOptions $submitOptions=null) {
        foreach($this as $domain) {
            $domain->set($params);
            $domain->update($submitOptions);
        }
    }
}