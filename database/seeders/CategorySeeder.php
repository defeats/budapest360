<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Éttermek', 'slug' => 'restaurants'],
            ['name' => 'Látnivalók', 'slug' => 'sights'],
            ['name' => 'Éjszakai Élet', 'slug' => 'nightlife'],
            ['name' => 'Szállások', 'slug' => 'accomodations'],
            ['name' => 'Bevásárlóközpontok', 'slug' => 'malls'],
            ['name' => 'Kultúra', 'slug' => 'culture'],
            ['name' => 'Népszerű', 'slug' => 'featured'],
            ['name' => 'Egyéb', 'slug' => 'other']
        ];

        foreach ($categories as $c) {
            Category::updateOrCreate( //ha letezik akkor csak frissiti
                ['slug' => $c['slug']],
                ['name' => $c['name']]   
            );
        }
    }
}
