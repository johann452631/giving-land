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
            $profile = Profile::create([
                'user_id' => $user->id
            ]);
            $socialMedia = SocialMedia::all()->random(rand(1,5));
            foreach ($socialMedia as $item) {
                // $profile->socialMedia()->attach($item->id,[
                //     'created_at' => now()
                // ]);
                $profile->socialMedia()->attach($item->id);
            }
        }
    }
}
