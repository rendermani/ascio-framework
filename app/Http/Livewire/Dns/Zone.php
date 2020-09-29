<?php

namespace App\Http\Livewire\Dns;

use Livewire\Component;

class Zone extends Component
{
    public $zone;
    public function mount($zone)
    {
        $this->zone = $zone;
    }
    public function render()
    {
        return view('livewire.dns.zone');
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
