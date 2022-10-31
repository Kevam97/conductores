<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EditOwnerController extends Controller
{
    public function proponents(  )
    {
        $user = User::find(Auth::id());
        $owner = $user->owners->first();
        return view('owner-drivers', compact('owner'));
    }

    public function index(  )
    {
        $user = User::find(Auth::id());
        $owner = $user->owners->first();

        return view('edit-owner', compact('user','owner'));
    }

    public function getDriver(User $user){
        $user->load('drivers');
        $driver =$user->drivers->first();
       # dd($driver );
        return view('view-driver',compact('user','driver'));
    }
}
