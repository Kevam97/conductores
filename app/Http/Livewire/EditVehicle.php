<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use App\Models\Line;
use App\Models\Vehicle;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Image;

class EditVehicle extends Component
{
    use WithFileUploads;

    public $brand, $line, $model, $plate, $images, $payout, $dayOff, $status;
    public $benefits, $company, $requirements, $brands=[], $lines =[];
    public Vehicle $vehicle;

    public  $rules =[
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


    public function mount(){
        $this->brand = $this->vehicle->brand->name;
        $this->line = $this->vehicle->line->name;
        $this->model = $this->vehicle->model;
        $this->plate = $this->vehicle->vehicle_registration;
        $this->payout = $this->vehicle->payout;
        $this->dayOff = $this->vehicle->days_off;
        $this->benefits = $this->vehicle->social_benefits;
        $this->company = $this->vehicle->company;
        $this->requirements = $this->vehicle->requirements;
        $this->status = $this->vehicle->status;

        $this->brands = Brand::all();
        $this->lines =  Line::all();
    }

    public function submit()
    {
        $brand = ($this->brand == $this->vehicle->brand->name ) ? $this->vehicle->brand_id : $this->brand ;
        $line = ($this->line) ? $this->vehicle->line_id : $this->line;

        $this->vehicle->brand_id = $brand;
        $this->vehicle->line_id = $line;
        $this->vehicle->model = $this->model ;
        $this->vehicle->vehicle_registration = $this->plate;
        $this->vehicle->payout = $this->payout;
        $this->vehicle->days_off = $this->dayOff ;
        $this->vehicle->social_benefits =  $this->benefits;
        $this->vehicle->company = $this->company;
        $data = [];
        if(!empty($this->images))
        {
            foreach ($this->images as $image){
                $img = Image::make($image)->resize(246,160)->encode('jpg');
                $url  = Str::random(). '.jpg';
                Storage::disk('public')->put($url, $img);

                $data[]= [
                    'vehicle_id'=> $this->vehicle->id,
                    'image'=> $image->store('images','public')
                ];
            }

            $images = $this->vehicle->images;
            foreach ($images as $key => $image) {
                $image->image = $data[$key]['image'];
                unset($data[$key]);
                $image->save();
            }

            if(!empty($data)) DB::table('images')->insert($data);
        }
        $this->vehicle->save();
        session()->flash('message','Se ha actulizado');

    }

    public function render()
    {
        return view('livewire.edit-vehicle');
    }
}
