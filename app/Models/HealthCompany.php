<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthCompany extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function drivers()
    {
        return $this->hasMany(Driver::class);
    }
}
