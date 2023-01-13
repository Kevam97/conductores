<?php

namespace App\Http\Livewire;

use App\Models\Bill;
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

    private function form(){
        if(!empty($this->user->drivers[0]->annexes) && !empty($this->user->drivers[0]->personalReferences) && !empty($this->user->drivers[0]->workReferences) && !empty($this->user->drivers[0]->courses))
        {
            if(count($this->user->drivers[0]->annexes) == 3 && count($this->user->drivers[0]->personalReferences) == 3 && count($this->user->drivers[0]->workReferences) == 3 && count($this->user->drivers[0]->courses) == 3){
                return true;
            }else return false;
        }
        if(!empty($this->user->owners[0]->vehicles) &&count($this->user->owners[0]->vehicles) >= 1){
            return true;
        }
        return false;
        // if(!empty($this->user->drivers[0]->annexes))
    }

    public function submit()
    {
        $this->validate();
        $form = $this->form();
        if($form){
            $this->plan = ($this->user->hasRole('Conductor'))  ? 'Conductor' : 'Propietario';
            $sub = $this->subscriptions($this->user,$this->plan,$this->card );
            // dd($sub);
            if($sub->status){
                $this->user->subscription = $sub->id;
                $this->user->save();
            }
            $pay = $this->paySubscriptions($this->user,$this->plan,$this->card);
            // dd($pay);
            if(empty($pay->status) && isset($pay->success)){
                Bill::create([
                    'user_id' => $this->user->id,
                    'reference' => $pay->data->factura,
                    'status' => 1,
                    'cutoff' => $pay->data->fecha
                ]);
                $this->addPermission($this->user);
                session()->flash('message','Te has suscrito correctamente');

            }else{
                session()->flash('messageError',$pay->message);
            }
        }else{
            session()->flash('messageError','Debes completar regsitrar toda la informacion antes de suscribirte');
        }
    }

    public function render()
    {

        // dd($this->getSubscription($this->user->subscription));
        return view('livewire.susbscription-form');
    }
}
