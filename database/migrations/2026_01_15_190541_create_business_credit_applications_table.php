<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
       Schema::create('business_credit_applications', function (Blueprint $table) {
        $table->id();

        // CLIENT DETAILS
        $table->string('contact_person')->nullable();
        $table->string('physical_address')->nullable();
        $table->string('postcode_phy')->nullable();
        $table->string('billing_address')->nullable();
        $table->string('postcode_bill')->nullable();
        $table->string('drivers_licence')->nullable();
        $table->date('dob')->nullable();
        $table->string('email')->nullable();
        $table->string('mobile')->nullable();

        // BUSINESS DETAILS
        $table->string('legal_name')->nullable();
        $table->string('trading_name')->nullable();
        $table->string('gst_no')->nullable();
        $table->string('company_no')->nullable();
        $table->string('nzbn')->nullable();
        $table->string('nature_business')->nullable();
        $table->date('date_incorp')->nullable();
        $table->decimal('paid_capital', 12, 2)->nullable();
        $table->decimal('monthly_purchases', 12, 2)->nullable();
        $table->decimal('credit_limit', 12, 2)->nullable();
        $table->string('principal_place_of_business')->nullable();
        $table->string('to_whom')->nullable();

        // PAYMENT TERMS
        $table->enum('po_required', ['Yes', 'No'])->default('No');
        $table->enum('accounts_email_opt', ['Yes', 'No'])->default('Yes');
        $table->string('accounts_email')->nullable();
        $table->string('accounts_contact')->nullable();
        $table->string('accounts_mobile')->nullable();
        $table->string('bank_branch')->nullable();
        $table->string('bank_account_no')->nullable();

        // SIGNATURE
        $table->string('signed_client_name')->nullable();
        $table->string('signed_position')->nullable();
        $table->string('application_type')->nullable();
        $table->date('signed_date')->nullable();

        $table->timestamps();
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_credit_applications');
    }
};
