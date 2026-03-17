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

        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('brand_id')->nullable();

            $table->text('short_description')->nullable();
            $table->text('information')->nullable();
            $table->longText('description')->nullable();

            $table->string('image')->nullable();
            $table->json('gallery_images')->nullable();

            $table->decimal('regular_price', 10, 2);
            $table->decimal('sale_price', 10, 2)->nullable();

            $table->string('sku')->unique();
            $table->integer('quantity');

            $table->enum('stock', ['in-stock', 'out-of-stock'])->default('in-stock');
            $table->boolean('featured')->default(false);

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
