<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $abilities = [
            ['name' => 'Arcana', 'description' => null],
            ['name' => 'History', 'description' => null],
            ['name' => 'Religion', 'description' => null],
            ['name' => 'Investigation', 'description' => null],
            ['name' => 'Athletics', 'description' => null],
            ['name' => 'Nature', 'description' => null],
            ['name' => 'Acrobatics', 'description' => null],
            ['name' => 'Sleight of Hand', 'description' => null],
            ['name' => 'Stealth', 'description' => null],
            ['name' => 'Animal Handling', 'description' => null],
            ['name' => 'Insight', 'description' => null],
            ['name' => 'Medicine', 'description' => null],
            ['name' => 'Deception', 'description' => null],
            ['name' => 'Perception', 'description' => null],
            ['name' => 'Persuasion', 'description' => null],
            ['name' => 'Survival', 'description' => null],
            ['name' => 'Intimidation', 'description' => null],
            ['name' => 'Performance', 'description' => null]
        ];

        foreach ($abilities as $ability) {
            Skill::updateOrCreate(
                ['name' => $ability['name']],
                ['description' => $ability['description']]
            );
        }
    }
}
