<?php
namespace ascio\migration;
use ascio\v2\Contact;
use ascio\v2\Order;

interface DataCleanerInterface {
    public function __construct(?Order $order = null);
    public function phone($phoneNumber,$country) ;
    public function contactName(Contact $contact) : void ;
    function registrantName() : void ;
    public function city ($string) : ?string ;
    function postal($contact,$postalCode) : ?string ;
    function orgName ($value) ;
    function address ($contact) : ?string;
    function nexus () : void ;
    public function vat() : void ;
    public function purpose () : void ;
    public function localPresence () : void;
    public function state () : ?string ;
    public function number() : ?string ;
    public function type() : ?string ;          
    function getPremium($msg) : ?int ;
    function switchHandle() : Contact ;
    function replaceCharacters($contact) ;
    public static function startsWith($haystack, $needle);
    public static function endsWith($haystack, $needle);
    public function setTld($tld);
    public function getOrder() : Order;
    public function setOrder(Order $order);
}
