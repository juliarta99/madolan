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
        Schema::create('employers', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('username', 25)->unique();
            $table->char('gender', 1);
            $table->string('password');
            $table->enum('role', ['accountant', 'cashier']);
            $table->foreignId('umkm_id')->constrained()->onDelete('restrict');
            $table->tinyInteger('status')->default(1); // ini aktif atau tidak
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employers');
    }
};
