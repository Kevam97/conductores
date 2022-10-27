<?php

namespace App\Http\Livewire;

use App\Models\Owner;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class DriversDatatable extends Component
{
    use WithPagination;

    public Owner $owner;

    //public $vehicles;

    // public function boot(){
    //     $this->vehicles = Vehicle::with('offers')->where('owner_id',$this->owner->id)->paginate(5);
    // }

    public function submit($vehicleId, $driverId)
    {
        $vehicle = Vehicle::find($vehicleId);
        if($vehicle->driver_id == null ){
            $vehicle->driver_id =  $driverId;
            $vehicle->save();
            session()->flash('message','El conductor se le ha asigando el vehiculo');
        }else{
            session()->flash('messageWarn','El vehiculo ya tiene asignado un conductor');
        }
    }

    public function render()
    {
        //dd($this->vehicles);
        return view('livewire.drivers-datatable',
        ['vehicles' => Vehicle::with('offers')->where('owner_id',$this->owner->id)->paginate(1) ]);
    }
}
