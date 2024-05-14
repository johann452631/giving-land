<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = Post::factory()->count(20)->create();
        foreach ($posts as $post) {
            $limit = rand(1,5);
            for ($i=0; $i < $limit; $i++) { 
                $image = Image::factory()->create([
                    'imageable_id' => $post->id,
                    'imageable_type' => Post::class
                ]);
                Storage::copy('default/posts_images/'.$image->url, 'public/posts_images/'.$image->url);
            }
        }
    }
}
