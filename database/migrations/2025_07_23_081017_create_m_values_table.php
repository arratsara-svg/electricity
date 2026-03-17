<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('m_values', function (Blueprint $table) {
            $table->id();
            $table->float('value'); // هذا هو m
            $table->foreignId('meter_input_id')->constrained('meter_inputs')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('m_values');
    }
};