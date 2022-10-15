<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use App\Models\Line;
use App\Models\Owner;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class VehiclesForm extends Component
{
    use WithFileUploads;

    public $brand, $line, $model, $plate, $image, $payout, $dayOff;
    public $benefits, $company, $requirements, $brands=[], $lines =[];

    public function mount(){
        $this->brands = Brand::all();
        $this->lines =  Line::all();
    }

    public  $rules =[
        'brand' => 'required',
        'line' => 'required',
        'model' => 'required',
        'plate' => 'required',
        'image'  => [
            'required',
            'mimes:pdf,png,jpg'
        ],
        'payout' => 'required',
        'dayOff' => 'required',
        'benefits' => 'required',
        'company' => 'required',
        'requirements' => 'required'
    ];

    public function submit(){
        $this->validate();
        $url = $this->image->store('documents','public');

        $dd= Vehicle::create([
            'brand_id' => $this->brand,
            'line_id' => $this->line,
            'owner_id' => Owner::where('user_id',Auth::id())->first()->id,
            'model' => $this->model,
            'vehicle_registration' => $this->plate,
            'image'  => $url,
            'payout' => $this->payout,
            'days_off' => $this->dayOff,
            'social_benefits' => $this->benefits,
            'company' => $this->company,
            'requirements' => $this->requirements
        ]);
        session()->flash('message','Se ha regsitrado el vehiculo');
        $this->reset();

    }

    public function render()
    {
        return view('livewire.vehicles-form');
    }
}
