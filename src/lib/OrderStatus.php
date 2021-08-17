<?php
namespace ascio\lib;

class OrderStatus {
    const NotSet="NotSet";
    const Stored="Stored";
    const Queued="Queued";
    const Submitting="Submitting";
    const Running="Running";
    const Blocking="Blocking";
    const WaitingForUser="WaitingForUser";
    const BlockedByOtherOrder="BlockedByOtherOrder";
    const Processing="Processing";
    const Completed="Completed";
}