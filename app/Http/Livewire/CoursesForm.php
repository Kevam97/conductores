<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Driver;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CoursesForm extends Component
{
    public  $name, $place, $date, $title;
    public $count, $driver;

    public function mount()
    {
        $this->driver = Driver::where('user_id',Auth::id())->first();
        $this->count = ($this->driver) ? $this->driver->courses->count(): 0 ;
    }

    public  $rules =[
        'name' => 'required',
        'date' => 'required',
        'place' => 'required',
        'title' => 'required'
    ];

    public function submit(){
        $this->validate();
        if ($this->count < 3) {
            if ($this->driver) {
                Course::create([
                    'driver_id' => $this->driver->id,
                    'name' =>  $this->name,
                    'date' => $this->date,
                    'place' =>  $this->name,
                    'title' =>  $this->title
                ]);
                session()->flash('message','Se ha registrado el curso');

            }else{
                session()->flash('messageError','Registre los datos del conductor');
            }
        }else
            session()->flash('messageWarn','No puede registrar más');

        $this->reset();
        $this->mount();

    }

    public function render()
    {
        return view('livewire.courses-form');
    }
}
