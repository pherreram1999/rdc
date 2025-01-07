<?php

namespace App\Http\Controllers;
use App\Grid\Grid;
use App\Models\Simulaicon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SimulacionController extends Grid
{
    protected string $modelClass = Simulaicon::class;
    protected string $title = 'Simulacion';
    protected string $resource = 'Simulacion';
    protected string $page = 'Simulacion';
}
