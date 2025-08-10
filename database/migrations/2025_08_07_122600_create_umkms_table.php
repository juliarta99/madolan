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
        Schema::create('umkms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('restrict');
            $table->string('name', 100);
            $table->string('no_npwp', 50)->nullable();
            $table->string('location', 100);
            $table->string('umkm_photo');
            $table->year('since');
            $table->double('business_cash')->nullable();
            $table->string('regency', 50)->nullable();
            $table->string('province', 50)->nullable();
            $table->boolean('is_approve')->nullable();
            $table->string('reject_message')->nullable();
            $table->string('logo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('umkms');
    }
};
