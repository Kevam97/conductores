<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected $casts =[
        'created_at' => 'date'
    ];

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }
}
