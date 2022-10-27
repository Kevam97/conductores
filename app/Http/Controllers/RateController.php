<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Rating;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RateController extends Controller
{
    public function show(User $user){
        $user->load('drivers');
        return view('ratings', compact('user'));
    }

    public function topTen(){
       //$drivers = Driver::with('ratings')->avg('stars')->get();
       $rates = Rating::select('driver_id',\DB::raw("avg(stars) as stars ") )->groupBy('driver_id')->orderby( 'stars','desc')->with('driver.user')->take(10)->get();
       return view('top-ten', compact('rates'));
    }
}
