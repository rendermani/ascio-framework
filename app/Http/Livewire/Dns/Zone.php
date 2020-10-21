<?php

namespace App\Http\Livewire\Dns;
namespace ascio\lib;

use ascio\dns\Zone as DnsZone;
use ascio\lib\Ascio;
use Livewire\Component;

class Zone extends Component
{
    public $zoneName;
    public function mount($zoneName)
    {
        $this->zoneName = $zoneName;
    }
    public function render()
    {
        $zoneDb = new DnsZone();
        $zoneDb->db()->getByName($this->zoneName);
        $zone = Ascio::getClientDns("softgarden")->getZone($this->zoneName)->getZone();
        $zone->db()->_client = $zoneDb->db()->_client;
        return view('livewire.dns.zone',["zone" => $zone->serialize()])->layout("dns.zone");
    }
    public function delete($name) {
        $this->test = "delete " . $name; 
    }
    public function edit($name) {
        $this->test = "edit " . $name; 
    }
    public function create($name) {
        $this->test = "create " .  $name; 
    }
}
