<?php

use App\Models\Image;
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
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->string('url');
            $table->bigInteger('imageable_id',false,true);
            $table->string('imageable_type',100);
            $table->timestamps();
        });

        Image::insert([
            [
                'url' => 'whatsapp.svg',
                'imageable_id' => 1,
                'imageable_type' => SocialMedia::class
            ],
            [
                'url' => 'facebook.svg',
                'imageable_id' => 2,
                'imageable_type' => SocialMedia::class
            ],
            [
                'url' => 'instagram.svg',
                'imageable_id' => 3,
                'imageable_type' => SocialMedia::class
            ],
            [
                'url' => 'linkedin.svg',
                'imageable_id' => 4,
                'imageable_type' => SocialMedia::class
            ],
            [
                'url' => 'x-twitter.svg',
                'imageable_id' => 5,
                'imageable_type' => SocialMedia::class
            ]
        ]);


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images');
    }
};
