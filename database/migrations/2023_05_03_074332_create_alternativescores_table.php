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
        Schema::create('alternativescores', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('alternative_id');
            $table->foreign('alternative_id')->references('id')->on('alternatives');
            $table->unsignedBigInteger('criteria_id');
            $table->foreign('criteria_id')->references('id')->on('criteriaweights');
            $table->unsignedBigInteger('rating_id');
            $table->foreign('rating_id')->references('id')->on('criteriaratings');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alternativescores');
    }
};