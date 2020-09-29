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

/**
 * @covers ascio\lib\Changes
 */
final class ChangesTest extends TestCase {
    public function testCreateDomainData() {
        Ascio::setConfig();
        $email = "manuellautenschlager@gmail.com";
        $domain =  new Domain();        
        $registrant =  $domain->createRegistrant();
        $registrant->setName("Jane Doe");
        $registrant->setAddress1("Address1Test");
        $registrant->setCity("CityTest");
        $registrant->setPostalCode("888349");
        $registrant->setCountryCode("DK");
        $registrant->setEmail($email);
        $registrant->setPhone("+45.123456789");
        $contact =  new Contact();
        $contact->setFirstName("John");
        $contact->setLastName("Doe");
        $contact->setAddress1("Address1Test");
        $contact->setPostalCode("888349");
        $contact->setCity("CityTest");
        $contact->setCountryCode("DK");
        $contact->setEmail($email);
        $contact->setPhone("+45.123456789");
        $contact->setType("owner");
        $nameServer1 =  new NameServer();
        $nameServer1->setHostName("ns1.ascio.net");
        $nameServer2 =  new NameServer();
        $nameServer2->setHostName("ns2.ascio.net");
        $nameServers =  new NameServers();
        $nameServers->setNameServer1($nameServer1);
        $nameServers->setNameServer2($nameServer2);
        $proxy = new PrivacyProxy();
        $extensions = new Extensions();
        $extensions->addExtension()->setKey("key1")->setValue("value1");
        $extensions->addExtension()->setKey("key2")->setValue("value2");
        $extensions->addExtension()->setKey("key3")->setValue("value3");
        $proxy->setExtensions($extensions);
        $domain =  new Domain();
        $time = str_replace(".","",microtime(true));
        $domain->setDomainName("test.com");
        $domain->setPrivacyProxy($proxy);
        $domain->setRegistrant($registrant);
        $domain->setAdminContact($contact);
        $domain->setTechContact($contact);
        $domain->setBillingContact($contact);
        $domain->setNameServers($nameServers);
        $domain->setDiscloseSocialData("true");
        
        $domain2 = $domain->clone();
        $contact->setFirstName("Manuel");
        $extensions->index(1)->setValue("test-value-2");
        $extensions2 = $domain2->getPrivacyProxy()->getExtensions();
        $this->assertNotEquals($contact->getFirstName(),$domain2->getAdminContact()->getFirstName(),"Contact-Firstnames should not be same"); 
        $this->assertNotNull($extensions2->index(1),"The new test-values should be set"); 
        $this->assertEquals("value2",$extensions2->index(1)->getValue(),"The value of extensions2 should be 'value2'"); 
        $this->assertEquals("test-value-2",$extensions->index(1)->getValue(),"The old test-values should be set"); 
        $this->assertNotEquals($extensions->index(1)->getValue(),$domain2->getPrivacyProxy()->getExtensions()->index(1)->getValue(),"Extension-Value 1 should not be equal");
        $this->assertCount(3,$extensions,"Original should be 3 Extensions");
        $this->assertCount(3,$extensions2,"New should be 3 Extensions");
        return $domain;
    }

    /**
     * @depends testCreateDomainData
     */
    public function testHasPropertyChanges(Domain $domain) {        
        $changes = $domain->changes();
        $changes->setOriginal();
        $domain->getTechContact()->setFirstName("Eva"); 
        $this->assertTrue($domain->getTechContact()->changes()->propertyChanged("FirstName"),"Tech FirstName: Changes should be true.");
        $this->assertFalse($domain->getTechContact()->changes()->propertyChanged("LastName"),"Tech LastName: Changes should be false.");          
        return $domain;
    }
    /**
     * @depends testHasPropertyChanges
     */
    public function testHasChanges(Domain $domain) : Domain {        
        // true: domain has changed
        $changes = $domain->changes();
        $changes->setOriginal();
        $domain->setDomainName("test-123.com");
        $this->assertTrue($changes->hasChanges(),"Domain: Changes should be true.");        
        // false: domain has not changed
        $domain->setDomainName("test.com");
        $this->assertFalse($changes->hasChanges(),"Domain: Changes should be false.");
        // false: registrant has not changed        
        $changes2 = $domain->getRegistrant()->changes();
        $changes2->setOriginal();      
        $this->assertFalse($changes2->hasChanges(),"Registrant: Changes should not be true.");
        // true: Registrant changes should be true
        $domain->getRegistrant()->setName("Duck");
        $this->assertTrue($changes2->hasChanges(),"Registrant: Changes should be true.");
        // true: Extension changes should be true
        $extensions = $domain->getPrivacyProxy()->getExtensions();
        $extension = $extensions->index(2);
        $extension->setValue("test-value-3");
        $this->assertTrue($extension->changes()->hasDeepChanges(),"Extension: Changes should be true.");
        $this->assertTrue($extensions->changes()->hasDeepChanges(),"Extensions: Changes should be true.");        
        return $domain;
    }
    /**
     * @depends testHasChanges
     */
    public function testHasDeepValueChanges(Domain $domain)  : Domain {        
        $changes = $domain->changes();
        $changes->setOriginal();
        $domain->getRegistrant()->setName("testname");
        $this->assertTrue($changes->hasDeepChanges(),"Registrant: Changes should be true.");
        // reset changes
        $changes->setOriginal();
        $this->assertFalse($changes->hasDeepChanges(),"Registrant: Changes should be false.");

        // true: Extension changes should be true
        $extensions = $domain->getPrivacyProxy()->getExtensions();
        $extension = $extensions->index(0);
        $extension->setValue("test-value-1");
        $this->assertTrue($extension->changes()->hasDeepChanges(),"Extension: Changes should be true.");
        $this->assertTrue($extensions->changes()->hasDeepChanges(),"Extensions: Changes should be true."); 
        return $domain;    
    }
    /**
     * @depends testHasChanges
     */
    public function testSetOriginal(Domain $domain)  : Domain {        
        $changes = $domain->changes();
        $domain->getTechContact()->setFirstName("Eva");
        
        $extensions = $domain->getPrivacyProxy()->getExtensions();
        $extension = $extensions->index(0);
        $extension->setValue("test-value-1");

        $domain->getRegistrant()->setName("Duck");
        
        $changes->setOriginal();
         
        $this->assertFalse($domain->changes()->hasDeepChanges(),"Domain: There should be no deep changes");          
        return $domain;
    }

}