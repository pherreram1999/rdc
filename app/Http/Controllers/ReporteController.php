<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReporteRequest;
use App\Sources\ReporteSource;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ReporteController extends Controller
{
    public function __invoke(Request $request)
    {
        return Inertia::render('Reporte');
    }

    public function renderPDF(ReporteRequest $request)
    {
        $source = new ReporteSource(
            fechaInicio: $request->get('fecha_inicio'),
            fechaFin: $request->get('fecha_fin')
        );
        $pdf = Pdf::loadView('reporte', $source->query());

        $pdf->setPaper('Letter', 'landscape');

        return $pdf->stream('reporte.pdf');
    }
}
