<?php

namespace Database\Seeders;

use App\Models\Multimedia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\User;
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
            $this->command->info('Rossz DBSeeder sorrend');
            return;
        }

        foreach ($places as $place) {
            // minden helyhez 1 borito (cover)
            Multimedia::updateOrCreate(
                [
                    'place_id' => $place->id,
                    'is_cover' => true,
                ],
                [
                    'user_id' => $user->id,
                    // fix kep /* TODO: atirni dinamikusra az API alapjan */
                    'file_name' => $place->slug . '_cover.jpg',
                    'file_path' => 'public/images',
                    'mime_type' => 'image/jpeg',
                    'file_size' => 0,
                    'is_cover' => true,
                ]
            );

            // +1-2 extra galeria kep opcionálisan
            /*
            Multimedia::create([
                'place_id' => $place->id,
                'user_id' => $user->id,
                'file_name' => $place->slug . '_extra_1.jpg',
                'file_path' => 'public/images',
                'mime_type' => 'image/jpeg',
                'file_size' => 0,
                'is_cover' => false
            ]);
            */
        }
    }
}
