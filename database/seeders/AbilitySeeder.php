<?php

namespace Database\Seeders;

use App\Models\Ability;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AbilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $abilities = [
            ['name' => 'strength', 'description' => null],
            ['name' => 'dexterity', 'description' => null],
            ['name' => 'constitution', 'description' => null],
            ['name' => 'intelligence', 'description' => null],
            ['name' => 'wisdom', 'description' => null],
            ['name' => 'charisma', 'description' => null]
        ];

        foreach ($abilities as $ability) {
            Ability::updateOrCreate(
                ['name' => $ability['name']],
                ['description' => $ability['description']]
            );
        }
    }
}
