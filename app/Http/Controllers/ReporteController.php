<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReporteRequest;
use App\Sources\ReporteSource;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Spatie\LaravelPdf\Facades\Pdf;

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

        return Pdf::view('reporte', $source->query())
            ->format('letter')
            ->name('reporte.pdf');
    }
}
