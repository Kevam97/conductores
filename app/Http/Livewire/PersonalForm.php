<?php

namespace App\Http\Livewire;

use App\Models\Driver;
use App\Models\PersonalReference;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PersonalForm extends Component
{
    public $name, $lastname, $phone, $kinship, $occupation;
    public $count, $driver;

    public function mount(){
        $this->driver = Driver::where('user_id',Auth::id())->first();
        $this->count = ($this->driver) ? $this->driver->personalReferences->count() : 0 ;
    }

    public  $rules =[
        'name' => 'required',
        'lastname' => 'required',
        'phone' => 'required',
        'kinship' => 'required',
        'occupation' => 'required',
    ];
    public function submit(){
        $this->validate();
        if($this->count < 3){
            if ($this->driver) {
                PersonalReference::create([
                    'driver_id' => $this->driver->id,
                    'name' => $this->name,
                    'lastname' => $this->lastname,
                    'phone' => $this->phone,
                    'kinship' => $this->kinship,
                    'occupation' => $this->occupation,
                ]);
                    session()->flash('message','Se ha regsitrado correctamente');

                }else{
                    session()->flash('messageError','Registre los datos del conductor');
                }
        }else{
            session()->flash('messageWarn','No puede registrar más');
        }
        $this->reset();
        $this->mount();

    }


    public function render()
    {
        return view('livewire.personal-form');
    }
}
