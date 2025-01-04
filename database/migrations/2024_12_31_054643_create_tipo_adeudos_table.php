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
            $table->decimal('adeudo',10,2);
            //La tarjeta de credito es un Adeudo
            $table->unsignedBigInteger('tarjeta_credito_id')->nullable();
            $table->foreign('tarjeta_credito_id')->references('id')->on('tarjeta_creditos');
            $table->date('fecha_corte')->nullable();


            //php artisan adeudos:mover
            $table->boolean('procesado')->default(false);

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
