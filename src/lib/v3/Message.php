<?php

// XSLT-WSDL-Client. Generated DB-Model class of Message. Can be copied and overwriten with own functions.

namespace ascio\v3;

class Message extends \ascio\service\v3\Message {
    function getObjectName() {
        return $this->getSubject();
    }
}