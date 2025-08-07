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
        Schema::create('learning_resources', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mentor_id')->constrained()->onDelete('restrict');
            $table->foreignId('category_id')->constrained()->onDelete('restrict');
            $table->string('title', 100);
            $table->string('slug', 150)->unique();
            $table->string('short_description', 150);
            $table->text('material');
            $table->string('cover');
            $table->integer('view_count')->default(0);
            $table->string('reject_message')->nullable();
            $table->boolean('is_approve')->nullable();
            $table->boolean('status')->default(1); //aktif atau tidak
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('learning_resources');
    }
};
