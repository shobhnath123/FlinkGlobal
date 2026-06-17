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
       Schema::create('directors', function (Blueprint $table) {
        $table->id();
        $table->foreignId('business_credit_application_id')
            ->constrained()
            ->cascadeOnDelete();

        $table->string('full_name')->nullable();
        $table->date('dob')->nullable();
        $table->string('mobile')->nullable();
        $table->string('address')->nullable();
        $table->string('drivers_licence')->nullable();
        $table->string('postcode')->nullable();

        $table->timestamps();
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('directors');
    }
};
