<?php

namespace App\Http\Controllers;

use App\Grid\Grid;
use App\Http\Controllers\Controller;
use App\Models\Quincenas;
use Illuminate\Http\Request;

class QuincenasController extends Grid
{
    protected string $modelClass = Quincenas::class;
    protected string $title = 'Quincena';
    protected string $resource = 'Quincenas';
    protected string $page = 'Quincenas';
}
