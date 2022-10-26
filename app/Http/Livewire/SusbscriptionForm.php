<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Traits\EpaycoTrait;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SusbscriptionForm extends Component
{
    use EpaycoTrait;

    public $plan,$card,$cards =[], $driver = 'driver', $owner = 'Propietario';
    private $user;

    public function boot()
    {
        $this->user = User::find(Auth::id());
    }

    public function mount(){
        $this->cards = $this->user->cards;
    }

    public  $rules =[
        'card' => 'required',
    ];

    public function submit()
    {
        $this->validate();
        $this->plan = ($this->user->hasRole('Conductor'))  ? 'Conductor' : 'Propietario';
        //dd($this->plan);
        $sub = $this->subscriptions($this->user,$this->plan,$this->card );
        if($sub->status && $this->user->subscription == null){
            $this->user->subscription = $sub->id;
            $this->user->save();
        }
        $pay = $this->paySubscriptions($this->user,$this->card);

        dd($pay);
    }

    public function render()
    {
        // $this->__construct();
        // dd($this->listPlans());
        return view('livewire.susbscription-form');
    }
}
