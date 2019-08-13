<?php
namespace ascio\lib;

use ascio\service\v2\Order;

class DomainBlocker {
    public static function block(string $domainName) {
        global $_AscioBlockedDomains; 
        $_AscioBlockedDomains = $_AscioBlockedDomains ?: [];
        $_AscioBlockedDomains[$domainName] ="blocked";
        $_AscioBlockedDomains = array_slice($_AscioBlockedDomains,0,10000); 
        return "blocked";
    }
    public static function unblock(string $domainName) {
        global $_AscioBlockedDomains; 
        $_AscioBlockedDomains = $_AscioBlockedDomains ?: [];
        if(array_key_exists($domainName, $_AscioBlockedDomains)) {
            unset($_AscioBlockedDomains[$domainName]);
        }     
        return "unblocked";
    }
    public static function isBlocked(string $domainName) : bool {
        global $_AscioBlockedDomains; 
        $_AscioBlockedDomains = $_AscioBlockedDomains ?: [];
        return array_key_exists($domainName,$_AscioBlockedDomains);
    }
    public static function syncFromDb(string $domainName)  {
        global $_AscioBlockedDomains; 
        //Todo: Sync DB
        //for all domains
        //get running jobs of domain
        //if none remove 
    }
}