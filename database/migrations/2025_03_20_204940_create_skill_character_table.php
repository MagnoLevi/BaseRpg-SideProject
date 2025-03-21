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
        Schema::create('skill_character', function (Blueprint $table) {
            $table->id();
            $table->foreignId('character_id')->constrained('characters')->onDelete('cascade')->comment('Id do personagem');
            $table->foreignId('skill_id')->constrained('skills')->onDelete('cascade')->comment('Id da skill');
            $table->integer('points')->default(1)->comment('Pontos que o personagem têm na skill');
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['character_id', 'skill_id'], 'unique_character_skill');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skill_character');
    }
};
