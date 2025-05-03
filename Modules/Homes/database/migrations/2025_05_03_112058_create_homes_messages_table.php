<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('homes_messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('home_id')->constrained('homes');
            $table->foreignId('channel_id')->constrained('homes_channels');
            $table->foreignId('user_id')->constrained('users');
            $table->string('content');
            $table->json('attachments')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('homes_messages');
    }
};
