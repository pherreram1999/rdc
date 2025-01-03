<?php

namespace App\Http\Controllers;
use App\Grid\Grid;
use App\Models\Presupuestos;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PresupuestosController extends Grid
{
    protected string $modelClass = Presupuestos::class;
    protected string $title = 'Presupuestos';
    protected string $resource = 'Presupuestos';
    protected string $page = 'Presupuestos';
}
