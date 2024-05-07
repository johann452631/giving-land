<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\SocialMedia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SocialMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SocialMedia::insert([
            ['name' => 'facebook'],
            ['name' => 'instagram'],
            ['name' => 'linkedin'],
            ['name' => 'whatsapp'],
            ['name' => 'x-twitter'],
        ]);

        $socialMedia = SocialMedia::all();
        foreach ($socialMedia as $element) {
            Image::create([
                'url' => $element->name.'.svg',
                'imageable_id' => $element->id,
                'imageable_type' => SocialMedia::class
            ]);
        }
    }
}
