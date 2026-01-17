<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guarantor extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'business_credit_application_id',
        'signed','full_name','address','dob',
        'witness_name','witness_occupation','witness_address',
        'witness_signature_date'
    ];
}
