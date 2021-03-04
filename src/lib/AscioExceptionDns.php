<?php 
namespace ascio\lib;

class AscioExceptionDns extends AscioException {
    public $values;
    public $request;
    public $method;
    public $soapRequest;
    public $soapResponse;
    public $result;
    public $status;
    public $dns; 

    function setResult($method, $request, $status,$result) {
        $this->status = $status;
        $this->request = $request; 
        $this->method = $method; 
        $this->result = $result;
        $this->code = $status->getStatusCode();
        $this->message = $status->getStatusMessage();     
        $this->api ="dns";
    } 
}

