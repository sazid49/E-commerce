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
            $table->foreignId('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreignId('subcategory_id')->references('id')->on('sub_categories')->onDelete('cascade');
            $table->foreignId('brand_id')->nullable();
            $table->string('name');
            $table->string('code');
            $table->string('unit')->nullable();
            $table->string('tags')->nullable();
            $table->string('video')->nullable();
            $table->decimal('purchase_price')->nullable();
            $table->decimal('selling_price')->nullable();
            $table->decimal('discount_price')->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('warehouse')->nullable();
            $table->longText('description')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('images')->nullable();
            $table->integer('featured')->nullable();
            $table->integer('today_deal')->nullable();
            $table->integer('status')->nullable();
            $table->foreignId('flash_deal_id')->nullable();
            $table->integer('cash_on_delivery')->nullable();
            $table->foreignId('admin_id')->nullable();
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
