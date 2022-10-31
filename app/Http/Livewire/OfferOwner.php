<?php

namespace App\Http\Livewire;

use App\Models\Driver;
use App\Models\Offer;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class OfferOwner extends Component
{
    use WithPagination;

    public $driver;

    public function boot(){
        $user = User::find(Auth::id());
        $this->driver =$user->drivers->first();

    }
    public function submit($vehicle){
        if(!empty($this->driver->id)){
            $offer = Offer::where('driver_id',$this->driver->id,)
                            ->where('vehicle_id',$vehicle)->first();

            if(empty($offer)){
                Offer::create([
                    'driver_id' => $this->driver->id,
                    'vehicle_id' => $vehicle
                ]);
                session()->flash('message','Te has postulado');
            }else{
                session()->flash('messageWarn','Ya te postulaste a esta oferta');
            }
        }else{
            session()->flash('messageWarn','Usted no es un conductor para aplicar');
        }

    }

    public function render()
    {
        //dd($this->driver);
        return view('livewire.offer-owner',[
            'owners' => Vehicle::with('images')->paginate(2)
        ]);
    }
}
