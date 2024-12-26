<?php

namespace App\Http\Controllers;

use App\Grid\Grid;
use App\Models\TarjetaCredito;
use Illuminate\Http\Request;

class TarjetCreditoController extends Grid
{
    protected string $modelClass = TarjetaCredito::class;
    protected string $title = 'Tarjeta de Creditos';

}
