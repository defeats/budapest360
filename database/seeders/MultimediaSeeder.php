<?php

namespace Database\Seeders;

use App\Models\Multimedia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use APP\Models\User;
use App\Models\Place;

class MultimediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // publisher
        $user = User::first() ?? User::factory()->create();

        $places = Place::all();

        if ($places->isEmpty()) {
            $this->command->info('Nincsenek helyszínek, előbb futtasd a PlaceSeedert!');
            return;
        }

        foreach ($places as $place) {
            // minden helyhez 1 borito
            Multimedia::updateOrCreate(
                [
                    'place_id' => $place->id,
                    'is_cover' => true
                ],
                [
                    'user_id' => $user->id,
                    // fix kep /* TODO: atirni dinamikusra az API alapjan */
                    'image' => $place->slug . '_cover.jpg', 
                ]
            );

            // +1-2 extra galeria kep opcionalisan
            /*
            Multimedia::create([
                'place_id' => $place->id,
                'user_id' => $user->id,
                'image' => $place->slug . '_extra_1.jpg',
                'is_cover' => false
            ]);
            */
        }
    }
}
