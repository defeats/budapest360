<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Place;
use App\Models\User;
use app\Models\Category;

class PlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // user_id <=> multimedia
        $user = User::first() ?? User::factory()->create();

        // etterem teszt
        $restaurantCat = Category::where('slug', 'restaurants')->first();
        if ($restaurantCat) {
            $gundel = Place::updateOrCreate(
                ['slug' => 'gundel-etterem'],
                [
                    'name' => 'Gundel Étterem',
                    'post_code' => '1146',
                    'address' => 'Budapest, Gundel Károly út 4.',
                    'category_id' => $restaurantCat->id,
                    'description' => 'Budapest egyik leghíresebb és legpatinásabb étterme a Városliget szélén.'
                ]
            );

            // kep hozzarendelese
            $gundel->multimedia()->updateOrCreate(
                ['image' => 'gundel_main.jpg'], // fix fajlnev /* TODO: dinamikusra megcsinalni az API szerint
                ['user_id' => $user->id, 'is_cover' => true]
            );
        }

        // latnivalok teszt
        $sightsCat = Category::where('slug', 'sights')->first();
        if ($sightsCat) {
            $halaszbastya = Place::updateOrCreate(
                ['slug' => 'halaszbastya'],
                [
                    'name' => 'Halászbástya',
                    'post_code' => '1014',
                    'address' => 'Budapest, Szentháromság tér',
                    'category_id' => $sightsCat->id,
                    'description' => 'Lenyűgöző panoráma és neogótikus építészet a Budai Várnegyedben.'
                ]
            );

            $halaszbastya->multimedia()->updateOrCreate(
                ['image' => 'halaszbastya_cover.jpg'],
                ['user_id' => $user->id, 'is_cover' => true]
            );
        }
    }
}
