<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Alejandro Imbachí Hoyos',
            'email' => 'test@mail.com',
            'password' => Hash::make('buenas')
        ]);

        // User::factory()->count(5)->create();

        $users = User::all();

        foreach ($users as $user) {
            Profile::create([
                'user_id' => $user->id
            ]);
        }

        $profiles = Profile::all();
        foreach ($profiles as $profile) {
            Image::create([
                'url' => 'default.svg',
                'imageable_id' => $profile->id,
                'imageable_type' => Profile::class
            ]);
        }
    }
}
