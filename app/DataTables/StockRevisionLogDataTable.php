<?php

namespace App\DataTables;

use App\StockRevisionLog;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Html\Editor\Editor;
use Carbon;

class StockRevisionLogDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {

        $query = $query->with('product_detail.product_detail');


        $end_date = new Carbon(request('end_date'));

        if(request('start_date') && request('end_date')){
            $query->whereBetween('updated_at', [request('start_date'), $end_date->endOfDay()]);
            // $data->whereBetween('updated_at', array(request('from_date'), request('end_date')))
            // ->get();
        }


        // $query = $query->with('product_detail.product_detail')->groupBy('product_id')->selectRaw('*, sum(quantity) as sum');

        return datatables()
            ->eloquent($query)
            ->setRowClass(function ($stock) {
                return $stock->sale_id ? 'alert-info' : '';
            })
            ->editColumn('sale_id', function ($dat) {
                return  $dat->sale_id ? '<em>#'. $dat->sale_id .'</em>' : '--';
            })
            ->editColumn('type', function ($dat) {
                return $dat->type == 1 ? '<code class="text-primary"><a> Entrada </a></code>' : '<code class="text-danger"><a> Salida </a></code>';
            })
            ->addColumn('product_detail', function (StockRevisionLog $product) {
                    return !empty($product->product_id) ? '<a><strong>'. $product->product_detail->product_detail->name.' </a> </strong>'. $product->product_detail->product_detail_color->name. ' / '.$product->product_detail->product_detail_size->name   : '<span class="badge badge-pill badge-secondary"> <em>No asignado</em></span>';
            })
            ->addColumn('action', 'stockrevision.action')
            ->rawColumns(['sale_id', 'type', 'product_detail', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\StockRevisionLog $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(StockRevisionLog $model)
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
                    ->setTableId('stockrevisionlog-table')
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
            ['data' => 'created_at', 'title' => __('labels.backend.access.revision.table.created')],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Almacen_Intermedio_Registros_' . date('YmdHis');
    }
}
