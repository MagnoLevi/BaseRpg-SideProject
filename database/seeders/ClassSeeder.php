<?php

namespace Database\Seeders;

use App\Models\CharacterClass;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $classes = [
            ['name' => 'Artificer', 'description' => 'Inventors and magical engineers who create magical items and use tools to solve problems.'],
            ['name' => 'Barbarian', 'description' => 'Primal warriors who channel the fury of their ancestors and heritage to strike with brute force.'],
            ['name' => 'Bard', 'description' => 'Masters of sound, magic, and performance who use their skills to inspire allies and deceive enemies.'],
            ['name' => 'Cleric', 'description' => 'Divine spellcasters who channel the power of their gods to heal the wounded and smite enemies.'],
            ['name' => 'Druid', 'description' => 'Nature-based spellcasters who can shapeshift into animals and command the forces of the natural world.'],
            ['name' => 'Fighter', 'description' => 'Skilled combatants proficient in a wide range of weapons and tactics, focusing on physical prowess.'],
            ['name' => 'Monk', 'description' => 'Martial artists who harness their inner energy (ki) to perform extraordinary feats of combat and agility.'],
            ['name' => 'Paladin', 'description' => 'Holy knights who swear oaths to fight for justice and righteousness, wielding divine magic and weapons.'],
            ['name' => 'Ranger', 'description' => 'Survival experts who excel in wilderness exploration and combat, often accompanied by animal companions.'],
            ['name' => 'Rogue', 'description' => 'Stealthy and dexterous individuals who specialize in deception, traps, and surprise attacks.'],
            ['name' => 'Sorcerer', 'description' => 'Innate spellcasters whose magic comes from within, often tied to their bloodline or a supernatural source.'],
            ['name' => 'Warlock', 'description' => 'Spellcasters who form pacts with powerful entities, gaining magical abilities in exchange for their loyalty.'],
            ['name' => 'Wizard', 'description' => 'Scholars of arcane magic who study spellbooks and use their intelligence to cast powerful spells.'],
        ];

        foreach ($classes as $class) {
            CharacterClass::updateOrCreate(
                ['name' => $class['name']],
                [
                    'type' => 'class',
                    'description' => $class['description']
                ]
            );
        }
    }
}
