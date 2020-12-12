<?php

namespace App\DataTables;

use App\ColorSizeProduct;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Html\Editor\Editor;
use Carbon;

class ProductStockDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $query = $query->with('product_detail', 'product_detail_color', 'product_detail_size');

        $end_date = new Carbon(request('end_date'));

        if(request('start_date') && request('end_date')){
            $query->whereBetween('updated_at', [request('start_date'), $end_date->endOfDay()]);
            // $data->whereBetween('updated_at', array(request('from_date'), request('end_date')))
            // ->get();
        }

        return datatables()
            ->eloquent($query)
            ->addColumn('code_general', function (ColorSizeProduct $code) {
                    return !empty($code->product_id) ? optional($code->product_detail)->code : '';
            })
            ->addColumn('product_detail', function (ColorSizeProduct $product) {
                    return !empty($product->product_id) ? optional($product->product_detail)->name. ' '.$product->full_name  : '<span class="badge badge-pill badge-secondary"> <em>No asignado</em></span>';
            })
            ->editColumn('created_at', function ($dat) {
                return $dat->created_at ? with(new Carbon($dat->created_at))->format('d-m-Y H:i:s') : '';
            })
            ->editColumn('updated_at', function ($dat) {
                return $dat->updated_at ? with(new Carbon($dat->updated_at))->format('d-m-Y H:i:s') : '';
            })
            ->addColumn('action', function ($row) {
 
                           $btn = '

                           ';

                           return $btn;
            })
            ->rawColumns(['code_general','product_detail', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\ProductStock $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(ColorSizeProduct $model)
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
            ['data' => 'product_detail', 'title' => __('labels.backend.access.product.table.name')],
            ['data' => 'stock', 'title' => __('labels.backend.access.product.table.stock')],
            ['data' => 'price', 'title' => __('labels.backend.access.product.table.price')],
            ['data' => 'created_at', 'title' => __('labels.backend.access.product.table.created')],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'ProductosCantidades_' . date('YmdHis');
    }
}
