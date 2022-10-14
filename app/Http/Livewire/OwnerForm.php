<?php

namespace App\Http\Livewire;

use App\Models\Owner;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class OwnerForm extends Component
{
    public $notes;
    public  $rules =[
        'notes' => 'required'
    ];

    public function submit(){
        $this->validate();
        Owner::create([
            "user_id" => Auth::id(),
            "notes" => $this->notes
        ]);
        session()->flash('message','Se ha registrado el Propietario');
        $this->reset();


    }

    public function render()
    {
        return view('livewire.owner-form');
    }
}
