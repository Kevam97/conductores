<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Vehicle;
use Livewire\Component;

class OfferView extends Component
{
    public $drivers =[], $owners =[];
    public function mount(){
        $this->drivers = User::where('role_id',2)->get();
        $this->owners = Vehicle::all();
    }
    public function render()
    {
        return view('livewire.offer-view');
    }
}
