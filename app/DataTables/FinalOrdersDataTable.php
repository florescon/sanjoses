<?php

namespace App\DataTables;

use App\FinalOrder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Html\Editor\Editor;
use Carbon;

class FinalOrdersDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {

        $query = $query->with('finalorder_user', 'finalorder_payment', 'finalorder_generated_by')->where('type', 2)->orderBy('created_at', 'desc');

        $end_date = new Carbon(request('end_date'));
        if(request('start_date') && request('end_date')){
            $query->whereBetween('created_at', [request('start_date'), $end_date->endOfDay()]);
            // $query->whereBetween('updated_at', array(request('from_date'), request('end_date')))
            // ->get();
        }

            return datatables()
                ->eloquent($query)
                ->addIndexColumn()
                ->editColumn('folio', function ($dat) {
                    return '<em>#'. $dat->id .'</em>';
                })
                ->addColumn('user', function (FinalOrder $order) {
                        return !empty($order->user_id) ? $order->finalorder_user->name  : '<span class="badge badge-pill badge-secondary"> <em>No asignado</em></span>';
                })
                ->addColumn('generated_by', function (FinalOrder $order) {
                        return !empty($order->audi_id) ? $order->finalorder_generated_by->name  : '<span class="badge badge-pill badge-secondary"> <em>No definido</em></span>';

                })
                ->editColumn('comment', function ($dat) {
                    return $dat->comment ? '<code class="text-primary"><a data-toggle="tooltip" data-placement="top" title="'.$dat->comment.'">'.substr($dat->comment, 0, 30).'</a></code>' : '<span class="badge badge-pill badge-secondary"> <em>No definido</em></span>';
                })
                ->editColumn('created_at', function ($dat) {
                    return $dat->created_at ? with(new Carbon($dat->created_at))->format('d-m-Y H:i:s') : '';
                })
                ->editColumn('updated_at', function ($dat) {
                    return $dat->updated_at ? with(new Carbon($dat->updated_at))->format('d-m-Y H:i:s') : '';
                })
                ->addColumn('action', function($row){

                    $btn = '<div class="btn-group" role="group" aria-label="'. __('labels.backend.access.users.user_actions') .'">


                            <a href="'. route('admin.finalorder.generate', $row->id) .'" data-toggle="tooltip" data-placement="top" title="'. __('buttons.general.crud.print') .'" class="btn btn-outline-info" target="_blank"><i class="fas fa-print"></i></a>

                                <a href="'.route('admin.finalorder.destroy', $row->id).'" class="btn btn-delete btn-danger" title="" data-trans-button-confirm="'. __('buttons.general.crud.delete').'"  data-trans-button-cancel="'.__('buttons.general.cancel').'" data-trans-text="'.__('strings.backend.general.revert_this').'" data-trans-title="'.__('strings.backend.general.are_you_sure_delete').'" data-trans-success="'.__('strings.backend.general.success').'" data-trans-deleted="'.__('strings.backend.general.deleted').'" data-trans-wrong="'.__('strings.backend.general.wrong').'"><i class="fas fa-trash"></i>
                                </a>
                            ';
                            return $btn;
                })
                ->rawColumns(['folio', 'user', 'generated_by', 'comment', 'action']);

    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\FinalOrder $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(FinalOrder $model)
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
                    ->setTableId('finalorders-table')
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
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
            Column::make('id'),
            Column::make('add your columns'),
            Column::make('created_at'),
            Column::make('updated_at'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'FinalOrders_' . date('YmdHis');
    }
}
