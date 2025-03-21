<?php

namespace Database\Seeders;

use App\Models\CharacterClass;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Recuperando as raças
        $artificer = CharacterClass::where('name', 'Artificer')->first();
        $barbarian = CharacterClass::where('name', 'Barbarian')->first();
        $bard = CharacterClass::where('name', 'Bard')->first();
        $cleric = CharacterClass::where('name', 'Cleric')->first();
        $druid = CharacterClass::where('name', 'Druid')->first();
        $fighter = CharacterClass::where('name', 'Fighter')->first();
        $monk = CharacterClass::where('name', 'Monk')->first();
        $paladin = CharacterClass::where('name', 'Paladin')->first();
        $ranger = CharacterClass::where('name', 'Ranger')->first();
        $rogue = CharacterClass::where('name', 'Rogue')->first();
        $sorcerer = CharacterClass::where('name', 'Sorcerer')->first();
        $warlock = CharacterClass::where('name', 'Warlock')->first();
        $wizard = CharacterClass::where('name', 'Wizard')->first();

        // Gerenciando sub-raças
        if ($artificer) {
            $this->storeSubclass($artificer);
        }
        if ($barbarian) {
            $this->storeSubclass($barbarian);
        }
        if ($bard) {
            $this->storeSubclass($bard);
        }
        if ($cleric) {
            $this->storeSubclass($cleric);
        }
        if ($druid) {
            $this->storeSubclass($druid);
        }
        if ($fighter) {
            $this->storeSubclass($fighter);
        }
        if ($monk) {
            $this->storeSubclass($monk);
        }
        if ($paladin) {
            $this->storeSubclass($paladin);
        }
        if ($ranger) {
            $this->storeSubclass($ranger);
        }
        if ($rogue) {
            $this->storeSubclass($rogue);
        }
        if ($sorcerer) {
            $this->storeSubclass($sorcerer);
        }
        if ($warlock) {
            $this->storeSubclass($warlock);
        }
        if ($wizard) {
            $this->storeSubclass($wizard);
        }
    }


    private function storeSubclass($class)
    {
        $parent_class_id = $class->id ?? 0;
        $class_name = $class->name ?? null;

        // Definindo sub-raças baseadas na raça
        switch ($class_name) {
            case 'Artificer':
                $subclasses = [
                    ['name' => 'Alchemist', 'description' => 'Focuses on creating magical potions, elixirs, and transforming materials through alchemy.'],
                    ['name' => 'Artillerist', 'description' => 'Specializes in creating magical cannons and explosives to deal massive damage from a distance.'],
                    ['name' => 'Battle Smith', 'description' => 'A skilled engineer who forges magical weapons and builds mechanical allies to fight at their side.'],
                    ['name' => 'Armorer', 'description' => 'Imbues armor with magical properties, turning it into a suit of formidable defensive magic.']
                ];
                break;

            case 'Barbarian':
                $subclasses = [
                    ['name' => 'Path of the Berserker', 'description' => 'Embraces wild rage and relentless attacks, gaining power through physical fury and recklessness.'],
                    ['name' => 'Path of the Totem Warrior', 'description' => 'Channels the spirit of an animal totem to gain spiritual and physical enhancements.'],
                    ['name' => 'Path of the Ancestral Guardian', 'description' => 'Draws upon the spirits of their ancestors to protect allies and strike foes with ancestral wrath.'],
                    ['name' => 'Path of the Storm Herald', 'description' => 'Harnesses the power of a storm to deal damage and create environmental effects.'],
                    ['name' => 'Path of the Beast', 'description' => 'Embraces their primal instincts, gaining physical traits of beasts, such as claws, fangs, or tails.'],
                    ['name' => 'Path of the Giant', 'description' => 'Taps into the primal power of giants, gaining abilities to wield large weapons, grow in size, and deal devastating damage.']
                ];
                break;

            case 'Bard':
                $subclasses = [
                    ['name' => 'College of Lore', 'description' => 'Focuses on expanding knowledge, learning a variety of magical abilities, and supporting allies with bardic inspiration.'],
                    ['name' => 'College of Valour', 'description' => 'Inspires bravery in others, granting combat prowess and enhancing the durability of allies.'],
                    ['name' => 'College of Swords', 'description' => 'Uses the art of combat to inspire others, mixing swordplay with magical flair. They gain proficiency with medium armor, scimitars, and a unique fighting style.'],
                    ['name' => 'College of Glamour', 'description' => 'Harnesses the magic of the Feywild to enchant and beguile enemies and allies alike, creating an aura of beauty and fascination.'],
                    ['name' => 'College of Whispers', 'description' => 'Uses subtlety and fear to manipulate and deceive enemies, gaining access to secrets and espionage abilities.'],
                    ['name' => 'College of Spirits', 'description' => 'Taps into the spirit world, channeling the spirits of the dead to provide magical abilities and guidance.']
                ];
                break;

            case 'Cleric':
                $subclasses = [
                    ['name' => 'Life Domain', 'description' => 'Focused on healing and protecting others, the Life Domain cleric excels at restoring vitality and vitality to those around them.'],
                    ['name' => 'Light Domain', 'description' => 'Focused on radiance and the power of light, this cleric can banish darkness and incite divine energy to deal damage or protect allies.'],
                    ['name' => 'Trickery Domain', 'description' => 'The Trickery cleric manipulates luck, illusions, and deceit, using cunning magic to confuse foes and assist allies in unexpected ways.'],
                    ['name' => 'Knowledge Domain', 'description' => 'Clerics of knowledge gain divine insight into the workings of the world, enabling them to learn and share secrets, skills, and magical lore.'],
                    ['name' => 'Nature Domain', 'description' => 'Connected with the forces of nature, this cleric is attuned to the land, animals, and elements, granting them control over natural magic.'],
                    ['name' => 'Tempest Domain', 'description' => 'Wielding the power of storms and lightning, the Tempest cleric can call down thunder, lightning, and gale-force winds to smite their enemies.'],
                    ['name' => 'War Domain', 'description' => 'The War Domain cleric channels the divine power of war, granting allies martial prowess and supporting them in combat with divine strength and strategy.'],
                    ['name' => 'Death Domain', 'description' => 'Dark and ominous, the Death cleric harnesses the power of death, necromantic energy, and the grave to curse enemies and manipulate life forces.']
                ];
                break;

            case 'Druid':
                $subclasses = [
                    ['name' => 'Circle of the Land', 'description' => 'Druids connected to specific environments, gaining powers tied to their homeland.'],
                    ['name' => 'Circle of the Moon', 'description' => 'Focused on shapeshifting, gaining enhanced forms of wild shape to become powerful beasts.'],
                    ['name' => 'Circle of Spores', 'description' => 'Druids of decay and life’s cycle, using fungal spores to harm enemies and nourish allies.'],
                    ['name' => 'Circle of the Shepherd', 'description' => 'Calls upon spirit guardians to protect allies and enhance their powers.'],
                    ['name' => 'Circle of Stars', 'description' => 'Wields the power of the stars to guide their magic and protect their allies.']
                ];
                break;

            case 'Fighter':
                $subclasses = [
                    ['name' => 'Champion', 'description' => 'Relies on physical prowess and sheer strength to dominate enemies and improve in combat.'],
                    ['name' => 'Battle Master', 'description' => 'Uses a variety of tactical maneuvers to outsmart enemies and gain advantages in battle.'],
                    ['name' => 'Eldritch Knight', 'description' => 'Blends martial prowess with magical abilities, casting spells and using weapons simultaneously.'],
                    ['name' => 'Arcane Archer', 'description' => 'Specializes in magical arrows, imbuing them with powerful magical effects.'],
                    ['name' => 'Samurai', 'description' => 'Masters of discipline, they are skilled in combat and gain extra focus and resilience during battle.'],
                    ['name' => 'Cavalier', 'description' => 'A mounted combat specialist, adept at fighting from horseback and protecting allies.']
                ];
                break;

            case 'Monk':
                $subclasses = [
                    ['name' => 'Way of the Open Hand', 'description' => 'Masters of unarmed combat who can manipulate ki to enhance their physical attacks and healing.'],
                    ['name' => 'Way of Shadow', 'description' => 'Uses stealth, illusion, and darkness to strike enemies from the shadows with deadly precision.'],
                    ['name' => 'Way of the Four Elements', 'description' => 'Harnesses the power of the elements to enhance their combat abilities.'],
                    ['name' => 'Way of the Drunken Master', 'description' => 'Exploits unpredictable movement to confuse and overwhelm enemies in combat.'],
                    ['name' => 'Way of Mercy', 'description' => 'Focused on healing and punishing enemies through strikes that harm or heal with precision.']
                ];
                break;

            case 'Paladin':
                $subclasses = [
                    ['name' => 'Oath of Devotion', 'description' => 'Paladins of honor, justice, and protection, dedicated to the ideals of righteousness and purity.'],
                    ['name' => 'Oath of the Ancients', 'description' => 'Paladins who defend the natural world and protect it from forces that seek to corrupt or destroy it.'],
                    ['name' => 'Oath of Vengeance', 'description' => 'Paladins focused on hunting down and punishing evil, bringing justice to those who have been wronged.'],
                    ['name' => 'Oath of Conquest', 'description' => 'Focused on domination and bringing order through force and control over others.'],
                    ['name' => 'Oath of Redemption', 'description' => 'Seeks peace and redemption for others, focused on non-violent solutions and forgiveness.']
                ];
                break;

            case 'Ranger':
                $subclasses = [
                    ['name' => 'Hunter', 'description' => 'Specializes in tracking and hunting creatures, adapting to the battlefield to outmaneuver foes.'],
                    ['name' => 'Beast Master', 'description' => 'Bonds with a beast companion and gains the ability to fight alongside it.'],
                    ['name' => 'Gloom Stalker', 'description' => 'Master of stealth and shadow, excelling in dark environments and tracking prey.'],
                    ['name' => 'Horizon Walker', 'description' => 'Protects the world from otherworldly threats, traveling between planes and protecting the boundaries of reality.'],
                    ['name' => 'Monster Slayer', 'description' => 'Specialized in slaying powerful and dangerous creatures, using their knowledge to exploit weaknesses.']
                ];
                break;

            case 'Rogue':
                $subclasses = [
                    ['name' => 'Thief', 'description' => 'Experts in stealth, thievery, and evasion, they excel at quick, efficient strikes.'],
                    ['name' => 'Assassin', 'description' => 'Masters of infiltration, deception, and swift kills, they excel at striking when least expected.'],
                    ['name' => 'Arcane Trickster', 'description' => 'Combines magical abilities with rogue techniques, using spells to enhance their stealth and trickery.'],
                    ['name' => 'Mastermind', 'description' => 'Focuses on manipulation, control, and strategic thinking, using their cunning to influence situations.'],
                    ['name' => 'Scout', 'description' => 'Expert in reconnaissance, using survival skills to navigate dangerous terrain and gather information.']
                ];
                break;

            case 'Sorcerer':
                $subclasses = [
                    ['name' => 'Draconic Bloodline', 'description' => 'Taps into their dragon heritage, gaining power from their ancestors to manipulate magical energy.'],
                    ['name' => 'Wild Magic', 'description' => 'Harnesses chaotic, unpredictable magic that can lead to wild and powerful effects.'],
                    ['name' => 'Divine Soul', 'description' => 'Touched by divine magic, they blend arcane and divine spells to heal and smite their enemies.'],
                    ['name' => 'Shadow Magic', 'description' => 'Uses shadowy powers to manipulate darkness and stealth, often associated with the Shadowfell.']
                ];
                break;

            case 'Warlock':
                $subclasses = [
                    ['name' => 'The Fiend', 'description' => 'Makes a pact with a fiendish entity, gaining the ability to deal fiery damage and control others.'],
                    ['name' => 'The Archfey', 'description' => 'Makes a pact with an archfey, gaining abilities related to enchantment and manipulation of emotions.'],
                    ['name' => 'The Great Old One', 'description' => 'Makes a pact with an alien entity from beyond the stars, gaining psychic powers and the ability to manipulate minds.'],
                    ['name' => 'The Celestial', 'description' => 'Makes a pact with a celestial being, gaining healing powers and the ability to deal radiant damage.'],
                    ['name' => 'The Hexblade', 'description' => 'Forms a pact with a sentient weapon, gaining martial abilities and spellcasting power.']
                ];
                break;

            case 'Wizard':
                $subclasses = [
                    ['name' => 'Abjuration', 'description' => 'Specializes in protective spells, creating barriers and negating damage with powerful wards.'],
                    ['name' => 'Conjuration', 'description' => 'Masters of summoning creatures and objects, they can conjure allies and powerful magical effects.'],
                    ['name' => 'Divination', 'description' => 'Masters of foresight and prediction, they gain powerful abilities to foresee and manipulate fate.'],
                    ['name' => 'Enchantment', 'description' => 'Focuses on magic that influences others’ minds, charming, compelling, and controlling enemies.'],
                    ['name' => 'Evocation', 'description' => 'Masters of destructive magic, focused on spells that deal damage and manipulate energy.'],
                    ['name' => 'Illusion', 'description' => 'Uses magic to create illusions, deceive enemies, and manipulate perception.'],
                    ['name' => 'Necromancy', 'description' => 'Masters of the dead, they manipulate life energy, create undead minions, and control the forces of death.'],
                    ['name' => 'Transmutation', 'description' => 'Specializes in transforming materials, changing physical properties, and adapting to different situations.']
                ];
                break;

            default:
                $subclasses = [];
                break;
        }

        // Criando as sub-raças e associando à raça
        foreach ($subclasses as $subclass) {
            CharacterClass::updateOrCreate(
                ['name' => $subclass['name']],
                [
                    'parent_class_id' => $parent_class_id,
                    'type' => 'subclass',
                    'description' => $subclass['description']
                ]
            );
        }
    }
}
