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
        Schema::create('reply_cmt', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('id_users');
            $table->unsignedBigInteger('id_cmt');
            $table->string('text_cmt');
            $table->integer('like');
            $table->timestamps();

            // Khóa ngoại đến bảng 'users'
            $table->foreign('id_users')->references('id')->on('users');

            // Khóa ngoại đến bảng 'cmt'
            $table->foreign('id_cmt')->references('id')->on('cmt');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reply_cmt');
    }
};
