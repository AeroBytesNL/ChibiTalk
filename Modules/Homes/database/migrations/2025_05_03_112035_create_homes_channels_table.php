<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('homes_channels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('home_id')->constrained('homes');
            $table->string('name');
            $table->integer('type');
            $table->integer('position');
            $table->timestamps();
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('homes_channels');
    }
};
