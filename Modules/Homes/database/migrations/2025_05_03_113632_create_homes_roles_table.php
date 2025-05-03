<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('homes_roles', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('home_id');
            $table->string('name');
            $table->string('color');
            $table->json('permissions');
            $table->integer('position');
            $table->timestamps();

            $table->foreign('home_id')->references('id')->on('homes')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('homes_roles');
    }
};
