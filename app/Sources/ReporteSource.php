<?php

namespace App\Sources;

use App\Models\Ingresos;
use Illuminate\View\View;

class ReporteSource
{
    public function __construct(
        private string $fechaInicio,
        private string $fechaFin
    )
    {

    }

    public function query()
    {
        return [
            'ingresos' => Ingresos::whereBetween('fecha', [$this->fechaInicio, $this->fechaFin])
        ];
    }


}
