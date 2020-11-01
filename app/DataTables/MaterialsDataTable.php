<?php

namespace App\DataTables;

use App\Material;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Html\Editor\Editor;
use Carbon;

class MaterialsDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */

    protected $printPreview = 'datatable.material';

    public function dataTable($query)
    {


        $query = $query->with('unit', 'color', 'size');

        $end_date = new Carbon(request('end_date'));

        if(request('start_date') && request('end_date')){
            $query->whereBetween('updated_at', [request('start_date'), $end_date->endOfDay()]);
            // $data->whereBetween('updated_at', array(request('from_date'), request('end_date')))
            // ->get();
        }

        return datatables()
            ->eloquent($query)
            ->editColumn('part_number', function ($dat) {
                return '<em>'. $dat->part_number .'</em>';
            })
            ->editColumn('name', function ($dat) {
                return ucwords(strtolower($dat->name)). (!empty($dat->unit_id) ? ' <sup>'. $dat->unit->name .'</sup>'  : '');
            })
            ->editColumn('created_at', function ($dat) {
                return $dat->created_at ? with(new Carbon($dat->created_at))->format('d-m-Y H:i:s') : '';
            })
            ->editColumn('updated_at', function ($dat) {
                return $dat->updated_at ? with(new Carbon($dat->updated_at))->format('d-m-Y H:i:s') : '';
            })
            ->addColumn('unit', function (Material $unit) {
                    return !empty($unit->unit_id) ? $unit->unit->name  : '<span class="badge badge-pill badge-secondary"> <em>No asignada</em></span>';
            })
            ->addColumn('color', function (Material $color) {
                    return !empty($color->color_id) ? $color->color->name : '<span class="badge badge-pill badge-secondary"> <em>No asignado</em></span>';
            })
            ->addColumn('size', function (Material $material) {
                    return !empty($material->size_id) ? $material->size->name : '<span class="badge badge-pill badge-secondary"> <em>No asignada</em></span>';
            })
            ->addColumn('action', function ($row) {
 
                           $btn = '
                            <div class="btn-group" role="group" aria-label="'.__('labels.backend.access.users.user_actions').'">

                               <a href="'. route('admin.material.edit', $row->id).'" data-toggle="tooltip" data-placement="top" title="'. __('buttons.general.crud.edit') .'" class="btn btn-primary">  <i class="fas fa-edit"></i> </a>';
                               $btn = $btn. '
                                <a href="'.route('admin.material.destroy', $row->id).'" class="btn btn-delete btn-danger" title="'.$row->name.'" data-trans-button-confirm="'. __('buttons.general.crud.delete').'"  data-trans-button-cancel="'.__('buttons.general.cancel').'" data-trans-text="'.__('strings.backend.general.revert_this').'" data-trans-title="'.__('strings.backend.general.are_you_sure_delete').'" data-trans-success="'.__('strings.backend.general.success').'" data-trans-deleted="'.__('strings.backend.general.deleted').'" data-trans-wrong="'.__('strings.backend.general.wrong').'"><i class="fas fa-trash"></i>
                                </a>
                            </div>
                           ';

                           return $btn;
            })
            ->rawColumns(['action', 'part_number', 'name', 'description', 'unit', 'color', 'size']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Material $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Material $model)
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
            ['data' => 'part_number', 'title' => __('labels.backend.access.material.table.part_number'), 'class' =>'text-center'],
            ['data' => 'name', 'title' => __('labels.backend.access.material.table.name')],
            ['data' => 'color', 'title' => __('labels.backend.access.material.table.color')],
            ['data' => 'size', 'title' => __('labels.backend.access.material.table.size')],
            ['data' => 'acquisition_cost', 'title' => __('labels.backend.access.material.table.acquisition_cost')],
            ['data' => 'price', 'title' => __('labels.backend.access.material.table.price')],
            ['data' => 'stock', 'title' => __('labels.backend.access.material.table.stock')],
            ['data' => 'unit', 'title' => __('labels.backend.access.material.table.unit')],
            ['data' => 'updated_at', 'title' => __('labels.backend.access.material.table.last_updated')],

        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Materia_prima_' . date('YmdHis');
    }

}
