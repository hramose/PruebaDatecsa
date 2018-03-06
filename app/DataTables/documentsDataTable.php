<?php

namespace App\DataTables;

use App\Models\documents;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class documentsDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addColumn('action', 'documents.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Post $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(documents $model)
    {
        /*Se consulta los documentos relacionado con los tipos de documentos */
         return $model::with('type_documents');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '80px'])
            ->parameters([
                'dom'     => 'Bfrtip',
                'order'   => [[0, 'desc']],
                'buttons' => [
                    'create',
                    ['extend' => 'collection','text' => '<i class="fa fa-download"></i> Export <span class="caret"></span>', 'buttons' => ['excel', 'csv']],
                    'print',
                    'reset',
                    'reload',
                ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'nombre_archivo',
            'Tipo Documento' => ['data' => 'type_documents.nombre', 'name' => 'type_documents.nombre'],
            'indice1',
            'indice2',
            'indice3'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'documentsdatatable_' . time();
    }
}
