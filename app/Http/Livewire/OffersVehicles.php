<?php

namespace App\Http\Livewire;

use App\Models\Offer;
use Livewire\Component;
use Livewire\WithPagination;

class OffersVehicles extends Component
{
    use WithPagination;
    public $vehicleId;
    public function render()
    {
        return view('livewire.offers-vehicles',[
            'offers' => Offer::where('vehicle_id',$this->vehicleId)->paginate(2),
            'vehicle' =>$this->vehicleId
        ]);
    }
}
