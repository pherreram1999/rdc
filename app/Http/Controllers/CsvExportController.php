<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CsvExportController extends Controller
{
    public function exportToCsv(Request $request)
    {
        // **1. Validar las fechas recibidas**
        $request->validate([
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
        ]);

        // **2. Recuperar las fechas**
        $fechaInicio = $request->input('fecha_inicio');
        $fechaFin = $request->input('fecha_fin');

        // **3. Obtener datos de múltiples tablas**
        $tabla1 = DB::table('ingresos')
            ->whereBetween('created_at', [$fechaInicio, $fechaFin])
            ->get();

        $tabla2 = DB::table('pago_tarjetas')
            ->whereBetween('created_at', [$fechaInicio, $fechaFin])
            ->get();

        // Puedes añadir más tablas si lo necesitas.

        // **4. Crear el archivo CSV**
        $fileName = 'exportacion_multitablas.csv';
        $filePath = public_path($fileName);

        $file = fopen($filePath, 'w');
        // Escribir encabezados
        fputcsv($file, ['Tabla', 'ID', 'Campo1', 'Campo2', 'Campo3', 'Fecha Creacion']);

        // Escribir datos de la primera tabla
        foreach ($tabla1 as $row) {
            fputcsv($file, ['Tabla1', $row->id, $row->Monto, $row->Descripcion, $row->Concepto, $row->created_at]);
        }

        // Escribir datos de la segunda tabla
        foreach ($tabla2 as $row) {
            fputcsv($file, ['Tabla2', $row->id, $row->Monto, $row->tipo_liquidacion, $row->estado, $row->created_at]);
        }


        //Cierra archivo
        fclose($file);

        // **5. Descargar el archivo**
        return response()->download($filePath)->deleteFileAfterSend(true);
    }
}
