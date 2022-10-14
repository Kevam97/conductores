<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Driver;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CoursesForm extends Component
{
    public  $name, $place, $date, $title;

    public  $rules =[
        'name' => 'required',
        'date' => 'required',
        'place' => 'required',
        'title' => 'required'
    ];

    public function submit(){
        $this->validate();

        Course::create([
            'user_id' => Auth::id(),
            //'driver_id' => Driver::find(Auth::id())->id,
            'name' =>  $this->name,
            'date' => $this->date,
            'place' =>  $this->name,
            'title' =>  $this->title
        ]);
        session()->flash('message','Se ha registrado el curso correctamente');
        $this->reset();

    }

    public function render()
    {
        return view('livewire.courses-form');
    }
}
