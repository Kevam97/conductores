<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

}
