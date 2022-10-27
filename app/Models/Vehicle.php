<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public function line()    {
        return $this->belongsTo(Line::class);
    }

    public function brand()    {
        return $this->belongsTo(Brand::class);
    }

    public function owner(){
        return $this->belongsTo(Owner::class);
    }

    public function images(){
        return $this->hasMany(Image::class);
    }

    public function offers()
    {
        return $this->hasMany(Offer::class);
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }
}
