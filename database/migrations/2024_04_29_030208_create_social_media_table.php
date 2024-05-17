<?php

use App\Models\SocialMedia;
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
        Schema::create('social_media', function (Blueprint $table) {
            $table->id();
            $table->string('name',45);
        });

        SocialMedia::insert([
            [
                'name' => 'whatsapp',
            ],
            [
                'name' => 'facebook',
            ],
            [
                'name' => 'instagram',
            ],
            [
                'name' => 'linkedin',
            ],
            [
                'name' => 'x-twitter',
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('social_media');
    }
};
