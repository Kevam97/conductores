<?php

namespace App\Http\Livewire;

use App\Models\Annexe;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditAnnexes extends Component
{
    use WithFileUploads;

    public $file,$filePrev ,$comment, $commentPrev;
    public Annexe $annexe;

    public  $rules =[
        'file' => 'mimes:pdf,png,jpg',
        'comment' => 'required'
    ];

    public function mount()
    {
        $this->filePrev = $this->annexe->file;
        $this->commentPrev = $this->annexe->comment;
    }
    public function submit(){
        $this->comment = (empty($this->comment)) ?  $this->commentPrev : $this->comment ;
        $url = $this->file->store('documents','public');
        $this->annexe->file = $url;
        $this->annexe->comment =  $this->comment;
        $this->annexe->save();
        $this->mount();

        session()->flash('message','Se ha actulizado');


    }

    public function render()
    {
        return view('livewire.edit-annexes');
    }
}
