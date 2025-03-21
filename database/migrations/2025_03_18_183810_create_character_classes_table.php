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
        Schema::create('character_classes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent_class_id')->nullable()->constrained('character_classes')->onDelete('cascade')->comment('Classe da sub-classe');
            $table->string('name')->comment('Nome da classe');
            $table->enum('type', ['class', 'subclass'])->default('class')->comment('Definição se é uma classe ou sub-classe');
            $table->text('description')->nullable()->comment('Descrição da classe');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('character_classes');
    }
};
