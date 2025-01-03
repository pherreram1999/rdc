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
        //cambiar nombre a adeudos
        Schema::create('tipo_adeudos', function (Blueprint $table) {
            $table->id();
            $table->string("nombre")->unique();
            $table->text("categoria");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipo_adeudos');
    }
};
