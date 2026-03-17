<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_home', function (Blueprint $table) {
            $table->id();
            $table->string('name_user');
            $table->string('email_user')->unique();
            $table->string('password_user');
            $table->string('usertype')->default('user home');
            $table->unsignedBigInteger('subscription_id')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_home');
    }
};