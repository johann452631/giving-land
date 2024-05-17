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
            Image::create([
                'url' => 'default.svg',
                'imageable_id' => $profile->id,
                'imageable_type' => Profile::class
            ]);
        }

        $posts = Post::all();

        $defaultFiles = array_map('basename',Storage::files('default/posts_images'));

        foreach ($posts as $post) {
            $limit = rand(1,5);
            for ($i=0; $i < $limit; $i++) {
                $defaultFile = $defaultFiles[array_rand($defaultFiles)];
                $image = Image::create([
                    'url' => str_replace(" ","_",strtolower(microtime()))."_".$defaultFile,
                    'imageable_id' => $post->id,
                    'imageable_type' => Post::class
                ]);
                Storage::copy('default/posts_images/'.$defaultFile, 'public/posts_images/'.$image->url);
            }
        }
    }
}
