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
            $user->profile()->save(Profile::create());
            $socialMedia = SocialMedia::all()->random(rand(1, 5));
            foreach ($socialMedia as $item) {
                switch ($item->id) {
                    case 2:
                        $url = ['url' => 'https://www.facebook.com/'];
                        break;
                    case 3:
                        $url = ['url' => 'https://www.instagram.com/'];
                        break;
                    case 4:
                        $url = ['url' => 'https://co.linkedin.com/'];
                        break;
                    case 5:
                        $url = ['url' => 'https://x.com/'];
                        break;
                    default:
                        $url = ['url' => 'https://wa.me/57'.str_shuffle('3014132233')];
                        break;
                }
                $user->profile->socialMedia()->attach($item->id,$url);
            }
        }
    }
}
