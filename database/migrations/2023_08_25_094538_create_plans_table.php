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
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedInteger('percent');
            $table->unsignedBigInteger('sell_type_id');
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();

            $table->foreign('sell_type_id')->references('id')->on('sell_types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plans');
    }
};
