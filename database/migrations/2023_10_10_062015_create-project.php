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
        Schema::create('project', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('id_field');
            $table->string('img_project');
            $table->unsignedBigInteger('id_users');
            $table->string('introduction');
            $table->string('avt');
            $table->string('video');
            $table->integer('status');
            $table->string('source');
            $table->string('ppt');
            $table->integer('assess');
            $table->integer('like');
            $table->string('product_slug');
            $table->integer('visibility');
            $table->timestamp('delete_at')->nullable();
            $table->timestamps();

            // Khóa ngoại đến bảng 'field'
            $table->foreign('id_field')->references('id')->on('field');

            // Khóa ngoại đến bảng 'users'
            $table->foreign('id_users')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project');
    }
};
