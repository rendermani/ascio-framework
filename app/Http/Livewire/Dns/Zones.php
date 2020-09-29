<?php

namespace App\Http\Livewire\Dns;

use ascio\db\dns\ZoneDb;
use Livewire\Component;
use Livewire\WithPagination;

class Zones extends Component
{
    use WithPagination;
    public $test; 
    public function render() {
        $zones = ZoneDb::orderBy('created_at', 'desc')->paginate(5);
        return view('livewire.dns.zones',['zones' => $zones]);
    }

}
