<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\SocialMedia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class SocialMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $files = Storage::allFiles('')
        $socialMedia = SocialMedia::all();
        foreach ($socialMedia as $element) {
            Image::create([
                'url' => $element->name . '.svg',
                'imageable_id' => $element->id,
                'imageable_type' => SocialMedia::class
            ]);
        }
    }
}
