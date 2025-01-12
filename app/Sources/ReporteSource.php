<?php

namespace App\Sources;

use App\Models\Deudas;
use App\Models\Ingresos;
use Illuminate\View\View;

class ReporteSource
{
    public function __construct(
        private string $fechaInicio,
        private string $fechaFin
    ) {

    }

    public function query()
    {
        return [
            'ingresos' => Ingresos::whereBetween('Fecha', [$this->fechaInicio, $this->fechaFin])->get(),
            'deudas' => Deudas::whereBetween('fecha_de_pago', [$this->fechaInicio, $this->fechaFin])->get(),
        ];
    }


}
