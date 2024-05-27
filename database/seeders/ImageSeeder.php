<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Post;
use App\Models\Profile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $profiles = Profile::all();

        foreach ($profiles as $profile) {
            $profile->image()->create(['url' => 'default.svg',]);
        }

        $posts = Post::all();

        $filesNames = array_map('basename', Storage::files('default/posts_images'));

        foreach ($posts as $post) {
            $limit = rand(1, 5);
            for ($i = 0; $i < $limit; $i++) {
                $fileName = $filesNames[array_rand($filesNames)];
                $image = Image::create(['url' => str_replace(" ", "_", strtolower(microtime())) . "_" . $fileName]);
                $post->images()->save($image);
                Storage::copy('default/posts_images/' . $fileName, 'public/posts_images/' . $image->url);
            }
        }
    }
}
