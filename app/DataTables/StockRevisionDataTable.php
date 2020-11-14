<?php

namespace App\DataTables;

use App\StockRevision;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Html\Editor\Editor;

class StockRevisionDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('product_detail', function (StockRevision $product) {
                    return !empty($product->product_id) ? optional($product->product_detail)->name. ' '.$product->full_name  : '<span class="badge badge-pill badge-secondary"> <em>No asignado</em></span>';
            })
            ->addColumn('action', 'stockrevision.action')
            ->rawColumns(['product_detail', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\StockRevision $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(StockRevision $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('stockrevision-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('create'),
                        Button::make('export'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            ['data' => 'id', 'title' => '#', 'printable' => false, 'exportable' => false],
            ['data' => 'sale_id', 'title' => __('labels.backend.access.revision.table.order')],
            ['data' => 'product_detail', 'title' => __('labels.backend.access.revision.table.product')],
            ['data' => 'quantity', 'title' => __('labels.backend.access.revision.table.stock')],
            ['data' => 'created_at', 'title' => __('labels.backend.access.revision.table.last_updated')],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'StockRevision_' . date('YmdHis');
    }
}
