<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EditOwnerController extends Controller
{
    public function index(  )
    {
        $user = User::find(Auth::id());
        $owner = $user->owners->first();

        return view('edit-owner', compact('user','owner'));
    }
}
