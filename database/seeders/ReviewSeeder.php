<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Review;
use App\Models\User;
use App\Models\Place;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $places = Place::all();

        if ($users->isEmpty() || $places->isEmpty()) {
            $this->command->info('Hiba: Kell legalább egy felhasználó és egy helyszín a véleményekhez!');
            return;
        }

        // velemenyek teszt
        foreach ($places as $place) {
            // 1-2 random velemeny
            $randomUsers = $users->random(rand(1, 2));

            foreach ($randomUsers as $user) {
                Review::create([
                    'user_id' => $user->id,
                    'place_id' => $place->id,
                    'comment' => 'Ez egy szuper hely, nagyon tetszett a kiszolgálás és a hangulat! Csak ajánlani tudom mindenkinek, aki Budapesten jár.',
                    'star' => rand(4, 5)
                ]);
            }
        }
    }
}
