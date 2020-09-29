<?php
namespace ascio\test;
use PHPUnit\Framework\TestCase;
use ascio\lib\Ascio;
use ascio\lib\LockAction;
use ascio\lib\LockType;
use ascio\service\v2\OrderType;
use ascio\v2\Domain;
use ascio\v2\DomainUpdates;
use ascio\v2\OrderType as AscioOrderType;
use ascio\v2\TestLib;

/**
 * @covers ascio\v2\DomainUpdates
 */
final class LocksTest extends TestCase {

    public function testInitLocks() {
        Ascio::setConfig();
        $domain = TestLib::getDomainFull();
        $domain->setStatus("UPDATE_LOCK"); 
        $domain->setTransferLock(LockAction::Lock);
        $domain->setDeleteLock(LockAction::Lock);
        $locks = $domain->getLocks();
        $this->assertTrue($locks->transferLock()->hasNew(),"New Transfer lock should be true");
        $this->assertTrue($locks->deleteLock()->hasNew(),"New Delete lock should be true");
        $this->assertFalse($locks->updateLock()->hasNew(),"New Update lock should be false");
        $this->assertTrue($locks->updateLock()->hasOld(),"Old Update lock should be true");
        $this->assertFalse($locks->deleteLock()->hasOld(),"Old Delete lock should be false");
    }
    public function testNoLocks() {
        $domain = TestLib::getDomainFull();
        $domain->setStatus(""); 
        $locks = $domain->getLocks();
        $locks->setOrderType(OrderType::Expire_Domain);
        $orders = $locks->getUnlockOrders();
        $this->assertCount(0,$orders,"There should be 0 unlock orders");
        //lock
        $orders = $locks->getLockOrders();
        $this->assertCount(0,$orders,"There should be 0 lock orders");
    }
    public function testUpdateLockExpire() {
        $domain = TestLib::getDomainFull();
        $domain->setStatus("UPDATE_LOCK"); 
        $locks = $domain->getLocks();
        $locks->setOrderType(OrderType::Expire_Domain);
        $orders = $locks->getUnlockOrders();
        $newDomain = $orders->index(0)->getDomain();
        $this->assertCount(1,$orders,"There should be 1 unlock order");
        $this->assertEquals(AscioOrderType::Change_Locks,$orders[0]->getType(),"OrderType of the first order should be ".OrderType::Change_Locks);
        $this->assertEquals(LockAction::Unlock,$newDomain->getUpdateLock(),"The Update-Lock should be removed");
        $this->assertNull($newDomain->getDeleteLock(),"The Delete-Lock should not be removed");
        $this->assertNull($newDomain->getTransferLock(),"The Transfer-Lock should not be removed");
        //lock
        $orders = $locks->getLockOrders();
        $newDomain = $orders->index(0)->getDomain();
        $this->assertCount(1,$orders,"There should be 1 lock orders");
    }
    public function testDeleteLockExpire() {
        $domain = TestLib::getDomainFull();
        $domain->setStatus("DELETE_LOCK"); 
        $locks = $domain->getLocks();
        $locks->setOrderType(OrderType::Expire_Domain);
        $orders = $locks->getUnlockOrders();
        $newDomain = $orders->index(0)->getDomain();
        $this->assertCount(1,$orders,"There should be 1 unlock order");
        $this->assertEquals(AscioOrderType::Change_Locks,$orders[0]->getType(),"OrderType of the first order should be ".OrderType::Change_Locks);
        $this->assertEquals(LockAction::Unlock,$newDomain->getDeleteLock(),"The Delete-Lock should be removed");
        $this->assertNull($newDomain->getUpdateLock(),"The Update-Lock should not be removed");
        $this->assertNull($newDomain->getTransferLock(),"The Transfer-Lock should not be removed");
        //lock
        $orders = $locks->getLockOrders();
        $this->assertCount(0,$orders,"There should be 0 lock orders");
    }
    public function testUpdateDeleteLockExpire() {
        $domain = TestLib::getDomainFull();
        $domain->setStatus("UPDATE_LOCK,DELETE_LOCK"); 
        $locks = $domain->getLocks();
        $locks->setOrderType(OrderType::Expire_Domain);
        $orders = $locks->getUnlockOrders();
        // unlock
        $newDomain = $orders->index(0)->getDomain();
        $this->assertCount(2,$orders,"There should be 2 unlock orders");
        $this->assertEquals(AscioOrderType::Change_Locks,$orders->index(0)->getType(),"OrderType of the first order should be ".OrderType::Change_Locks);
        $this->assertEquals(LockAction::Unlock,$newDomain->getUpdateLock(),"The Update-Lock should be removed");
        $this->assertNull($newDomain->getDeleteLock(),"The Delete-Lock should not be removed");
        $this->assertNull($newDomain->getTransferLock(),"The Transfer-Lock should not be removed");
        $newDomain2 = $orders->index(1)->getDomain();
        $this->assertEquals(AscioOrderType::Change_Locks,$orders->index(1)->getType(),"OrderType of the second order should be ".OrderType::Change_Locks);
        $this->assertEquals(LockAction::Unlock,$newDomain2->getDeleteLock(),"The Delete-Lock should be removed");
        $this->assertNull($newDomain2->getUpdateLock(),"The Delete-Lock should not be removed");
        $this->assertNull($newDomain2->getTransferLock(),"The Transfer-Lock should not be removed");
        // lock
        $orders = $locks->getLockOrders();
        $newDomain = $orders->index(0)->getDomain();
        $this->assertCount(1,$orders,"There should be 1 lock orders");
        $this->assertEquals(LockAction::Lock,$newDomain->getUpdateLock(),"The Update-Lock should be removed");
        $this->assertNull($newDomain->getDeleteLock(),"The Delete-Lock should not be removed");
        $this->assertNull($newDomain->getTransferLock(),"The Transfer-Lock should not be removed");
    }
    public function testUpdateDeleteTransferLockExpire() {
        $domain = TestLib::getDomainFull();
        $domain->setStatus("UPDATE_LOCK,DELETE_LOCK,TRANSFER_LOCK"); 
        $locks = $domain->getLocks();
        $locks->setOrderType(OrderType::Expire_Domain);
        $orders = $locks->getUnlockOrders();
        // unlock
        $newDomain = $orders->index(0)->getDomain();
        $this->assertCount(2,$orders,"There should be 2 unlock orders");
        $this->assertEquals(AscioOrderType::Change_Locks,$orders->index(0)->getType(),"OrderType of the first order should be ".OrderType::Change_Locks);
        $this->assertEquals(LockAction::Unlock,$newDomain->getUpdateLock(),"The Update-Lock should be removed");
        $this->assertNull($newDomain->getDeleteLock(),"The Delete-Lock should not be removed");
        $this->assertNull($newDomain->getTransferLock(),"The Transfer-Lock should not be removed");
        $newDomain2 = $orders->index(1)->getDomain();
        $this->assertEquals(AscioOrderType::Change_Locks,$orders->index(1)->getType(),"OrderType of the second order should be ".OrderType::Change_Locks);
        $this->assertEquals(LockAction::Unlock,$newDomain2->getDeleteLock(),"The Delete-Lock should be removed");
        $this->assertNull($newDomain2->getUpdateLock(),"The Delete-Lock should not be removed");
        $this->assertNull($newDomain2->getTransferLock(),"The Transfer-Lock should not be removed");
        // lock
        $orders = $locks->getLockOrders();
        $newDomain = $orders->index(0)->getDomain();
        $this->assertCount(1,$orders,"There should be 1 lock orders");
        $this->assertEquals(LockAction::Lock,$newDomain->getUpdateLock(),"The Update-Lock should be removed");
        $this->assertNull($newDomain->getDeleteLock(),"The Delete-Lock should not be removed");
        $this->assertNull($newDomain->getTransferLock(),"The Transfer-Lock should not be removed");
    }
}