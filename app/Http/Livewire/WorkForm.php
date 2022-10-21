<?php

namespace App\Http\Livewire;

use App\Models\Driver;
use App\Models\WorkReference;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class WorkForm extends Component
{
    public  $company, $phone, $starDate, $endDate, $reason;
    public $contact, $ocupation, $others;
    public $count, $driver;

    public function mount()
    {
        $this->driver = Driver::where('user_id',Auth::id())->first();
        $this->count = $this->driver->workReferences->count();
    }


    public  $rules =[
        'company' => 'required',
        'phone' => 'required',
        'starDate' => 'required',
        'endDate' => 'required',
        'reason'  => 'required',
        'contact' => 'required',
        'ocupation' => 'required',
        'others' => 'required',
    ];
    public function submit(){
        $this->validate();

        if($this->count < 3){
            if ($this->driver) {
                WorkReference::create([
                    'driver' => $this->driver->id,
                    'company' => $this->company,
                    'phone' => $this->phone,
                    'start_date' => $this->starDate,
                    'end_date' => $this->endDate,
                    'reason_living' => $this->reason,
                    'contact' => $this->contact,
                    'occupation_contact' => $this->ocupation,
                    'others' => $this->others,
                ]);
                session()->flash('message','Se registrado correctamente');

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
        return view('livewire.work-form');
    }
}
