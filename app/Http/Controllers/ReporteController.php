<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReporteRequest;
use App\Sources\ReporteSource;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Inertia\Inertia;
use mitoteam\jpgraph\MtJpGraph;

class ReporteController extends Controller
{
    public function __invoke(Request $request)
    {
        return Inertia::render('Reporte');
    }

    public function renderPDF(ReporteRequest $request)
    {
        // obtenemos los datos para las graficas

        // obtenemos la cantidad de ingresos de acuerdo a la fehca

        $source = new ReporteSource(
            fechaInicio: $request->get('fecha_inicio'),
            fechaFin: $request->get('fecha_fin')
        );

        $datos = $source->query();


        $countData = [
            $datos['ingresos']->count(),
            $datos['deudas']->count(),
        ];

        $moneyData = [
            $datos['ingresos']->sum('Monto'),
            $datos['deudas']->sum('monto'),
        ];

        // cargamos la libreria grafica

        MtJpGraph::load('pie');

        $makeGraph = function (array $data,array $legends): string {
            $countGraph = new \PieGraph();
            $countGraph->title->Set('No. Ingresos');
            $countPlot = new \PiePlot($data);
            $countPlot->SetLegends($legends);
            $countGraph->Add($countPlot);
            ob_start();
            $imageHandle = $countGraph->Stroke(_IMG_HANDLER);
            imagepng($imageHandle);
            $imageData = ob_get_contents();
            ob_end_clean();
            return $imageData;
        };


        dd($makeGraph($countData,['Ingresos','Deudas']));




        $pdf = Pdf::loadView('reporte', $datos);

        $pdf->setPaper('Letter', 'landscape');

        return $pdf->stream('reporte.pdf');
    }
}
