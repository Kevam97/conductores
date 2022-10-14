<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RateController extends Controller
{
    public function show(User $user){

        return view('ratings', compact('user'));
    }
}
