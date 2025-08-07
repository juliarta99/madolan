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
        Schema::create('fundings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('type_id')->constrained('funding_types')->onDelete('restrict');
            $table->foreignId('created_by')->constrained('users')->onDelete('restrict');
            $table->string('name_funder', 100);
            $table->string('logo_funder')->nullable();
            $table->double('start_nominal');
            $table->double('end_nominal');
            $table->double('interest_rate')->nullable();
            $table->integer('tenor')->nullable();
            $table->integer('age_requirements')->nullable();
            $table->double('turnover_requirements')->nullable();
            $table->string('link_funding', 255)->nullable();
            $table->boolean('status')->default(1); //aktif atau tidak
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fundings');
    }
};
