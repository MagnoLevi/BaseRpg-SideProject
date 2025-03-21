<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ability_character', function (Blueprint $table) {
            $table->id();
            $table->foreignId('character_id')->constrained('characters')->onDelete('cascade')->comment('id do personagem');
            $table->foreignId('ability_id')->constrained('abilities')->onDelete('cascade')->comment('id da habilidade');
            $table->integer('points')->default(1)->comment('Pontos que o personagem têm na habilidade');
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['character_id', 'ability_id'], 'unique_character_ability');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ability_character');
    }
};
