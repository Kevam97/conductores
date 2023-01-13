<?php

namespace App\Http\Livewire;

use App\Mail\ConfirmJob;
use App\Models\Driver;
use App\Models\Offer;
use App\Models\Owner;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\WithPagination;

class DriversDatatable extends Component
{
    use WithPagination;

    public Vehicle $vehicle;

    //public $vehicles;

    // public function boot(){
    //     $this->vehicles = Vehicle::with('offers')->where('owner_id',$this->owner->id)->paginate(5);
    // }

    public  function driver()
    {
        $this->vehicle->driver_id = null;
        $this->vehicle->save();

        session()->flash('message','Ha dado de baja al conductor');

    }
    public function submit( $driverId)
    {
        if($this->vehicle->driver_id == null ){
            $this->vehicle->driver_id =  $driverId;
            $this->vehicle->save();
            session()->flash('message','El conductor se le ha asigando el vehiculo');
            $user = Driver::find($driverId)->user;
            Mail::to($user->email)->send(new ConfirmJob($user,$this->vehicle));
        }else{
            session()->flash('messageWarn','El vehiculo ya tiene asignado un conductor');
        }
    }

    public function render()
    {
        //dd($this->vehicles);
        return view('livewire.drivers-datatable',
        ['offers' => Offer::where('vehicle_id',$this->vehicle->id)->paginate(3),
        'vehicle' =>$this->vehicle->id ]);
    }
}
