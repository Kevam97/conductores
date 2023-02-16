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
            'drivers' => Driver::whereHas('annexes', function ($query) {
                $query->where('comment', 'curriculum');
            })->with('annexes')->paginate(2)

        ]);
    }
}
