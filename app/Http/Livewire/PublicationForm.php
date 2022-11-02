<?php

namespace App\Http\Livewire;

use App\Models\Publication;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

use Livewire\WithFileUploads;
use Image;
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
        // $url = $this->file->store('publicity','public');

        $img = Image::make($this->file)->resize(400,160)->encode('jpg');
        $name  = Str::random(). '.jpg';
        Storage::disk('public')->put($name, $img);

        $url = $this->file;
        if (empty($this->publication)) {

            Publication::create([
                'user_id' => Auth::id(),
                'file' => $name,
                'date_out' => date("Y-m-d",strtotime(date("Y-m-d")."+ 1 month"))
            ]);

            $this->reset();
            $this->mount();
        }else{

            $this->publication->file = $name;
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
