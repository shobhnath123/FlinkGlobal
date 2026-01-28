<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'business_account_id',
        'cash_account_id',
        'recipient_email',
        'subject',
        'body',
        'status',
        'attachment_details',
        'error_message',
        'ip_address',
        'user_agent'
    ];

    protected $casts = [
        'attachment_details' => 'json',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    // Relationships
    public function businessAccount()
    {
        return $this->belongsTo(BusinessAccount::class);
    }

    public function cashAccount()
    {
        return $this->belongsTo(CashAccount::class);
    }
}
