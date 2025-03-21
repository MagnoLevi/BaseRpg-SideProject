<?php

namespace Database\Seeders;

use App\Models\Race;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $races = [
            ['name' => 'Dragonborn', 'description' => 'Dragonborn are proud and honorable beings with draconic ancestry, known for their breath weapon and combat prowess.'],
            ['name' => 'Dwarf', 'description' => 'Dwarves are sturdy and resilient, known for their skill in craftsmanship, mining, and their strong connection to the earth.'],
            ['name' => 'Elf', 'description' => 'Elves are elegant, long-lived beings with a deep connection to nature and magic, often known for their grace and keen senses.'],
            ['name' => 'Gnome', 'description' => 'Gnomes are small, curious, and inventive creatures, known for their intellect, creativity, and affinity for illusion magic.'],
            ['name' => 'Half-Elf', 'description' => 'Half-elves are a mix of human and elven heritage, often balancing the strengths of both, and are known for their adaptability.'],
            ['name' => 'Half-Orc', 'description' => 'Half-orcs are the result of orc and human unions, often seen as fierce warriors, combining the strength of orcs with human intelligence.'],
            ['name' => 'Halfling', 'description' => 'Halflings are small and nimble, known for their quiet nature and luck, often thriving in peaceful communities and skilled in stealth.'],
            ['name' => 'Human', 'description' => 'Humans are versatile, adaptable, and ambitious beings, capable of achieving great feats through determination and creativity.'],
            ['name' => 'Tiefling', 'description' => 'Tieflings are humans with fiendish blood, often marked by infernal heritage, and possess a natural talent for magic and resistance to fire.'],
        ];

        foreach ($races as $race) {
            Race::updateOrCreate(
                ['name' => $race['name']],
                [
                    'type' => 'race',
                    'description' => $race['description']
                ]
            );
        }
    }
}
