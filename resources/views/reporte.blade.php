<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reporte General</title>
</head>
<body>
<table>
    <thead>
        <tr>
            <th>Monto</th>
            <th>Descripción</th>
            <th>Concepto</th>
            <th>Fecha</th>
        </tr>
    </thead>
    <tbody>
        @foreach($ingresos as $ingreso)
            <tr>
                <td>{{ $ingreso->Monto  }}</td>
                <td>{{ $ingreso->Descripcion  }}</td>
                <td>{{ $ingreso->Concepto  }}</td>
                <td>{{ $ingreso->Fecha  }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
</body>
</html>
