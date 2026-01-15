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
        Schema::table('business_applications', function (Blueprint $table) {
            // Client Details
            $table->string('contact_person_name')->nullable();
            $table->text('physical_address')->nullable();
            $table->string('physical_postcode')->nullable();
            $table->text('billing_address')->nullable();
            $table->string('billing_postcode')->nullable();
            $table->string('client_licence')->nullable();
            $table->date('client_dob')->nullable();
            $table->string('client_email')->nullable();
            $table->string('client_mobile')->nullable();
            // Credit account specific
            $table->string('postcode_phy')->nullable();
            $table->string('postcode_bill')->nullable();
            $table->string('drivers_licence')->nullable();
            $table->date('dob')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile')->nullable();
            // Business Details
            $table->string('legal_name')->nullable();
            $table->string('trading_name')->nullable();
            $table->string('gst_no')->nullable();
            $table->string('company_number')->nullable();
            $table->string('nzbn_number')->nullable();
            $table->string('company_no')->nullable();
            $table->string('nzbn')->nullable();
            $table->string('nature_business')->nullable();
            $table->date('date_incorp')->nullable();
            $table->decimal('paid_capital', 10, 2)->nullable();
            $table->decimal('monthly_purchases', 10, 2)->nullable();
            $table->decimal('credit_limit', 10, 2)->nullable();
            // Directors (cash account)
            $table->json('directors')->nullable();
            // Directors (credit account)
            $table->string('dir1_name')->nullable();
            $table->string('dir1_mobile')->nullable();
            $table->string('dir1_dl')->nullable();
            $table->text('dir1_address')->nullable();
            $table->string('dir1_pc')->nullable();
            $table->string('dir2_name')->nullable();
            $table->string('dir2_mobile')->nullable();
            $table->string('dir2_dl')->nullable();
            $table->text('dir2_address')->nullable();
            $table->string('dir2_pc')->nullable();
            // Payment Terms
            $table->string('po_required')->nullable();
            $table->string('accounts_email_opt')->nullable();
            $table->string('accounts_email')->nullable();
            $table->string('accounts_contact')->nullable();
            $table->string('accounts_mobile')->nullable();
            $table->string('bank_branch')->nullable();
            $table->string('bank_account_no')->nullable();
            // References
            $table->string('ref1_name')->nullable();
            $table->string('ref1_company')->nullable();
            $table->string('ref1_contact')->nullable();
            $table->string('ref2_name')->nullable();
            $table->string('ref2_company')->nullable();
            $table->string('ref2_contact')->nullable();
            $table->string('ref3_name')->nullable();
            $table->string('ref3_company')->nullable();
            $table->string('ref3_contact')->nullable();
            // Guarantors
            $table->string('g1_name')->nullable();
            $table->text('g1_address')->nullable();
            $table->date('g1_dob')->nullable();
            $table->string('g1_witness_name')->nullable();
            $table->string('g1_witness_occ')->nullable();
            $table->text('g1_witness_addr')->nullable();
            $table->string('g2_name')->nullable();
            $table->text('g2_address')->nullable();
            $table->date('g2_dob')->nullable();
            $table->string('g2_witness_name')->nullable();
            $table->string('g2_witness_occ')->nullable();
            $table->text('g2_witness_addr')->nullable();
            // Terms
            $table->boolean('terms_agreed')->nullable();
            $table->boolean('accept_terms')->nullable();
            // Account
            $table->string('account_name')->nullable();
            $table->decimal('amount', 10, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('business_applications', function (Blueprint $table) {
            //
        });
    }
};
