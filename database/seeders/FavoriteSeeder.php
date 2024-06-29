<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FavoriteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $postIds = Post::pluck('id');
        foreach ($users as $user) {
            $user->favorites()->attach($postIds->random(rand(5,15))->toArray());
        }
    }
}
