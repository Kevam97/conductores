<?php

namespace App\Http\Livewire;

use App\Models\Annexe;
use App\Models\Driver;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class AnnexesForm extends Component
{
    use WithFileUploads;

    public $file, $comment;

    public  $rules =[
        'file' => [
            'required',
            'mimes:pdf,png,jpg'
        ],
        'comment' => 'required'
    ];

    public function submit(){
        $this->validate();
        $url = $this->file->store('documents','public');
        Annexe::create([
            'driver_id' => Driver::find(Auth::id())->id,
            'file' =>  $url,
            'comment' =>  $this->comment
        ]);
        session()->flash('message','Se ha subido el documento');
        $this->reset();

    }

    public function render()
    {
        return view('livewire.annexes-form');
    }
}
