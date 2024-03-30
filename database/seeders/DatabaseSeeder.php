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
        Product::factory()->count(100)->state(new Sequence(
            ['purpose' => 'Donación'],
            ['purpose' => 'Intercambio'],
        ))->create();

        User::factory()->create([
            'name' => 'Alejandro',
            'surname' => 'Imbachí Hoyos',
            'birthday' => '2001-10-30',
            'email' => 'alejoimbachihoyos@gmail.com',
            'password' => Hash::make('buenas')
        ]);
    }
}
