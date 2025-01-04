<?php
/*
Verifica las fechas de corte de (TarjetasCreditorObserver) para moverlas a Deudas o no.
Porque: Una tarjeta de crédito puede convertirse en deuda si no se pagan los saldos adeudados en su totalidad antes de la fecha límite de pago.

POrogramar para que el comando "php artisan verificar:fechas-corte" se ejecute diarimente
*/
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\TipoAdeudo;
use App\Models\Deudas;
use App\Models\TarjetaCredito;
use Carbon\Carbon;

class VerificarFechasCorte extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'verificar:fechas-corte';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Verifica las fechas de corte de las tarjetas de crédito y crea un adeudo si la fecha actual ha pasado la fecha de corte';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        // Obtener todas las deudas cuyo procesado sea false y que tengan una fecha de corte
        $adeudos = TipoAdeudo::where('procesado', false)
            ->whereNotNull('fecha_corte')
            ->get();

        foreach ($adeudos as $adeudo) {
            // Verificar si la fecha de corte ha pasado
            if (Carbon::now()->greaterThanOrEqualTo($adeudo->fecha_corte)) {
                // Obtener la tarjeta de crédito relacionada
                $tarjeta = $adeudo->tarjetaCredito; // Obtener la tarjeta asociada (con la relación cargada previamente)

                // Verificar si existe la tarjeta y si tiene una tasa de interés
                $interes = 0;
                if ($tarjeta && $tarjeta->tasa_interes) {
                    // Calcular el interés (si existe tasa de interés en la tarjeta)
                    $interes = ($adeudo->adeudo * $tarjeta->tasa_interes) / 100;
                }

                // Calcular el monto total de la deuda (adeudo + interés)
                $montoTotal = $adeudo->adeudo + $interes;



                // Mover el registro a la tabla de "deudas"
                $deuda = new Deudas();  // Instancia de Deudas (en plural)
                //$deuda->monto = $adeudo->adeudo;
                $deuda->monto = $montoTotal;  // Usar el monto total (adeudo + interés)
                $deuda->fecha_de_pago = $adeudo->fecha_corte; // Fecha de corte
                $deuda->acreditor = $adeudo->nombre;  // Nombre de la tarjeta o acreedor
                $deuda->concepto = $adeudo->categoria;  // Categoría de la deuda
                $deuda->tipo_adeudo_id = $adeudo->id;  // Relación con el tipo de adeudo
                // Acceder a la tasa de interés de la tarjeta asociada
                $deuda->interes = $interes;

                $deuda->save();
                // Opcional: Marcar el adeudo como procesado
                $adeudo->update([
                    'procesado' => true,
                ]);


                $this->info("La deuda de la tarjeta {$adeudo->nombre} ha sido movida a la tabla de deudas.");
            }
        }

    }
}
