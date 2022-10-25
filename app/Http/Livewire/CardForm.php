<?php

namespace App\Http\Livewire;

use App\Models\Card;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CardForm extends Component
{
    public $number, $date, $cvc;

    public $rules = [
        'number' => 'required',
        'date' => 'required',
        'cvc' => 'required'
    ];

    public function submit()
    {
        $this->validate();

        $date= explode("-",$this->date);
        $user = User::find(Auth::id());

        Card::create([
            'user_id' => $user->id,
            'epayco_id'  => null,
            'number' => $this->number,
            'year'  => $date[0],
            'month'  =>$date[1],
            'cvc' => $this->cvc
        ]);

        session()->flash('message','Se ha registrado la tarjeta');

    }


    public function render()
    {
        return view('livewire.card-form');
    }
}
