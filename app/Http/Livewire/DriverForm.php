<?php

namespace App\Http\Livewire;

use App\Models\Driver;
use App\Models\HealthCompany;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DriverForm extends Component
{
    public $healthCompany,$yearsExperience ,$license, $dateLicense;
    public $healthCompanies =[];

    public function mount(){
        $this->healthCompanies = HealthCompany::all();
    }

    public  $rules =[
        'healthCompany' => 'required',
        'license' => 'required',
        'yearsExperience' => 'required',
        'dateLicense' => 'required'
    ];

    public function submit(){
        $this->validate();

        Driver::create([
            'user_id' => Auth::id(),
            'health_company_id' =>  $this->healthCompany,
            'experience_year'  => $this->yearsExperience,
            'driving_license' =>  $this->license,
            'license_expiration' =>  $this->dateLicense
        ]);
        session()->flash('message','Se ha registrado el conductor correctamente');
        $this->reset();

    }

    public function render()
    {
        return view('livewire.driver-form');
    }
}
