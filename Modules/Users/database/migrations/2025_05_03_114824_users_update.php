<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('profile_image_url')->nullable()->after('password');
            $table->enum('role', ['user', 'admin', 'moderator'])->default('user')->after('email');
            $table->string('username')->nullable()->after('email');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('profile_image_url');
            $table->dropColumn('role');
            $table->dropColumn('email_verified_at');
        });
    }
};
