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
    public $count, $driver;

    public function mount()
    {
        $this->driver = Driver::where('user_id',Auth::id())->first();
        $this->count = ($this->driver) ? $this->driver->annexes->count() : 0  ;
    }

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
        if($this->count < 3){
            if ($this->driver) {
                Annexe::create([
                        'driver_id' => $this->driver->id,
                        'file' =>  $url,
                        'comment' =>  $this->comment
                    ]);
                    session()->flash('message','Se ha subido el documento');

                }else{
                    session()->flash('messageError','Registre los datos del conductor');
                }
        }else{
            session()->flash('messageWarn','No puede registrar más');
        }

        $this->reset();
        $this->mount();

    }

    public function render()
    {
        return view('livewire.annexes-form');
    }
}
