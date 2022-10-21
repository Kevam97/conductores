<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class EditUser extends Component
{
    public $name, $lastname, $docType, $doc, $address, $phone, $email, $country;
    public $town, $birth, $password;
    public User $user;

    public function mount(){

        $this->name = $this->user->name;
        $this->lastname = $this->user->lastname;
        $this->docType = $this->user->documentType;
        $this->doc = $this->user->document;
        $this->address = $this->user->address;
        $this->phone = $this->user->phone;
        $this->email = $this->user->email;
        $this->country = $this->user->country;
        $this->town = $this->user->town;
    }

    public  $rules =[
        'name' => 'required',
        'lastname' => 'required',
        'docType' => 'required',
        'doc' => 'required',
        'address' => 'required',
        'phone' => 'required',
        'email' => 'required',
        'country' => 'required',
        'town' => 'required'

    ];

    public function submit(){
        $this->validate();
        if (empty($this->password)) {
            $this->password =  $this->user->password;
        }

        $this->user->name =  $this->name;
        $this->user->lastname = $this->lastname;
        $this->user->documentType =  $this->docType;
        $this->user->document = $this->doc;
        $this->user->address = $this->address;
        $this->user->phone = $this->phone;
        $this->user->email = $this->email;
        $this->user->country = $this->country;
        $this->user->town = $this->town;
        $this->user->password = $this->password;
        $this->user->save();

        session()->flash('message','Se ha actulizado');

    }


    public function render()
    {
        return view('livewire.edit-user');
    }
}
