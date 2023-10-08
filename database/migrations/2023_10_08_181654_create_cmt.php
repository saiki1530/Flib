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
        Schema::create('cmt', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_users');
            $table->unsignedBigInteger('id_project');
            $table->string('text_cmt');
            $table->integer('like');
            $table->timestamps();

            // Khóa ngoại đến bảng 'users'
            $table->foreign('id_users')->references('id')->on('users');

            // Khóa ngoại đến bảng 'project'
            $table->foreign('id_project')->references('id')->on('project');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cmt');
    }
};
