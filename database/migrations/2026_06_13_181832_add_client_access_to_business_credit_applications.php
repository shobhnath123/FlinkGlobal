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
            $table->boolean('client_can_view')->default(false);
            $table->boolean('client_can_edit')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('business_credit_applications', function (Blueprint $table) {
            $table->dropColumn(['client_can_view', 'client_can_edit']);
        });
    }
};
