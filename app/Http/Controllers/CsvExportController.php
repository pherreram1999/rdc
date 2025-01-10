<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CsvExportController extends Controller
{
    public function exportToCsv(Request $request)
    {
        $request->validate([
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
        ]);

        $fechaInicio = $request->input('fecha_inicio');
        $fechaFin = $request->input('fecha_fin');

        //tablas a exportar
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


        $fileName = 'Reporte.csv';
        $filePath = public_path($fileName);

        $file = fopen($filePath, 'w');

        // Escribir la tabla de 'ingresos'
        fputcsv($file, ['Tabla: Ingresos']);
        fputcsv($file, ['ID', 'Monto', 'Descripcion', 'Concepto', 'Fecha Creacion']);
        foreach ($tabla1 as $row) {
            fputcsv($file, [$row->id, $row->Monto, $row->Descripcion, $row->Concepto, $row->created_at]);
        }
        fputcsv($file, []); // Dejar una línea en blanco entre tablas

        // Escribir la tabla de 'pago_tarjetas'
        fputcsv($file, ['Tabla: Pago de Tarjetas']);
        fputcsv($file, ['ID', 'Monto', 'Tipo Liquidacion', 'Estado', 'Fecha Creacion']);
        foreach ($tabla2 as $row) {
            fputcsv($file, [$row->id, $row->Monto, $row->tipo_liquidacion, $row->estado, $row->created_at]);
        }
        fputcsv($file, []); // Dejar una línea en blanco entre tablas

        // Escribir la tabla de 'quincenas'
        fputcsv($file, ['Tabla: Quincenas']);
        fputcsv($file, ['ID', 'Monto', 'Monto Apartado', 'Fecha Creacion']);
        foreach ($tabla3 as $row) {
            fputcsv($file, [$row->id, $row->Monto, $row->Monto_apartado, $row->created_at]);
        }
        fputcsv($file, []); // Dejar una línea en blanco entre tablas

        // Escribir la tabla de 'tarjeta_creditos'
        fputcsv($file, ['Tabla: Tarjetas']);
        fputcsv($file, ['ID', 'Nombre', 'No Tarjeta', 'Tipo', 'Limite', 'Fecha Corte', 'Tasa Interes', 'Observaciones', 'Fecha Creacion']);
        foreach ($tabla4 as $row) {
            fputcsv($file, [$row->id, $row->nombre, $row->no_tarjeta, $row->tipo, $row->limite, $row->fecha_corte, $row->tasa_interes, $row->observaciones, $row->created_at]);
        }

        fclose($file);

        return response()->download($filePath)->deleteFileAfterSend(true);
    }
}
