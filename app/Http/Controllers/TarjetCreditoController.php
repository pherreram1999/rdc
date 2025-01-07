<?php

namespace App\Http\Controllers;

use App\Grid\Grid;
use App\Models\TarjetaCredito;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TarjetCreditoController extends Grid
{
    protected string $modelClass = TarjetaCredito::class;
    protected string $title = 'Tarjetas';
    protected string $resource = 'tarjetas';
    protected string $page = 'TarjetaCredito';


    protected function mounted()
    {
        /* //Toolbar
         * $this->toolbar
            ->actions
            ->addAction(
                'Pagar',
                route('tarjetas.index'),
                'bi-plus'
            );*/
        $this->rows
            ->actions
            ->addAction(
                'Pagar',
                route('tarjeta-credito.pagar',[';id;']),
                'bi-plus'
            );
    }
    public function pagar($id,Request $request){
        return Inertia::render('PagarTarjeta', []);
    }


    protected function beforeMount()
    {
        $this->rows->actions->addAction(
            'Tipos',
            route('tarjeta-credito.tipos.index'),
            'bi-1-circle-fill',
        );
    }


}
