<?php

namespace App\Grid;

use Illuminate\Contracts\Support\Arrayable;

class GridColumnCollection implements Arrayable
{
    private array $columns;
    private $_grid;

    public function __construct(
        array $columns,
        Grid $grid
    ){
        foreach ($columns as $column){
            if(gettype($column) != 'string')
                throw new \Exception("Todas las columnas deben ser string [$column]");

            $this->columns[$column] = new GridColumn($column,$this);
        }
        $this->_grid = $grid;

    }


    public function getGrid(): Grid {
        return $this->_grid;
    }

    public function toArray(): array
    {
        return array_map(function (GridColumn $column){
            return $column->toArray();
        }, $this->columns);
    }

    public function getKeys(): array
    {
        return array_keys($this->columns);
    }

}
