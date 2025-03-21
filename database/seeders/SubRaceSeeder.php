<?php

namespace Database\Seeders;

use App\Models\Race;
use App\Models\RaceLink;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubRaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Recuperando as raças
        $dragonborn = Race::where('name', 'Dragonborn')->first();
        $dwarf = Race::where('name', 'Dwarf')->first();
        $elf = Race::where('name', 'Elf')->first();
        $gnome = Race::where('name', 'Gnome')->first();
        $halfElf = Race::where('name', 'Half-Elf')->first();
        $halfOrc = Race::where('name', 'Half-Orc')->first();
        $halfling = Race::where('name', 'Halfling')->first();
        $human = Race::where('name', 'Human')->first();
        $tiefling = Race::where('name', 'Tiefling')->first();

        // Gerenciando sub-raças
        if ($dragonborn) {
            $this->storeSubRace($dragonborn);
        }
        if ($dwarf) {
            $this->storeSubRace($dwarf);
        }
        if ($elf) {
            $this->storeSubRace($elf);
        }
        if ($gnome) {
            $this->storeSubRace($gnome);
        }
        if ($halfElf) {
            $this->storeSubRace($halfElf);
        }
        if ($halfOrc) {
            $this->storeSubRace($halfOrc);
        }
        if ($halfling) {
            $this->storeSubRace($halfling);
        }
        if ($human) {
            $this->storeSubRace($human);
        }
        if ($tiefling) {
            $this->storeSubRace($tiefling);
        }
    }


    private function storeSubRace($race)
    {
        $parent_race_id = $race->id ?? 0;
        $race_name = $race->name ?? null;

        // Definindo sub-raças baseadas na raça
        switch ($race_name) {
            case 'Dragonborn':
                $subraces = [
                    ['name' => 'Chromatic Dragonborn', 'description' => 'Descended from chromatic dragons. They have resistance to their ancestral damage type and can unleash an elemental breath weapon. They can also channel energy to become temporarily immune to a type of damage.'],
                    ['name' => 'Metallic Dragonborn', 'description' => 'Descended from metallic dragons. They have resistance to their ancestral damage type and an elemental breath weapon. They also gain a second breath weapon with additional effects, such as pushing or paralyzing enemies.'],
                    ['name' => 'Gem Dragonborn', 'description' => 'Descended from gem dragons. They have resistance to their ancestral damage type and an elemental breath weapon. They possess psychic abilities like telepathy and can manifest energy wings to fly temporarily.']
                ];
                break;

            case 'Dwarf':
                $subraces = [
                    ['name' => 'Hill Dwarf', 'description' => 'Known for their toughness and strong will. They have increased wisdom and additional hit points, making them durable and resilient.'],
                    ['name' => 'Mountain Dwarf', 'description' => 'Hardy and strong, they gain increased strength and proficiency with light and medium armor. Known as skilled warriors and craftspeople.'],
                    ['name' => 'Duergar', 'description' => 'Also known as gray dwarves, they are resilient to illusions and charms. They have superior darkvision and can magically enlarge themselves or turn invisible for short periods.'],
                    ['name' => 'Mark of Warding Dwarf', 'description' => 'Found in Eberron, they are expert warders and locksmiths. They gain bonuses to defense and are adept at using abjuration magic to protect people and places.']
                ];
                break;

            case 'Elf':
                $subraces = [
                    ['name' => 'High Elf', 'description' => 'Graceful and intelligent, they have an affinity for magic. They gain proficiency with longbows and an extra wizard cantrip.'],
                    ['name' => 'Wood Elf', 'description' => 'Stealthy and swift, they are in tune with nature. They move faster than other elves and can hide easily in natural environments.'],
                    ['name' => 'Drow', 'description' => 'Also known as dark elves, they have superior darkvision and innate spellcasting. They are agile and stealthy, often living underground.'],
                    ['name' => 'Eladrin', 'description' => 'Elves with a strong connection to the Feywild. They can shift their mood and abilities with the seasons and teleport short distances.'],
                    ['name' => 'Sea Elf', 'description' => 'Elves adapted to life underwater. They can breathe underwater, swim quickly, and have a connection with sea creatures.'],
                    ['name' => 'Shadar-kai', 'description' => 'Elves bound to the Shadowfell. They are resilient and can teleport short distances, becoming temporarily resistant to damage.']
                ];
                break;

            case 'Gnome':
                $subraces = [
                    ['name' => 'Forest Gnome', 'description' => 'Secretive and shy, they have innate illusion magic and the ability to communicate with small animals.'],
                    ['name' => 'Rock Gnome', 'description' => 'Inventive and curious, they are skilled artisans and gain bonuses to crafting small mechanical devices.'],
                    ['name' => 'Deep Gnome', 'description' => 'Also known as svirfneblin, they are reclusive and stealthy. They have superior darkvision and resistance to magic.']
                ];
                break;

            case 'Half-Elf':
                $subraces = [
                    ['name' => 'Mark of Detection Half-Elf', 'description' => 'Skilled in finding hidden things and discerning truths. They are perceptive and gain abilities related to detection magic.'],
                    ['name' => 'Mark of Storm Half-Elf', 'description' => 'Tied to the power of weather and the sea. They can control wind and lightning and are adept at navigation.']
                ];
                break;

            case 'Halfling':
                $subraces = [
                    ['name' => 'Lightfoot Halfling', 'description' => 'Stealthy and personable, they can hide behind larger creatures and are naturally lucky.'],
                    ['name' => 'Stout Halfling', 'description' => 'Hardier than other halflings, they have resistance to poison and are known for their toughness.'],
                    ['name' => 'Ghostwise Halfling', 'description' => 'Reclusive and telepathic, they can communicate silently with nearby creatures using limited telepathy.']
                ];
                break;

            case 'Human':
                $subraces = [
                    ['name' => 'Mark of Finding Human', 'description' => 'Gifted in tracking and locating creatures and objects. They gain abilities related to divination and finding things.'],
                    ['name' => 'Mark of Handling Human', 'description' => 'Experts in dealing with animals and beasts. They can calm, command, and bond with creatures easily.'],
                    ['name' => 'Mark of Making Human', 'description' => 'Gifted artisans and inventors, able to create and repair items with magical efficiency.'],
                    ['name' => 'Mark of Passage Human', 'description' => 'Skilled travelers and explorers. They have increased speed and abilities tied to teleportation magic.'],
                    ['name' => 'Mark of Sentinel Human', 'description' => 'Guardians and protectors, they excel in defense and warding magic to protect allies.']
                ];
                break;

            case 'Tiefling':
                $subraces = [
                    ['name' => 'Asmodeus Tiefling', 'description' => 'Connected to the lord of the Nine Hells, they excel in charm and fire magic.'],
                    ['name' => 'Baalzebul Tiefling', 'description' => 'Tied to lies and corruption, they have enhanced charisma and can cast spells related to deceit.'],
                    ['name' => 'Dispater Tiefling', 'description' => 'Masters of secrets and intrigue, they gain bonuses to stealth and can cast spells of deception.'],
                    ['name' => 'Fierna Tiefling', 'description' => 'Masters of charm and influence, they are skilled in persuasion and enchantment magic.'],
                    ['name' => 'Glasya Tiefling', 'description' => 'Deceptive and manipulative, they are adept at stealth and illusion magic.'],
                    ['name' => 'Levistus Tiefling', 'description' => 'Survivors of great hardship, they have resistance to cold and abilities tied to survival and defense.'],
                    ['name' => 'Mammon Tiefling', 'description' => 'Greedy and cunning, they excel at manipulation and gaining wealth.'],
                    ['name' => 'Mephistopheles Tiefling', 'description' => 'Dealers in arcane knowledge, they have affinity for cold and fire magic.'],
                    ['name' => 'Zariel Tiefling', 'description' => 'Warriors of conquest, they gain bonuses to strength and can use smite spells in battle.']
                ];
                break;

            default:
                $subraces = [];
                break;
        }

        // Criando as sub-raças e associando à raça
        foreach ($subraces as $subrace) {
            Race::updateOrCreate(
                ['name' => $subrace['name']],
                [
                    'parent_race_id' => $parent_race_id,
                    'type' => 'subrace',
                    'description' => $subrace['description']
                ]
            );
        }
    }
}
