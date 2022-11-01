<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Publication;
use App\Models\Rating;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RateController extends Controller
{
    public function show(User $user){
        $user->load('drivers');
        $publications = Publication::where('status',1)->get();
        return view('ratings', compact('user','publications'));
    }

    public function topTen(){
       $rates = Rating::select('driver_id',\DB::raw("avg(stars) as stars "), \DB::raw("count(stars) as arrivals"))->groupBy('driver_id')->orderby( 'stars','desc')->with('driver.user')->take(10)->get();
    //    dd($rates);

       return view('top-ten', compact('rates'));
    }
}
