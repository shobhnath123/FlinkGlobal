<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = [
        'title',
        'line1',
        'line2',
        'status',
        'position',
        'image'
    ];
}
