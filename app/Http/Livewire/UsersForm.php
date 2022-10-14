<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Illuminate\Validation\Rules;

class UsersForm extends Component
{
    public $name, $lastname, $docType, $doc, $address, $phone, $email, $country;
    public $town, $birth, $password;

    public  $rules =[
        'name' => 'required',
        'lastname' => 'required',
        'docType' => 'required',
        'doc' => 'required',
        'address' => 'required',
        'phone' => 'required',
        'email' => 'required',
        'country' => 'required',
        'town' => 'required',
        'password'  =>'required'

    ];

    public function submit(){
       $this->validate();
        $user= User::create([
            'name' => $this->name,
            'lastname' => $this->lastname,
            'documentType' => $this->docType,
            'document' => $this->doc,
            'address' => $this->address,
            'phone' => $this->phone,
            'email'  => $this->email,
            'country' => $this->country,
            'town' => $this->town,
            'birth' => $this->birth,
            'password' => Hash::make($this->password)
        ]);

        event(new Registered($user));

        Auth::login($user);
       return redirect(RouteServiceProvider::HOME);
    }



    public function render()
    {
        return view('livewire.users-form');
    }
}
