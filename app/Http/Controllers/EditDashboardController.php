<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EditDashboardController extends Controller
{
    public function index()
    {
        $user = User::find(Auth::id());
        $driver = $user->drivers->first();
        return view('edit-dashboard',compact('user','driver'));

    }
}
