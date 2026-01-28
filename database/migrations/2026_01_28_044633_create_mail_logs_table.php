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
        Schema::create('mail_logs', function (Blueprint $table) {
            $table->id();
            $table->string('type')->comment('business_account, cash_account, etc');
            $table->unsignedBigInteger('business_account_id')->nullable();
            $table->unsignedBigInteger('cash_account_id')->nullable();
            $table->string('recipient_email');
            $table->string('subject');
            $table->longText('body')->nullable();
            $table->string('status')->default('sent')->comment('sent, failed, pending');
            $table->longText('attachment_details')->nullable()->comment('JSON array of attachment info');
            $table->text('error_message')->nullable();
            $table->ipAddress('ip_address')->nullable();
            $table->string('user_agent')->nullable();
            $table->timestamps();
            
            $table->index('type');
            $table->index('status');
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mail_logs');
    }
};
