<?php

namespace App\Http\Livewire;

use App\Models\Driver;
use Livewire\Component;
use Livewire\WithPagination;

class OfferDriver extends Component
{
    use WithPagination;
    public function render()
    {
        return view('livewire.offer-driver',[
            'drivers' => Driver::where('status',1)->with(['annexes'=> function($query)
                                {$query->where('comment','curriculum');}])->paginate(2)
        ]);
    }
}
