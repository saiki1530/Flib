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
        Schema::create('message', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_users');
            $table->unsignedBigInteger('id_chat');
            $table->string('text_message');
            $table->string('like')->nullable();
            $table->timestamps();

            // Khóa ngoại đến bảng 'users'
            $table->foreign('id_users')->references('id')->on('users');

            // Khóa ngoại đến bảng 'chat'
            $table->foreign('id_chat')->references('id')->on('chat');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('message');
    }
};
