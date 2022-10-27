<?php

namespace App\Http\Livewire;

use App\Models\Driver;
use App\Models\Offer;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class OfferView extends Component
{
    use WithPagination;

    public $driver;

    public function boot(){
        $user = User::find(Auth::id());
        $this->driver =$user->drivers->first();

    }

    // public $drivers =[], $owners =[];
    // public function mount(){
    //     $this->drivers = User::role('Conductor')
    //     ->with(['drivers.annexes' => function($query){
    //         $query->where('comment','curriculum');
    //     }])->get();

    //     $this->owners = Vehicle::with('images')->get();
    //     //dd( $this->owners);
    // }
    public function submit($vehicle){
        Offer::create([
            'driver_id' => $this->driver->id,
            'vehicle_id' => $vehicle
        ]);
        session()->flash('message','Te has postulado');

    }

    public function render()
    {
        //dd($this->driver);
        return view('livewire.offer-view',[
            'drivers' => User::role('Conductor')->with(['drivers.annexes' => function($query)
                                    {
                                        $query->where('comment','curriculum');
                                    }])->paginate(5),
            'owners' => Vehicle::with('images')->paginate(5)
        ]);
    }
}
