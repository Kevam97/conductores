<?php

namespace App\Http\Livewire;

use App\Models\Driver;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mediconesystems\LivewireDatatables\NumberColumn;

use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class ProponentsDatatable extends LivewireDatatable
{
    public function builder()
    {
        // $user =  User::with('owners.vehicles.offers')->where('id', Auth::id())->query();
        // $driver = $user[0]->owners[0]->vehicles;
        // dd($driver);
        return User::query();
    }

    public function columns()
    {
       return [
        NumberColumn::name('id')
        ->label('ID'),];
    }
}
