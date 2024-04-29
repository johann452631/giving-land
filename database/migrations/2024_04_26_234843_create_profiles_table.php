<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Storage::deleteDirectory('public/users_profile_images');
        Storage::copy('default/user-solid.svg', 'public/users_profile_images/default.svg');
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('email',45)->unique();
            $table->foreignId('user_id')->unique()->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
