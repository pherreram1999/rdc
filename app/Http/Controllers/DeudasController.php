<?php

namespace App\Http\Controllers;

use App\Grid\Grid;
use App\Models\Deudas;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeudasController extends Grid
{
    protected string $modelClass = Deudas::class;
    protected string $title = 'Deudas';
    protected string $resource = 'Deudas';
    protected string $page = 'Deudas';

}
