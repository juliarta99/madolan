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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('code', 50)->unique();
            $table->foreignId('umkm_id')->constrained()->onDelete('restrict');
            $table->foreignId('category_id')->constrained('transaction_categories')->onDelete('restrict');
            $table->enum('order_type', ['preorder', 'ready stock']);
            $table->date('transaction_date');
            $table->string('customer_name', 100);
            $table->string('description')->nullable();
            $table->double('grand_total');
            $table->double('amount_paid');
            $table->enum('payment', ['cash', 'digital']);
            $table->tinyInteger('is_paid');
            $table->dateTime('pickup_date')->nullable();
            $table->dateTime('paid_at')->nullable();
            $table->string('payment_proof')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('employers')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
