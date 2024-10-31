<?php
namespace ascio\lib;

class Debug {
    public static function formatXml($xml) {
        $dom = new \DOMDocument();
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;
        $dom->loadXML($xml);
        return $dom->saveXML();
    }
    public static function formatSoapXml(\SoapClient $client) {
        if(php_sapi_name() == "cli") {            
            echo "SOAP Request\n";
            echo self::formatXml($client->__getLastRequest());
            echo "SOAP Response\n";
            echo self::formatXml($client->__getLastResponse());            
        }
        else {
            echo "<h3>".self::getCode() . "-" . self::getMessage()."</h3>";
            echo "<h4>SOAP Request</h4>";
            echo "<pre>".self::formatXml($client->__getLastRequest())."</pre>";
            echo "<h4>SOAP Response</h4>";
            echo "<pre>".self::formatXml($client->__getLastResponse())."</pre>";
        }          
    }
    public static function formatSoapMarkup(\SoapClient $client) {
        echo "Account: ". Ascio::getConfig()->get()->account."\n";
        if(Ascio::getConfig()->getPartner(self::api)) {
            echo "Impersonate: ". Ascio::getConfig()->getPartner($client)."\n";
        }
        echo "Environment: ". Ascio::getConfig()->getEnvironment()."\n";
        echo "Error-message: ".self::getMessage()."\n" ;
        echo "Error-code: ".self::getCode()."\n" ;
        echo "\n\n*SOAP Request*\n\n";
        echo self::formatXml($client->__getLastRequest());
        echo "\n*SOAP Response*\n\n";
        echo self::formatXml($client->__getLastResponse());         
    }

}
