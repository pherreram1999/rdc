<?php

namespace App\Grid;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Pagination\LengthAwarePaginator;

class GridRowCollection implements Arrayable
{

    private LengthAwarePaginator $_pagintator;
    private array $rows;

    public function __construct(
        private int $page,
        private Grid $_grid
    )
    {
        $this->init();
    }

    private function init(){
        $model = $this->_grid->getModelClass();

        $cols = $this->_grid->getColumns()->getKeys();
        /** @var LengthAwarePaginator $paginator */
        $paginator = $model::select($cols)->paginate(15);
        $paginator->withQueryString();

        foreach ($paginator->items() as $item) {
            $this->rows[] = new GridRow($item,$this);
        }
    }

    public function toArray(): array
    {
        return array_map(function (GridRow $row){
            return $row->toArray();
        },$this->rows);
    }
}
