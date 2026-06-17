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
        Schema::table('business_credit_applications', function (Blueprint $table) {
            // Add DPID columns for address lookup
            $table->string('physical_address_dpid')->nullable()->after('physical_address');
            $table->string('billing_address_dpid')->nullable()->after('billing_address');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('business_credit_applications', function (Blueprint $table) {
            $table->dropColumn(['physical_address_dpid', 'billing_address_dpid']);
        });
    }
};
