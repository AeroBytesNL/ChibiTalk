<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
//        Schema::create('notifications', function (Blueprint $table) {
//            $table->id();
//            $table->uuid('user_id');
//            $table->uuid('home_id');
//            $table->integer('type');
//            $table->string('content');
//            $table->boolean('read')->default(false);
//            $table->timestamps();
//
//            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
//            $table->foreign('home_id')->references('id')->on('homes')->onDelete('cascade');
//        });
    }

    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
