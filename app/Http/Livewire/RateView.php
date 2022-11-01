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

    private function ruleIp($id, $ip)
    {
        $date = date("Y-m-d");
        $dateEnd =  date("Y-m-d").' 23:59:59';
        $rating =Rating::where('driver_id',$id)
                ->where('ip',$ip)
                ->where('created_at','>',$date)
                ->where('created_at','<',$dateEnd)
                ->get();
        $ruleIp = (empty($rating)) ? true : false ;
        return $ruleIp;

    }

    public function submit(){
        $driver = $this->user->drivers->first();
        $stars = (empty($this->rate)) ? 0 : $this->rate ;
        $this->validate();
        if ($driver) {
            if(!empty($driver->vehicle))
            {
                $ip =request()->ip();
                $flag = $this->ruleIp($driver->id, $ip);
                if ($flag) {
                    Rating::create([
                    'driver_id' =>$driver->id,
                    'comment'=>$this->comment,
                    'stars' => $stars,
                    'ip' =>$ip
                    ]);
                    session()->flash('message','Calificacion guardada');
                }else{
                    session()->flash('messageError','Ya calificaste al conductor');
                }
            }
            else
            {
                session()->flash('messageError','El conductor no tiene asignado un vehiculo');
            }
        }
        else
        {
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
