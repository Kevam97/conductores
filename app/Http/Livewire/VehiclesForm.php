<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use App\Models\Image;
use App\Models\Line;
use App\Models\Owner;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;


class VehiclesForm extends Component
{
    use WithFileUploads;

    public $brand, $line, $model, $plate, $images, $payout, $dayOff;
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
        'images'  =>
            'array|min:1|max:5',
			'images.*' => 'image|max:10240' // 10MB Ma
        ,
        'payout' => 'required',
        'dayOff' => 'required',
        'benefits' => 'required',
        'company' => 'required',
        'requirements' => 'required'
    ];

    public function submit(){
       $this->validate();
        $vehicle= Vehicle::create([
            'brand_id' => $this->brand,
            'line_id' => $this->line,
            'owner_id' => Owner::where('user_id',Auth::id())->first()->id,
            'model' => $this->model,
            'vehicle_registration' => $this->plate,
            'payout' => $this->payout,
            'days_off' => $this->dayOff,
            'social_benefits' => $this->benefits,
            'company' => $this->company,
            'requirements' => $this->requirements
        ]);
        $data = [];
        foreach ($this->images as $image) {
            $data[]= [
                'vehicle_id'=> $vehicle->id,
                'image'=> $image->store('images','public')
            ];
        }
        DB::table('images')->insert($data);
        session()->flash('message','Se ha registrado el vehiculo');
        $this->reset();

    }

    public function render()
    {
        return view('livewire.vehicles-form');
    }
}
