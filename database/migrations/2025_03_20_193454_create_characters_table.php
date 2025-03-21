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
        Schema::create('characters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('campaign_id')->constrained('campaigns')->onDelete('cascade')->comment('Campanha do personagem');
            $table->foreignId('race_id')->constrained('races')->onDelete('cascade')->comment('Raça do personagem');
            $table->foreignId('class_id')->constrained('character_classes')->onDelete('cascade')->comment('Classe do personagem');
            $table->string('name')->comment('Nome do personagem');
            $table->integer('level')->default(1)->comment('Nível do personagem');
            $table->text('background')->comment('História do personagem');
            $table->text('description')->nullable()->comment('Descrição sobre personagem');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('characters');
    }
};
