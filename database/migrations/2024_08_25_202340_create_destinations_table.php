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
        Schema::create('destinations', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->text('description')->nullable();
            $table->string('country')->nullable();
            $table->string('language')->nullable();
            $table->string('currency')->nullable();
            $table->string('area')->nullable();
            $table->string('timezone')->nullable();
            $table->text('visa')->nullable();
            $table->text('best_time')->nullable();
            $table->text('health_safety')->nullable();
            $table->text('map')->nullable();
            $table->string('featured_photo')->nullable();
            $table->integer('view_count')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('destinations');
    }
};
