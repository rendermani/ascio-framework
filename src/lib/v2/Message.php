<?php

// XSLT-WSDL-Client. Generated DB-Model class of Message. Can be copied and overwriten with own functions.

namespace ascio\v2;
use ascio\lib\StatusSerializer;

class Message extends \ascio\service\v2\Message {
    public function getStatusSerializer() : StatusSerializer
    {      
        parent::getStatusSerializer()->addFields([
            "ToAddress" => $this->getToAddress(),
            "Type" => $this->getType(), 
            "OrderId" => $this->db()->_orderId
        ]);
        return $this->_statusSerializer;
    }
}