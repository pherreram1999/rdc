<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Chart\Chart;
use PhpOffice\PhpSpreadsheet\Chart\DataSeries;
use PhpOffice\PhpSpreadsheet\Chart\DataSeriesValues;
use PhpOffice\PhpSpreadsheet\Chart\Layout;
use PhpOffice\PhpSpreadsheet\Chart\PlotArea;
use PhpOffice\PhpSpreadsheet\Chart\Legend;

class ExcelController extends Controller
{
    public function exportToExcel(Request $request)
    {
        $request->validate([
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
        ]);

        $fechaInicio = $request->input('fecha_inicio');
        $fechaFin = $request->input('fecha_fin');

        // Tablas a exportar
        $tabla1 = DB::table('ingresos')
            ->whereBetween('created_at', [$fechaInicio, $fechaFin])
            ->get();

        $tabla2 = DB::table('pago_tarjetas')
            ->whereBetween('created_at', [$fechaInicio, $fechaFin])
            ->get();

        $tabla3 = DB::table('quincenas')
            ->whereBetween('created_at', [$fechaInicio, $fechaFin])
            ->get();

        $tabla4 = DB::table('tarjeta_creditos')
            ->whereBetween('created_at', [$fechaInicio, $fechaFin])
            ->get();

        // Crear el archivo Excel
        $spreadsheet = new Spreadsheet();

        // Hoja 1: 'Ingresos'
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle('Ingresos');
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Monto');
        $sheet->setCellValue('C1', 'Descripcion');
        $sheet->setCellValue('D1', 'Concepto');
        $sheet->setCellValue('E1', 'Fecha Creacion');
        $row = 2;
        foreach ($tabla1 as $data) {
            $sheet->setCellValue('A' . $row, $data->id);
            $sheet->setCellValue('B' . $row, $data->Monto);
            $sheet->setCellValue('C' . $row, $data->Descripcion);
            $sheet->setCellValue('D' . $row, $data->Concepto);
            $sheet->setCellValue('E' . $row, $data->created_at);
            $row++;
        }

        // Hoja 2: 'Pago de Tarjetas'
        $sheet = $spreadsheet->createSheet();
        $sheet->setTitle('Pago de Tarjetas');
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Monto');
        $sheet->setCellValue('C1', 'Tipo Liquidacion');
        $sheet->setCellValue('D1', 'Estado');
        $sheet->setCellValue('E1', 'Fecha Creacion');
        $row = 2;
        foreach ($tabla2 as $data) {
            $sheet->setCellValue('A' . $row, $data->id);
            $sheet->setCellValue('B' . $row, $data->Monto);
            $sheet->setCellValue('C' . $row, $data->tipo_liquidacion);
            $sheet->setCellValue('D' . $row, $data->estado);
            $sheet->setCellValue('E' . $row, $data->created_at);
            $row++;
        }

        // Hoja 3: 'Quincenas'
        $sheet = $spreadsheet->createSheet();
        $sheet->setTitle('Quincenas');
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Monto');
        $sheet->setCellValue('C1', 'Monto Apartado');
        $sheet->setCellValue('D1', 'Fecha Creacion');
        $row = 2;
        foreach ($tabla3 as $data) {
            $sheet->setCellValue('A' . $row, $data->id);
            $sheet->setCellValue('B' . $row, $data->Monto);
            $sheet->setCellValue('C' . $row, $data->Monto_apartado);
            $sheet->setCellValue('D' . $row, $data->created_at);
            $row++;
        }

        // Hoja 4: 'Tarjeta de Créditos'
        $sheet = $spreadsheet->createSheet();
        $sheet->setTitle('Tarjeta de Créditos');
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Nombre');
        $sheet->setCellValue('C1', 'No Tarjeta');
        $sheet->setCellValue('D1', 'Tipo');
        $sheet->setCellValue('E1', 'Limite');
        $sheet->setCellValue('F1', 'Fecha Corte');
        $sheet->setCellValue('G1', 'Tasa Interes');
        $sheet->setCellValue('H1', 'Observaciones');
        $sheet->setCellValue('I1', 'Fecha Creacion');
        $row = 2;
        foreach ($tabla4 as $data) {
            $sheet->setCellValue('A' . $row, $data->id);
            $sheet->setCellValue('B' . $row, $data->nombre);
            $sheet->setCellValue('C' . $row, $data->no_tarjeta);
            $sheet->setCellValue('D' . $row, $data->tipo);
            $sheet->setCellValue('E' . $row, $data->limite);
            $sheet->setCellValue('F' . $row, $data->fecha_corte);
            $sheet->setCellValue('G' . $row, $data->tasa_interes);
            $sheet->setCellValue('H' . $row, $data->observaciones);
            $sheet->setCellValue('I' . $row, $data->created_at);
            $row++;
        }

        // Guardar el archivo Excel
        $writer = new Xlsx($spreadsheet);
        $filePath = public_path('Reporte.xlsx');
        $writer->save($filePath);

        // Descargar el archivo
        return response()->download($filePath)->deleteFileAfterSend(true);
    }
}
