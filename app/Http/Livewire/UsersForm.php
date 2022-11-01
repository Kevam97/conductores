<?php

namespace App\Http\Livewire;

use App\Models\Owner;
use App\Models\Publication;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
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
    public $town, $birth, $password, $role;

    public $roles =[];

    public function mount()
    {
        $this->roles = Role::where('id','>',1)->get();
       // dd( $this->roles);
    }

    public  $rules =[
        'name' => 'required',
        'lastname' => 'required',
        'docType' => 'required',
        'doc' => 'required|unique:users,document',
        'address' => 'required',
        'birth'  => 'required',
        'phone' => 'required',
        'email' => 'required|unique:users,email',
        'country' => 'required',
        'town' => 'required',
        'password'  =>'required',
        'role'=>'required'

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
            'password' => Hash::make($this->password),
        ]);

        $role = Role::find($this->role);
        event(new Registered($user));
        $user->assignRole($role);
        if ($role->name == "Propietario") Owner::create(['user_id' => $user->id]);
        if ($role->name == "Publicador") Publication::create(['user_id' => $user->id]);
        Auth::login($user);
       return redirect(RouteServiceProvider::HOME);
    }



    public function render()
    {
        return view('livewire.users-form');
    }
}
