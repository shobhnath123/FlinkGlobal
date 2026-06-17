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
        Schema::create('guarantors', function (Blueprint $table) {
        $table->id();
        $table->foreignId('business_credit_application_id')
            ->constrained()
            ->cascadeOnDelete();

        $table->string('signed')->nullable();
        $table->string('full_name')->nullable();
        $table->string('address')->nullable();
        $table->date('dob')->nullable();

        // Witness
        $table->string('witness_name')->nullable();
        $table->string('witness_occupation')->nullable();
        $table->string('witness_address')->nullable();
        $table->date('witness_signature_date')->nullable();

        $table->timestamps();
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guarantors');
    }
};
