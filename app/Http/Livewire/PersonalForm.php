<?php

namespace App\Http\Livewire;

use App\Models\Driver;
use App\Models\PersonalReference;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PersonalForm extends Component
{
    public $name, $lastname, $phone, $kinship, $occupation;

    public  $rules =[
        'name' => 'required',
        'lastname' => 'required',
        'phone' => 'required',
        'kinship' => 'required',
        'occupation' => 'required',
    ];
    public function submit(){
        $this->validate();
        $driver =Driver::find(Auth::id());
        if ($driver) {
            PersonalReference::create([
                'driver_id' => Driver::find(Auth::id())->id,
                'name' => $this->name,
                'lastname' => $this->lastname,
                'phone' => $this->phone,
                'kinship' => $this->kinship,
                'occupation' => $this->occupation,
            ]);
            session()->flash('message','Se ha subido el documento');

        }else{
            session()->flash('messageError','Registre los datos del conductor');
        }
        $this->reset();

    }


    public function render()
    {
        return view('livewire.personal-form');
    }
}
