<?php

namespace App\Http\Livewire;

use App\Models\Driver;
use Illuminate\Support\Str;

use App\Models\HealthCompany;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Image;


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
        // 'facebook' => 'required',
        // 'twitter' => 'required',
        // 'instagram' => 'required',
        'aboutMe'=> 'required',

    ];

    public function submit(){
        $this->validate();
        //$url = $this->image->store('image','public');
        $img = Image::make($this->image)->resize(240,310)->encode('jpg');
        $url  = Str::random(). '.jpg';
        Storage::disk('public')->put($url, $img);
        $driver = Driver::where('user_id',Auth::id())->first();
        if(empty($driver)){

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
        }else{
            session()->flash('messageWarn','Ya estas registrado recarga la pagina');
        }

        return redirect()->route('dashboard');
        // $this->reset();
        // $this->mount();

    }

    public function render()
    {
        return view('livewire.driver-form');
    }
}
