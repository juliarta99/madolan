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
        Schema::create('forums', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('restrict');
            $table->foreignId('category_id')->constrained()->onDelete('restrict');
            $table->string('title');
            $table->string('slug');
            $table->string('short_description', 150);
            $table->text('content');
            $table->string('image')->nullable();
            $table->integer('view_count')->default(0);
            $table->string('reject_message')->nullable();
            $table->boolean('is_approve')->nullable();
            $table->boolean('is_ai')->default(0);
            $table->boolean('status')->default(1); // ini aktif atau tidak
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forums');
    }
};
