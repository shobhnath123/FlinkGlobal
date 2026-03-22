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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            // discount type
            $table->enum('type', ['fixed', 'percent']);
            $table->decimal('value', 10, 2);
            // minimum cart value
            $table->decimal('cart_value', 10, 2)->nullable();
            $table->date('expiry_date');
            // user based discount
            $table->enum('user_type', ['all', 'new', 'existing', 'specific'])->default('all');
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
