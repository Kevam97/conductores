<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Livewire\Component;

class EditCourses extends Component
{
    public  $name, $place, $date, $title;
    public Course $course;

    public function mount(){
        $this->name = $this->course->name;
        $this->place = $this->course->place;
        $this->date = $this->course->date;
        $this->title = $this->course->title;
    }
    public function submit()
    {
        $this->course->name = $this->name;
        $this->course->place = $this->place;
        $this->course->date = $this->date;
        $this->course->title = $this->title;
        $this->course->save();

        session()->flash('message','Se ha actualizado');
    }
    public function render()
    {
        return view('livewire.edit-courses');
    }
}
