<?php

// XSLT-WSDL-Client. Generated DB-Model class of Record. Can be copied and overwriten with own functions.

namespace ascio\dns;

use ascio\lib\Ascio;

class Record extends \ascio\service\dns\Record {
    public function update() : UpdateRecordResponse {
        return $this->api()->update();
    }
}