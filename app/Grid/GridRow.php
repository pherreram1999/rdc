<?php

namespace App\Grid;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Database\Eloquent\Model;

class GridRow implements Arrayable
{
    public function __construct(
        private Model $rowitem,
        private GridRowCollection $collection
    )
    {

    }

    public function toArray(): array {
        return [
            'data' => $this->rowitem->toArray(),
        ];
    }
}
