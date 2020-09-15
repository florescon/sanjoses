<?php

namespace App\DataTables;

use App\Sale;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Html\Editor\Editor;
use Carbon;

class OrdersDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {

        $query = $query->with('user', 'payment', 'products', 'generated_by')->where('type', 2)->orderBy('created_at', 'desc');
        if(request('start_date') && request('end_date')){
            $query->whereBetween('created_at', [request('start_date'), request('end_date')]);
            // $query->whereBetween('updated_at', array(request('from_date'), request('end_date')))
            // ->get();
        }

            return datatables()
                ->eloquent($query)
                ->addIndexColumn()
                ->editColumn('folio', function ($dat) {
                    return '<em>#'. $dat->id .'</em>';
                })
                ->addColumn('user', function (Sale $order) {
                        return !empty($order->user_id) ? $order->user->name  : '<span class="badge badge-pill badge-secondary"> <em>No asignado</em></span>';
                })
                ->addColumn('production', function (Sale $order) {
                        return $order->latestStatus() ? $order->production_label : '';

                })
                ->addColumn('final', function (Sale $order) {
                        return $order->latestStatus() ? $order->final_label : '';

                })
                ->addColumn('generated_by', function (Sale $order) {
                        return !empty($order->audi_id) ? $order->generated_by->name  : '<span class="badge badge-pill badge-secondary"> <em>No definido</em></span>';

                })
                ->editColumn('comment', function ($dat) {
                    return $dat->comment ? '<code class="text-primary"><a data-toggle="tooltip" data-placement="top" title="'.$dat->comment.'">'.substr($dat->comment, 0, 30).'</a></code>' : '<span class="badge badge-pill badge-secondary"> <em>No definido</em></span>';
                })
                ->addColumn('status', function (Sale $order) {
                        return $order->latestStatus() ? ( $order->latestStatus()->id == 2 ? '<div class="col-6 col-sm-4 col-md mb-3 mb-xl-0 text-center"><button class="btn btn-success btn-sm" type="button"><i class="fas fa-arrow-right"></i> '.$order->latestStatus()->name.'</button></div>' : '<div class="col-6 col-sm-4 col-md mb-3 mb-xl-0 text-center"><button class="btn btn-primary btn-sm" type="button"><i class="far fa-lightbulb"></i> '.$order->latestStatus()->name.'</button></div>' ) : '<div class="col-6 col-sm-4 col-md mb-3 mb-xl-0 text-center"><button class="btn btn-secondary btn-sm" type="button"><i class="far fa-sad-cry"></i></i> <em>No definido</em></button></div>';

                })
                ->editColumn('created_at', function ($dat) {
                    return $dat->created_at ? with(new Carbon($dat->created_at))->format('d-m-Y H:i:s') : '';
                })
                ->editColumn('updated_at', function ($dat) {
                    return $dat->updated_at ? with(new Carbon($dat->updated_at))->format('d-m-Y H:i:s') : '';
                })
                ->addColumn('action', function($row){

                    $btn = '<div class="btn-group" role="group" aria-label="'. __('labels.backend.access.users.user_actions') .'">

                            <a href="'. route('admin.order.show', $row->id) .'" data-toggle="tooltip" data-placement="top" title="'. __('buttons.general.crud.view') .'" class="btn btn-info"><i class="fas fa-eye"></i></a>

                            <a href="'. route('admin.order.generate', $row->id) .'" data-toggle="tooltip" data-placement="top" title="'. __('buttons.general.crud.print') .'" class="btn btn-outline-info" target="_blank"><i class="fas fa-print"></i></a>

                                <a href="'.route('admin.order.destroy', $row->id).'" class="btn btn-delete btn-danger" title="" data-trans-button-confirm="'. __('buttons.general.crud.delete').'"  data-trans-button-cancel="'.__('buttons.general.cancel').'" data-trans-text="'.__('strings.backend.general.revert_this').'" data-trans-title="'.__('strings.backend.general.are_you_sure_delete').'" data-trans-success="'.__('strings.backend.general.success').'" data-trans-deleted="'.__('strings.backend.general.deleted').'" data-trans-wrong="'.__('strings.backend.general.wrong').'"><i class="fas fa-trash"></i>
                                </a>
                            ';
                            return $btn;
                })
                ->rawColumns(['folio', 'user', 'generated_by', 'production', 'final', 'comment', 'status', 'action']);

    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Sale $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Sale $model)
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
            ['data' => 'folio', 'title' => __('labels.backend.access.order.table.folio')],
            ['data' => 'user', 'title' => __('labels.backend.access.order.client')],
            ['data' => 'generated_by', 'title' => __('labels.backend.access.order.table.generated_by')],
            ['data' => 'status', 'title' => __('labels.backend.access.order.table.status')],
            ['data' => 'comment', 'title' => __('labels.backend.access.order.table.comment')],
            ['data' => 'created_at', 'title' => __('labels.backend.access.order.table.created')],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Ordenes_' . date('YmdHis');
    }
}
