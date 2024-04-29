<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        User::factory()->create([
            'name' => 'Alejandro Imbachí Hoyos',
            'email' => 'test@mail.com',
            'password' => Hash::make('buenas')
        ]);
        $this->call([
            CategorySeeder::class,
            PostSeeder::class,
        ]);
    }
}
