<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterUser extends Controller
{

    public function index(){
        return view('registro');
    }
}
