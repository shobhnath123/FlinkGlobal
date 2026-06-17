<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'business_credit_application_id',
        'full_name','dob','mobile','address','drivers_licence','postcode'
    ];
}
