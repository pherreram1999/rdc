<?php

namespace App\Http\Controllers;

use App\Grid\Grid;
use App\Models\TarjetaCredito;
use Illuminate\Http\Request;

class TarjetCreditoController extends Grid
{
    protected string $modelClass = TarjetaCredito::class;
    protected string $title = 'Tarjetas';
    protected string $resource = 'tarjetas';
    protected string $page = 'TarjetaCredito';


    protected function mounted()
    {
        $this->toolbar
            ->actions
            ->addAction(
                'Tipos',
                route('tarjetas.index'),
                'bi-plus'
            );
    }

}
