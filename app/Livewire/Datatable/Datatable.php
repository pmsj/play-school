<?php

namespace App\Livewire\Datatable;

use Livewire\Component;
use Illuminate\Support\Facades\Schema;
use Livewire\WithPagination;

class Datatable extends Component
{
    use WithPagination;

    public $model;
    public $columns;
    public $exclude;
    public $paginate;
    public $checked = [];
    public $query;

    public function mount($model, $exclude = '', $paginate = 10)
    {
        $this->model = $model;
        $this->exclude = explode(',', $exclude); // comma seerated value for exclusion of dabasetable columns
        $this->columns = $this->columns(); //dynamically gttting columns from database table 
        $this->paginate = $paginate; // custom pagination
    }

    public function updatingPaginate($value)
    {
        $this->resetPage();
        $this->emitUp('paginateUpdated', $value);
    }

    public function columns()
    {
        // it pull the database table from given model by using ->from property ->on builder

        return collect(Schema::getColumnListing($this->builder()->getQuery()->from))
            ->reject(function ($column) {
                return in_array($column, $this->exclude);  //rejecting the columns that need not be displayed
            })
            ->toArray();                
    }

    public function builder()
    {
        return new $this->model;
    }

    protected function checkedRecords()
    {
        return $this->builder()->whereIn('id', $this->checked);
    }
    public function isChecked($record)
    {
        
        return in_array($record->id, $this->checked);
 
    }
    public function deleteChecked()
    {
        $this->checkedRecords()->delete();
        $this->checked = [];
    }

    public function records()
    {
        $builder = $this->builder();

        if($this->query)
        {
            $builder = $builder->search($this->query);
        }

        return $builder->paginate($this->paginate);
    }
   
    public function render()
    {
        return view('livewire.datatable.datatable');
    }
}
