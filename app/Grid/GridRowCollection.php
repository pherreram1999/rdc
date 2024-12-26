<?php

namespace App\Grid;

use Illuminate\Pagination\LengthAwarePaginator;

class GridRowCollection
{

    private LengthAwarePaginator $_pagintator;
    public function __construct(
        private int $page,
        private Grid $_grid
    )
    {
        $this->init();
    }

    private function init(){
        $model = $this->_grid->getModelClass();

        /** @var LengthAwarePaginator $paginator */
        $paginator = $model::paginate(15);
        $paginator->withQueryString();

        dd($paginator->toArray());
    }
}
