<?php

namespace App\DataTables;

use App\MaterialHistory;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Html\Editor\Editor;
use Carbon;

class MaterialHistoryDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {

        $query = $query->with('material', 'generated_by')->where('type', 1);

        $end_date = new Carbon(request('end_date'));

        if(request('start_date') && request('end_date')){
            $query->whereBetween('updated_at', [request('start_date'), $end_date->endOfDay()]);
            // $data->whereBetween('updated_at', array(request('from_date'), request('end_date')))
            // ->get();
        }

        return datatables()
            ->eloquent($query)
            ->addColumn('part', function (MaterialHistory $part) {
                    return !empty($part->material_id) ? '<em>'. $part->material->part_number. '</em>'  : '';
            })
            ->addColumn('material', function (MaterialHistory $material) {
                    
                    $btn = !empty($material->material_id) ? $material->material->full_name  : '<span class="badge badge-pill badge-secondary"> <em>No asignada</em></span>';

                    $btnn = $btn . ' '.($material->material->trashed() ? '<span class="badge badge-pill badge-danger"> <em>Eliminado</em></span>' : '');

                    return $btnn;
            })
            ->editColumn('date_entered', function ($dat) {
                return !empty($dat->date_entered) ? $dat->date_entered : '';
            })
            ->editColumn('quantity', function ($dat) {
                return $dat->quantity ? '<strong>'.$dat->quantity.'</strong>' : '';
            })
            ->addColumn('actual', function (MaterialHistory $material) {
                    return $material->old_quantity + $material->quantity;
            })
            ->addColumn('audi', function (MaterialHistory $material) {
                    return !empty($material->audi_id) ? $material->generated_by->name  : '<span class="badge badge-pill badge-secondary"> <em>No asignado</em></span>';
            })
            ->addColumn('show', function($row){
                $btn = '
                        <a href="'. route('admin.materialhistory.show', $row->id) .'" data-toggle="tooltip" data-placement="top" title="'. __('buttons.general.crud.view') .'" class="btn btn-info" target="_blank"><i class="fas fa-eye"></i></a>
                        ';
                        return $btn;
            })
            ->editColumn('created_at', function ($dat) {
                return $dat->created_at ? with(new Carbon($dat->created_at))->format('d-m-Y H:i:s') : '';
            })
            ->addColumn('action', function ($row) {
 
                           $btn = '
                           ';

                           return $btn;
            })
            ->rawColumns(['action', 'part', 'material', 'date_entered', 'actual', 'quantity', 'show']);
     }

    /**
     * Get query source of dataTable.
     *
     * @param \App\MaterialHistory $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(MaterialHistory $model)
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
            ['data' => 'part', 'title' => __('labels.backend.access.material.table.part_number')],
            ['data' => 'material', 'title' => __('labels.backend.access.material.material'), 'class' =>'text-center'],
            ['data' => 'old_quantity', 'title' => __('labels.backend.access.material.table.previous_stock')],
            ['data' => 'quantity', 'title' => __('labels.backend.access.material.table.operation')],
            ['data' => 'actual', 'title' => __('labels.backend.access.material.table.outcome')],
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
        return 'MaterialHistorial_' . date('YmdHis');
    }
}
