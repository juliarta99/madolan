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
            $table->foreignId('category_id')->constrained('product_categories')->onDelete('restrict');
            $table->foreignId('umkm_id')->constrained()->onDelete('restrict');
            $table->string('name', 100);
            $table->string('barcode')->unique();
            $table->string('slug', 100)->unique();
            $table->double('price');
            $table->string('image');
            $table->string('unit', 20);
            $table->integer('is_unlimited');
            $table->integer('stock');
            $table->integer('status'); //aktif atu tidak
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
