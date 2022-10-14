<?php

namespace App\Http\Livewire;

use App\Models\Driver;
use App\Models\Rating;
use App\Models\User;
use GuzzleHttp\Psr7\Request;
use Livewire\Component;

class RateView extends Component
{
    public User $user;
    public $rate;

    public function submit(){
        Rating::create([
            'driver_id' =>Driver::where('user_id',$this->user->id)->first()->id,
            'stars' =>$this->rate,
            'ip' =>request()->ip()
        ]);

        session()->flash('message','Calificacion guardada');
    }

    public function render()
    {
        return view('livewire.rate-view');
    }
}
