<?php
namespace Tests\Unit;
use ascio\lib\Ascio;
use ascio\v2\TestLib;
use Tests\TestCase;
/**
 * @covers ascio\lib\Changes
 */
final class ApiPropertiesTest extends TestCase {
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