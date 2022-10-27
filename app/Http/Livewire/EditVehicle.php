<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use App\Models\Line;
use App\Models\Vehicle;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditVehicle extends Component
{
    use WithFileUploads;

    public $brand, $line, $model, $plate, $images, $payout, $dayOff;
    public $benefits, $company, $requirements, $brands=[], $lines =[];
    public Vehicle $vehicle;

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
            foreach ($this->images as $image)
            $data[]= [
                'vehicle_id'=> $this->vehicle->id,
                'image'=> $image->store('images','public')
            ];

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
