<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientFormRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'agent_id',
        'email',
        'form_type',
        'token',
        'status',
        'mail_status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function agent()
    {
        return $this->belongsTo(User::class, 'agent_id');
    }
}
