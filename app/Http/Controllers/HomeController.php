<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\EpaycoTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    use EpaycoTrait;

    public function validatePermission(){
        $user = Auth::user();
        $change = $this->validateSubscription($user);
        if($change){
            $this->revokePermission($user);
        }
    }

    public function validateSubscription(User $user){

        $sub = $this->getSubscription($user->subscription);
        if($sub->status){
            if ($sub->status_plan != 'active') {
                return true;
            }
        }
        return false;
    }

    public function index(){
        $this->validatePermission();
        return view('home');
    }
}
