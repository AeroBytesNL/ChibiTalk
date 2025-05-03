<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('homes_messages', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('home_id');
            $table->uuid('channel_id');
            $table->uuid('user_id');
            $table->string('content');
            $table->json('attachments')->nullable();
            $table->timestamps();

            $table->foreign('home_id')->references('id')->on('homes')->onDelete('cascade');
            $table->foreign('channel_id')->references('id')->on('homes_channels')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('homes_messages');
    }
};
