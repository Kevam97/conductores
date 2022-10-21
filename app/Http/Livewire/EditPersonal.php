<?php

namespace App\Http\Livewire;

use App\Models\PersonalReference;
use Livewire\Component;

class EditPersonal extends Component
{
    public $name, $lastname, $phone, $kinship, $occupation;
    public PersonalReference $reference;

    public function mount()
    {
       $this->name = $this->reference->name;
       $this->lastname = $this->reference->lastname;
       $this->phone = $this->reference->phone;
       $this->kinship = $this->reference->kinship;
       $this->occupation = $this->reference->occupation;
    }

    public function submit()
    {
        $this->reference->name =$this->name;
        $this->reference->lastname =$this->lastname;
        $this->reference->phone =$this->phone;
        $this->reference->kinship =$this->kinship;
        $this->reference->occupation =$this->occupation;
        $this->reference->save();

        session()->flash('message','Se ha actulizado');
    }

    public function render()
    {
        return view('livewire.edit-personal');
    }
}
