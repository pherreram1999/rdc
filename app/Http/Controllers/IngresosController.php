<?php

namespace App\Http\Controllers;

//use App\Http\Controllers\Controller;
use App\Grid\Grid;
use App\Models\Ingresos;
use Illuminate\Http\Request;

class IngresosController extends Grid
{
    protected string $modelClass = Ingresos::class;
    protected string $title = 'Ingresos Usuario';
    protected string $resource = 'Ingresos';
    protected string $page = 'Ingresos';
}
