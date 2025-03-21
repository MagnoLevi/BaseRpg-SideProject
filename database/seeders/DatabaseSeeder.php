<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);

        $this->call(RaceSeeder::class);
        $this->call(SubRaceSeeder::class);

        $this->call(ClassSeeder::class);
        $this->call(SubClassSeeder::class);

        $this->call(ResourceSeeder::class);
        $this->call(ActionSeeder::class);

        $this->call(AbilitySeeder::class);
        $this->call(SkillSeeder::class);
    }
}
