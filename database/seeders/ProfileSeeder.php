<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Profile;
use App\Models\SocialMedia;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();

        foreach ($users as $user) {
            Profile::create([
                'user_id' => $user->id
            ]);
        }

        $socialMediaAll = SocialMedia::all();

        $profiles = Profile::all();

        foreach ($profiles as $profile) {
            Image::create([
                'url' => 'default.svg',
                'imageable_id' => $profile->id,
                'imageable_type' => Profile::class
            ]);

            foreach ($socialMediaAll->random(4) as $socialMedia) {
                $profile->social_media()->attach($socialMedia->id);
            }
        }
    }
}
