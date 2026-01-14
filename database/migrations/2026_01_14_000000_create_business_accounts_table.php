<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema; 
use Illuminate\Database\Schema\Blueprint;

class CreateBusinessAccountsTable extends Migration
{
    public function up()
    {
        Schema::create('business_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('account_name');
            $table->decimal('amount', 10, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('business_accounts');
    }
}