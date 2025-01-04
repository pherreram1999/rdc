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
        Schema::create('deudas', function (Blueprint $table) {
            $table->id();
            $table->decimal('monto',10,2);
            $table->decimal('interes', 6, 2)->nullable();  // Nuevo campo para almacenar el interés
            $table->date('fecha_de_pago');
            $table->string('acreditor');
            $table->text('concepto')->nullable();
            // Relación con adeudos (origen del adeudo)
            $table->unsignedBigInteger('tipo_adeudo_id')->nullable();
            $table->foreign('tipo_adeudo_id')->references('id')->on('tipo_adeudos');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deudas');
    }
};
