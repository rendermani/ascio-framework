<?php
namespace ascio\test;
use PHPUnit\Framework\TestCase;
use ascio\lib\Ascio;
use ascio\v2\Contact;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use ascio\lib\Changes;
use ascio\v2\Domain;
use ascio\v2\NameServer;
use ascio\v2\NameServers;
use ascio\v2\PrivacyProxy;
use ascio\v2\Extensions;
use ascio\v2\Extension;
use ascio\v2\TestLib;

/**
 * @covers ascio\lib\Changes
 */
final class TestApiProperties extends TestCase {
    public function testCleanObject() {
        Ascio::setConfig();
        $domain = TestLib::getDomainFull();
        $domain->getRegistrant()->db()->setAttribute("_testme","abc");
        $clean = $domain->properties()->cleanObject();
        $this->assertEquals("abc", $clean->Registrant->DbAttributes->_testme,"A DB Attribute should be added");
        $this->assertCount(3,$clean->PrivacyProxy->Extensions->Extension,"Extension should have 3 items");
        $this->assertIsObject($clean->PrivacyProxy->Extensions,"Extensions should be an object");
        
    }

    

}