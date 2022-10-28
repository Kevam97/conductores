<?php

namespace App\Http\Livewire;

use App\Models\Owner;
use App\Models\Vehicle;
use Livewire\Component;
use Livewire\WithPagination;

class OwnerRates extends Component
{
    use WithPagination;

    public Owner $owner;

    public function render()
    {
        return view('livewire.owner-rates',
            ['vehicles' => Vehicle::with('driver')->where('owner_id',$this->owner->id)
                                                  ->whereNotNull('driver_id')->paginate(1) ]
        );
    }
}
