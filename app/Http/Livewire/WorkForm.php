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

        WorkReference::create([
            'driver' => Driver::find(Auth::id())->id,
            'company' => $this->company,
            'phone' => $this->phone,
            'start_date' => $this->starDate,
            'end_date' => $this->endDate,
            'reason_living' => $this->reason,
            'contact' => $this->contact,
            'occupation_contact' => $this->ocupation,
            'others' => $this->others,
        ]);
        session()->flash('message','Se ha registrado la referencia laboral');
        $this->reset();

    }
    public function render()
    {
        return view('livewire.work-form');
    }
}
