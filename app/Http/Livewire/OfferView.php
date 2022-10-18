<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Vehicle;
use Livewire\Component;

class OfferView extends Component
{
    public $drivers =[], $owners =[];
    public function mount(){
        $this->drivers = User::role('Conductor')
        ->with(['drivers.annexes' => function($query){
            $query->where('comment','curriculum');
        }])->get();
        $this->owners = Vehicle::with('images')->get();
        //dd( $this->owners);
    }
    public function render()
    {
        return view('livewire.offer-view');
    }
}
