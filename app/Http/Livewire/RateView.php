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
    public $rate, $comment;

    public $rules = [
        'comment' => 'required'
    ];

    public function submit(){
        $driver = Driver::where('user_id',$this->user->id)->first();
        $stars = (empty($this->rate)) ? 0 : $this->rate ;
        $this->validate();
        if ($driver) {
            Rating::create([
                'driver_id' =>$driver->id,
                'comment'=>$this->comment,
                'stars' => $stars,
                'ip' =>request()->ip()
            ]);
            session()->flash('message','Calificacion guardada');
        }else{
            session()->flash('messageError','El conductor no se ha registrado aún');
        }
    }

    public function setRating($var)
    {
        if ($this->rate== $var) $this->rate = 0;
        else $this->rate = $var;
    }

    public function render()
    {
        return view('livewire.rate-view');
    }
}
