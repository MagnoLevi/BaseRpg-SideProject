<?php

namespace Database\Seeders;

use App\Models\Resource;
use App\Models\Action;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ActionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Busca Resources
        $actionResource = Resource::where('name', 'Action')->first();
        $bonusAction = Resource::where('name', 'Bonus Action')->first();
        $reaction = Resource::where('name', 'Reaction')->first();
        $movementSpeed = Resource::where('name', 'Movement Speed')->first();
        $warlockSpellSlot = Resource::where('name', 'Warlock Spell Slot')->first();
        $arcaneRecovery = Resource::where('name', 'Arcane Recovery')->first();
        $bardicInspiration = Resource::where('name', 'Bardic Inspiration')->first();

        $spellSlot1 = Resource::where('name', 'Spell Slot 1')->first();;
        $spellSlot2 = Resource::where('name', 'Spell Slot 2')->first();;
        $spellSlot3 = Resource::where('name', 'Spell Slot 3')->first();;
        $spellSlot4 = Resource::where('name', 'Spell Slot 4')->first();;
        $spellSlot5 = Resource::where('name', 'Spell Slot 5')->first();;
        $spellSlot6 = Resource::where('name', 'Spell Slot 6')->first();;


        // Cria as ações e os recursos que usam
        $action = Action::updateOrCreate(
            ['name' => 'Hunger of Hadar'],
            [
                'concentration' => true,
                'range' => 18,
                'duration' => 10,
                'aoe' => 6,
                'description' => null
            ]
        );
        $action->resources()->attach($actionResource->id);
        $action->resources()->attach($warlockSpellSlot->id);


        $action = Action::updateOrCreate(
            ['name' => 'Ice Knife'],
            [
                'range' => 18,
                'aoe' => 2,
                'description' => null
            ]
        );
        $action->resources()->attach($actionResource->id);
        $action->resources()->attach($spellSlot1->id);


        $action = Action::updateOrCreate(
            ['name' => 'Main Hand Attack (Melee)'],
            [
                'range' => 1.5,
                'description' => null
            ]
        );
        $action->resources()->attach($actionResource->id);


        $action = Action::updateOrCreate(
            ['name' => 'Off Hand Attack (Melee)'],
            [
                'range' => 1.5,
                'description' => null
            ]
        );
        $action->resources()->attach($bonusAction->id);
    }
}
