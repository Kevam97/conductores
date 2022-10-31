<?php

namespace App\Http\Livewire;

use App\Models\Driver;
use App\Models\HealthCompany;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class DriverForm extends Component
{
    use WithFileUploads;

    public $healthCompany,$yearsExperience ,$license, $dateLicense, $image ;
    public $facebook, $twitter, $instagram, $aboutMe;
    public $healthCompanies =[];

    public function mount(){
        $this->healthCompanies = HealthCompany::all();
    }

    public  $rules =[
        'healthCompany' => 'required',
        'license' => 'required',
        'yearsExperience' => 'required',
        'dateLicense' => 'required',
        'image' => [
            'required',
            'mimes:png,jpg'],
        'facebook' => 'required',
        'twitter' => 'required',
        'instagram' => 'required',
        'aboutMe'=> 'required',

    ];

    public function submit(){
        $this->validate();
        $url = $this->image->store('image','public');
        Driver::create([
            'user_id' => Auth::id(),
            'health_company_id' =>  $this->healthCompany,
            'experience_year'  => $this->yearsExperience,
            'driving_license' =>  $this->license,
            'license_expiration' =>  $this->dateLicense,
            'image' => $url,
            'facebook' => $this->facebook,
            'twitter' => $this->twitter,
            'instagram' => $this->instagram,
            'about_me'=> $this->aboutMe,
        ]);
        session()->flash('message','Se ha registrado el conductor correctamente');
        $this->reset();

    }

    public function render()
    {
        return view('livewire.driver-form');
    }
}
