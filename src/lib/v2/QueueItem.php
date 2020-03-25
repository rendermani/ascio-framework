<?php

// XSLT-WSDL-Client. Generated DB-Model class of QueueItem. Can be copied and overwriten with own functions.

namespace ascio\v2;
use ascio\db\v2\QueueItemDb;
use ascio\api\v2\QueueItemApi;
use ascio\lib\StatusSerializer;
use ascio\service\v2\CallbackStatus;

class QueueItem extends \ascio\service\v2\QueueItem {
    public function getStatusSerializer() : StatusSerializer
    {      
        parent::getStatusSerializer()->addFields([
            "OrderId" => $this->getOrderId(),
            "OrderStatus" => $this->getOrderStatus(), 
            "DomainName" => $this->getDomainName(),     
            "DomainHandle" => $this->getDomainHandle(),     
            "Msg" => $this->getMsg()  
        ]);
        return $this->_statusSerializer;
    }
}