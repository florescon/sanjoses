<?php

namespace App\DataTables;

use App\ProductStockHistory;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Html\Editor\Editor;
use Carbon;

class ProductStockHistoryDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $query = $query->with('product_stock', 'generated_by');
        if(request('start_date') && request('end_date')){
            $query->whereBetween('updated_at', [request('start_date'), request('end_date')]);
            // $data->whereBetween('updated_at', array(request('from_date'), request('end_date')))
            // ->get();
        }

        return datatables()
            ->eloquent($query)
            ->addColumn('part', function (ProductStockHistory $part) {
                    return !empty($part->product_stock_id) ? $part->product_stock->product_detail->code : '';
            })
            ->addColumn('product_stock', function (ProductStockHistory $product_stock) {
                    return !empty($product_stock->product_stock_id) ? '<strong>'.$product_stock->product_stock->product_detail->code.'</strong> '.$product_stock->product_stock->product_detail->name. ' '.$product_stock->product_stock->full_name  : '<span class="badge badge-pill badge-secondary"> <em>No asignada</em></span>';
            })
            ->editColumn('quantity', function ($dat) {
                return $dat->quantity ? '<strong>'.$dat->quantity.'</strong>' : '';
            })
            ->addColumn('actual', function (ProductStockHistory $actual) {
                    return $actual->old_quantity + $actual->quantity;
            })
            ->addColumn('audi', function (ProductStockHistory $audi) {
                    return !empty($audi->audi_id) ? $audi->generated_by->name  : '<span class="badge badge-pill badge-secondary"> <em>No asignado</em></span>';
            })
            ->editColumn('created_at', function ($dat) {
                return $dat->created_at ? with(new Carbon($dat->created_at))->format('d-m-Y H:i:s') : '';
            })
            ->addColumn('action', function ($row) {
 
                           $btn = '
                           ';

                           return $btn;
            })
            ->rawColumns(['action', 'product_stock', 'quantity', 'actual', 'audi']);

    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\ProductStockHistory $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(ProductStockHistory $model)
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
                    ->columns($this->getColumns())
                    ->ajax('')
                    ->addAction(['width' => '10%', 'printable' => false])
                    ->parameters([
                        'order' => [0, 'asc'],
                        'pageLength' => 10,
                        'responsive' => true,
                        'autoWidth' => false,
                        'dom'          => 'lBfrtip',
                        'buttons'      => [
                            ['extend' => 'export', 'text' => 'Exportar&nbsp;<i class="fa fa-caret-down"></i>'],
                            ['extend' => 'print', 'text' => 'Imprimirr&nbsp;<i class="fa fa-print"></i>'],
                        ],
                        'language' => [
                            'url' => url('//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json')
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
            ['data' => 'id', 'title' => '#', 'printable' => false, 'exportable' => false],
            ['data' => 'product_stock', 'title' => __('labels.backend.access.material.material'), 'class' =>'text-center'],
            ['data' => 'old_quantity', 'title' => __('labels.backend.access.material.table.previous_stock')],
            ['data' => 'quantity', 'title' => __('labels.backend.access.material.table.operation')],
            ['data' => 'actual', 'title' => __('labels.backend.access.material.table.stock')],
            ['data' => 'type', 'title' => __('labels.backend.access.material.table.type')],
            ['data' => 'audi', 'title' => __('labels.backend.access.material.table.created_by')],
            ['data' => 'created_at', 'title' => __('labels.backend.access.material.table.created')],

        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'ProductoHistorialCantidades_' . date('YmdHis');
    }
}
