<?php

namespace Database\Seeders;

use App\Models\Resource;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Resource::updateOrCreate(
            ['name' => 'Action'],
            ['description' => null]
        );

        Resource::updateOrCreate(
            ['name' => 'Bonus Action'],
            ['description' => null]
        );

        Resource::updateOrCreate(
            ['name' => 'Reaction'],
            ['description' => null]
        );

        Resource::updateOrCreate(
            ['name' => 'Movement Speed'],
            ['description' => null]
        );

        for ($level = 1; $level <= 6; $level++) {
            Resource::updateOrCreate(
                ['name' => "Spell Slot $level"],
                ['description' => null]
            );
        }

        Resource::updateOrCreate(
            ['name' => 'Warlock Spell Slot'],
            ['description' => null]
        );

        Resource::updateOrCreate(
            ['name' => 'Arcane Recovery'],
            ['description' => null]
        );

        Resource::updateOrCreate(
            ['name' => 'Bardic Inspiration'],
            ['description' => null]
        );
    }
}
