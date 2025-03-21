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
        Schema::create('actions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Nome da habilidade');
            $table->boolean('concentration')->default(false)->comment('True se é usado concentração na habilidade');
            $table->decimal('range')->comment('Alcance da habilidade');
            $table->integer('duration')->default(0)->comment('Qtd de turnos que dura a habilidade');
            $table->integer('casting_time')->default(0)->comment('Qtd de turnos para poder usar a habilidade');
            $table->integer('cooldown')->default(1)->comment('Qtd de turnos para poder re-usar a habilidade');
            $table->decimal('aoe')->default(0)->comment('Área de efeito da habilidade');
            $table->text('description')->nullable()->comment('Descrição da habilidade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actions');
    }
};
