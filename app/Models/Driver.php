<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected $casts =[
        'license_expiration' => 'date'
    ];

    public function workReferences(){
        return $this->hasMany(WorkReference::class);
    }

    public function personalReferences(){
        return $this->hasMany(PersonalReference::class);
    }

    public function ratings(){
        return $this->hasMany(Rating::class);
    }

    public function annexes(){
        return $this->hasMany(Annexe::class);
    }

    public function courses(){
        return $this->hasMany(Course::class);
    }

    public function healthCompany()
    {
        return $this->belongsTo(HealthCompany::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function offers()
    {
        return $this->hasMany(Offer::class);
    }

    public function vehicle()
    {
        return $this->hasOne(Vehicle::class);
    }

}
