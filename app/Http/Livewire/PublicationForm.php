<?php

namespace App\Http\Livewire;

use App\Models\Publication;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class PublicationForm extends Component
{

    use WithFileUploads;

    public $file, $filePrev, $publication;

    public  $rules =[
        'file' => 'required|mimes:png,jpg',
    ];

    public function boot(){
        $this->publication = Publication::where('user_id',Auth::id())->first();
    }

    public function mount()
    {
        if (!empty($this->publication)) {
            $this->filePrev = $this->publication->file;
        }

    }

    public function submit(){
        $this->validate();
        $url = $this->file->store('image','public');

        if (empty($this->publication)) {

            Publication::create([
                'user_id' => Auth::id(),
                'file' => $url,
                'date_out' => date("Y-m-d",strtotime(date("Y-m-d")."+ 1 month"))
            ]);

            $this->reset();
            $this->mount();
        }else{

            $this->publication->file = $url;
            $this->publication->save();

            $this->reset();
            $this->boot();
            $this->mount();
        }
        session()->flash('message','Se ha subido la imagen');



    }

    public function render()
    {
        return view('livewire.publication-form');
    }
}
