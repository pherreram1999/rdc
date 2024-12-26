<?php

namespace App\Grid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

abstract class Grid extends \App\Http\Controllers\Controller {
    protected string $modelClass;
    protected string $title;

    protected string $view = 'Grid';
    private GridColumnCollection $columns;
    private GridRowCollection $rows;
    private string $_table;
    private Model $_model;
    protected bool $excludeStamps = true;

    /**
     * @throws \Exception
     */
    final protected function init(){
        $conn = DB::connection();
        $schemaBuilder = $conn->getSchemaBuilder();
        /** @var Model $model */
        $this->_model = new $this->modelClass;
        $this->_table = $this->_model->getTable();
        $columns = $schemaBuilder->getColumnListing($this->_table);
        if($this->excludeStamps)
            $columns = array_diff($columns,['created_at','updated_at']);

        $this->columns = new GridColumnCollection($columns,$this);

        $this->rows = new GridRowCollection(
            intval(request('page',1)),
            $this
        );
    }

    /**
     * @param Model $model
     * @return void
     */
    protected function beforeMount(mixed $model){

    }

    final public function index()
    {
        $this->init();
        return Inertia::render($this->view,$this->toArray());
    }


    public function getTableName(): string {
        return $this->_table;
    }

    public function getModel(): Model
    {
        return $this->_model;
    }

    public function getModelClass(): string
    {
        return $this->modelClass;
    }

    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'columns' => $this->columns->toArray(),
            'rows' => $this->rows->toArray(),
        ];
    }

    public function getColumns(): GridColumnCollection
    {
        return $this->columns;
    }
}
