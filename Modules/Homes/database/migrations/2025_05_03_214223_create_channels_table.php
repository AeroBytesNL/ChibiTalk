<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
//        Schema::create('channels', function (Blueprint $table) {
//            $table->uuid('id')->primary();
//            $table->uuid('home_id');
//            $table->uuid('channel_id');
//            $table->timestamps();
//
//            $table->foreign('home_id')->references('id')->on('homes')->onDelete('cascade');
//            $table->foreign('channel_id')->references('id')->on('channels')->onDelete('cascade');
//        });
    }

    public function down(): void
    {
        Schema::dropIfExists('channels');
    }
};
