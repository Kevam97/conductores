<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Traits\EpaycoTrait;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SubscriptionCancel extends Component
{
    use EpaycoTrait;

    public function submit(){
        $user = User::find(Auth::id());

        $cancel = $this->cancelSubscription($user->subscription);
        $this->revokePermission($user);
        if($cancel->status){
            session()->flash('message',$cancel->message);
        }else{
            session()->flash('messageError',$cancel->message);

        }
    }
    public function render()
    {
        return view('livewire.subscription-cancel');
    }
}
