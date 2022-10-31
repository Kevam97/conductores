<?php

namespace App\Http\Livewire;

use App\Models\WorkReference;
use Livewire\Component;

class EditWork extends Component
{
    public  $company, $phone, $starDate, $endDate, $reason, $contact, $ocupation, $others;
    public WorkReference $workReference;

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

    public function mount()
    {
        $this->company = $this->workReference->company;
        $this->phone = $this->workReference->phone;
        $this->starDate = $this->workReference->start_date;
        $this->endDate = $this->workReference->end_date;
        $this->reason = $this->workReference->reason_living;
        $this->contact = $this->workReference->contact;
        $this->ocupation = $this->workReference->occupation_contact;
        $this->others = $this->workReference->others;
    }

    public function submit()
    {
        $this->workReference->company = $this->company;
        $this->workReference->phone = $this->phone;
        $this->workReference->start_date = $this->starDate;
        $this->workReference->end_date = $this->endDate;
        $this->workReference->reason_living = $this->reason;
        $this->workReference->contact  = $this->contact;
        $this->workReference->occupation_contact = $this->ocupation;
        $this->workReference->others = $this->others;
        $this->workReference->save();

        session()->flash('message','Se ha actualizado');

    }
    public function render()
    {
        return view('livewire.edit-work');
    }
}
