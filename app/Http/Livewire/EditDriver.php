<?php

namespace App\Http\Livewire;

use App\Models\Driver;
use App\Models\HealthCompany;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditDriver extends Component
{
    use WithFileUploads;

    public $healthCompany,$yearsExperience ,$license, $dateLicense, $image, $imagePrev;
    public Driver $driver;
    public $healthCompanies =[];

    public function mount(){
        $this->healthCompany = $this->driver->healthCompany->name;
        $this->yearsExperience = $this->driver->experience_year;
        $this->license = $this->driver->driving_license;
        $this->dateLicense = $this->driver->license_expiration;
        $this->imagePrev = $this->driver->image;
        $this->healthCompanies = HealthCompany::all();
    }

    public function submit(){

        $health = ($this->healthCompany = $this->driver->healthCompany->name) ? $this->driver->health_company_id : $this->healthCompany ;
        $url = (empty($this->image)) ? $this->driver->image : $this->image->store('image','public') ;

        $this->driver->health_company_id = $health;
        $this->driver->experience_year =   $this->yearsExperience;
        $this->driver->driving_license = $this->license;
        $this->driver->license_expiration = $this->dateLicense;
        $this->driver->image = $url;
        $this->driver->save();
        $this->mount();
        session()->flash('message','Se ha actulizado');

    }


    public function render()
    {
        return view('livewire.edit-driver');
    }
}
