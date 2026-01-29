<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessCreditApplication extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'contact_person','physical_address','physical_address_dpid','postcode_phy','billing_address',
        'billing_address_dpid','postcode_bill','drivers_licence','dob','email','mobile',
        'legal_name','trading_name','gst_no','company_no','nzbn',
        'nature_business','date_incorp','paid_capital','monthly_purchases',
        'credit_limit','principal_place_of_business','to_whom',
        'po_required','accounts_email_opt','accounts_email','accounts_contact',
        'accounts_mobile','bank_branch','bank_account_no',
        'signed_client_name','signed_position','signed_date','application_type'
    ];

    public function directors() { return $this->hasMany(Director::class); }
    public function guarantors() { return $this->hasMany(Guarantor::class); }
    public function references() { return $this->hasMany(Reference::class); }
    public function terms() { return $this->hasOne(TermsAcceptance::class); }
    
    public function latestMailLog()
    {
        return $this->hasOne(MailLog::class, 'business_account_id')->latestOfMany();
    }
}
