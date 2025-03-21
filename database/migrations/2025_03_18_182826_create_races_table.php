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
        Schema::create('races', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent_race_id')->nullable()->constrained('races')->onDelete('cascade')->comment('Raça da sub-raça');
            $table->string('name')->comment('Nome da raça');
            $table->enum('type', ['race', 'subrace'])->default('race')->comment('Definição se é uma raça ou sub-raça');
            $table->text('description')->nullable()->comment('Descrição da raça');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('races');
    }
};
