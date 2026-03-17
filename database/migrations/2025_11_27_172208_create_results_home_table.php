<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('result_homes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id') // FK للمستخدم
                  ->constrained('user_home')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->integer('old_180');
            $table->integer('new_180');
            $table->date('date');
            $table->decimal('amount_due', 10, 2);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('result_homes');
    }
};