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
        Schema::create('purse', function (Blueprint $table) {
            $table->id(); // Trường chính (primary key) tự động tạo id
            $table->unsignedBigInteger('id_users');
            $table->integer('flib');
            $table->integer('points');
            $table->timestamps();

            // Khóa ngoại đến bảng 'users'
            $table->foreign('id_users')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purse');
    }
};
