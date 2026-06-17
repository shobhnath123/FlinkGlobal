<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TermsAcceptance extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'business_credit_application_id',
        'accepted','accepted_at','ip_address'
    ];
}
