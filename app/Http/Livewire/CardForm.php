<?php

namespace App\Http\Livewire;

use App\Models\Card;
use App\Models\User;
use App\Traits\EpaycoTrait;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CardForm extends Component
{
    use EpaycoTrait;

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

        $card = Card::create([
            'user_id' => $user->id,
            'number' => $this->number,
            'year'  => $date[0],
            'month'  =>$date[1],
            'cvc' => $this->cvc
        ]);

        $epayco = $this->create($card, $user);
        $card->epayco_id = $epayco['card'];
        $card->number = substr_replace($card->number,'***********',0,strlen($card->number)-4);
        $card->cvc = md5($card->cvc);
        $card->save();

        if ($user->epayco_id == null){
            $user->epayco_id = $epayco['customer'];
            $user->save();
        }

        session()->flash('message','Se ha registrado la tarjeta');
        return redirect()->route('subs');
    }


    public function render()
    {
        //dd($this->listPlans());
        return view('livewire.card-form');
    }
}
