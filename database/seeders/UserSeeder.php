<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@bp360.hu',
            'password' => bcrypt('!r|_||o3no|4|/|1'),
            'role' => 'admin'
        ]);

        User::factory()->create([
            'name' => 'Vallalko_Zoltan',
            'email' => 'owner@bp360.hu',
            'password' => bcrypt('ownertest'),
            'role' => 'owner'
        ]);

        User::factory(50)->create();
    }
}
