<?php

namespace App\Http\Controllers;
use App\Grid\Grid;
use App\Models\TipoAdeudo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TipoAdeudoController extends Grid
{
    protected string $modelClass = TipoAdeudo::class;
    protected string $title = 'Tipo de adeudos';
    protected string $resource = 'tipo-adeudos';
    protected string $page = 'TipoAdeudo';
}