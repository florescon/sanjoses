@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.access.material.historyout_management'))

@section('content')



<div class="card card-accent-warning">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('labels.backend.access.material.historyout_management') }}
                </h4>
            </div><!--col-->

            <div class="col-sm-7">
		        <div class="btn-toolbar float-right" role="toolbar" aria-label="@lang('labels.general.toolbar_btn_groups')">
		            <a href="#" data-toggle="modal" class="btn btn-success ml-1" title="@lang('labels.general.create_new')" data-target="#newMaterial"><i class="fas fa-plus-circle"></i></a>
		        </div><!--btn-toolbar-->
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">

            <div class="col">
            <h4 class="card-title mb-0">
              <small class="text-muted"><em>Restar materia prima</em></small>
            </h4>
            <br>
			    <form autocomplete="off" method="POST" action="{{ route('admin.material.substractstock', 'test') }}">
       			@csrf
        		    <div class="row input-daterange">
		                <div class="col-md-3">
		                    <select type="text" name="material" class="form-control" id="material" required>
		                    </select>
		                </div>&nbsp;

		                <div class="col-md-2">
		                    <input type="number" min="0" name="stock_" step="any" id="stock_" class="form-control border border-danger" placeholder="@lang('labels.backend.access.material.table.quantity')"/>
		                </div>&nbsp;
		                <div class="col-md-1">
		                    <button ype="submit" class="btn btn-danger">@lang('labels.general.substract')</button>
		                </div>
                    <div class="col-md-1">
                        <button type="button" name="refresh" id="refresh" class="btn btn-default">@lang('labels.general.clear')</button>
                    </div>

		            </div>
	            </form>
            <br>
            <div class="row input-daterange">
                <div class="col-md-3">
                    <input type="text" name="start-date" id="start-date" class="datepicker form-control" placeholder="@lang('labels.general.from')" readonly/>
                </div>&nbsp;

                <div class="col-md-3">
                    <input type="text" name="end-date" id="end-date" class="datepicker form-control" placeholder="@lang('labels.general.to')" readonly/>
                </div>
                  &nbsp;
                <div class="col-md-3">
                    <button name="btn-filter" id="btn-filter" class="btn btn-primary">@lang('labels.general.filter')</button>
                    <button type="button" name="refresh_" id="refresh_" class="btn btn-default">@lang('labels.general.clear_filter')</button>
                </div>
            </div>
            <br>
                <div class="table-responsive">
                    <table class="table table-responsive-sm table-sm data-table">
                        <thead>
                        <tr>
                            {{-- <th></th> --}}
                            <th>@lang('labels.backend.access.material.table.id')</th>
                            <th>@lang('labels.backend.access.material.table.part_number')</th>
                            <th>@lang('labels.backend.access.material.material')</th>
                            <th>@lang('labels.backend.access.material.table.previous_stock')</th>
  	                        <th>@lang('labels.backend.access.material.table.operation')</th>
                            <th>@lang('labels.backend.access.material.table.stock')</th>
                            <th>@lang('labels.backend.access.material.table.created') </th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->


<!-- Modal -->
<div class="modal fade" id="newMaterial" tabindex="-1" role="dialog" aria-labelledby="newMaterialLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newMaterialLabel">@lang('labels.backend.access.material.create')</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

    <form autocomplete="off" method="POST" action="{{ route('admin.material.store') }}">
       @csrf
      <div class="modal-body">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="part_number" class="col-form-label">@lang('labels.backend.access.material.table.part_number'):</label>
            <input type="text" class="form-control" name="part_number" id="part_number" required>
          </div>

          <div class="form-group col-md-6">
            <label for="name" class="col-form-label">@lang('labels.backend.access.material.table.name'):</label>
            <input type="text" class="form-control" name="name" id="name" required>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group  col-md-6">
            <label for="description" class="col-form-label">@lang('labels.backend.access.material.table.description'):</label>
            <input type="text" class="form-control" name="description" id="description" required>
          </div>

          <div class="form-group col-md-6">
            <label for="acquisition_cost" class="col-form-label">@lang('labels.backend.access.material.table.acquisition_cost'):</label>
            <input type="number" step="any" class="form-control" name="acquisition_cost" id="acquisition_cost" required>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="price" class="col-form-label">@lang('labels.backend.access.material.table.price'):</label>
            <input type="number" step="any" class="form-control" name="price" id="price" required>
          </div>

          <div class="form-group col-md-6">
            <label for="stock" class="col-form-label">@lang('labels.backend.access.material.table.stock'):</label>
            <input type="number" step="any" class="form-control" name="stock" id="stock" required>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="unit" class="col-form-label">Unidad de medida:</label>
            <select type="text" style="width: 100% !important;" name="unit" class="form-control" id="unit">
            </select>
          </div>
          <div class="form-group col-md-6">
            <label for="color" class="col-form-label">Color:</label>
            <select type="text" style="width: 100% !important;" name="color" class="form-control" id="color">
            </select>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="size" class="col-form-label">Talla:</label>
            <select type="text" style="width: 100% !important;" name="size" class="form-control" id="size">
            </select>
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('labels.general.buttons.close')</button>
        <button type="submit" class="btn btn-primary">@lang('labels.general.buttons.save')</button>
      </div>
    </form>

    </div>
  </div>
</div>

@endsection


@push('after-scripts')

<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
  
    $(document).ready(function() {
      $('.datepicker').datepicker({
          language: 'es',
          dateFormat: 'dd-mm-yy',
          autoclose: true,
          todayHighlight: true,
          dateFormat:'dd-mm-yy',
      });
  });

    $.datepicker.regional['es'] = {
      closeText: 'Cerrar',
      prevText: '&#x3C;Ant',
      nextText: 'Sig&#x3E;',
      currentText: 'Hoy',
      monthNames: ['enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto',
        'septiembre', 'octubre', 'noviembre', 'diciembre'
      ],
      monthNamesShort: ['ene', 'feb', 'mar', 'abr', 'may', 'jun', 'jul', 'ago', 'sep', 'oct', 'nov', 'dic'],
      dayNames: ['domingo', 'lunes', 'martes', 'miércoles', 'jueves', 'viernes', 'sábado'],
      dayNamesShort: ['dom', 'lun', 'mar', 'mié', 'jue', 'vie', 'sáb'],
      dayNamesMin: ['D', 'L', 'M', 'X', 'J', 'V', 'S'],
      weekHeader: 'Sm',
      dateFormat: 'dd/mm/yy',
      firstDay: 1,
      isRTL: false,
      showMonthAfterYear: false,
      yearSuffix: ''
    };

    $.datepicker.setDefaults($.datepicker.regional['es']);

</script>


<script>
    $(document).ready(function() {
    $('#material').select2({
      ajax: {
            url: '{{ route('admin.product.materialdetails.select') }}',
            data: function (params) {
                return {
                    search: params.term,
                    page: params.page || 1
                };
            },
            dataType: 'json',
            processResults: function (data) {
                data.page = data.page || 1;
                return {
                    results: data.items.map(function (item) {

                        return {
                            id: item.id,
                            name: item.name,
                            text:  item.part_number.bold() + ' ' +item.name + ' ' + item.unit.name.sup().fontcolor('#20a8d8') + (item.color_id  ?  '<br> Color: ' + item.color.name.fixed()  : '')  + (item.size_id  ?  '<br> Talla: ' + item.size.name.fixed()  : '')
                        };
                    }),
                    pagination: {
                        more: data.pagination
                    }
                }
            },
            cache: true,
            delay: 250
        },

        placeholder: '@lang('labels.backend.access.material.raw_material')',
        width: 'resolve',
        escapeMarkup: function(m) { return m; },

      });
});
</script>


<script>

$(document).ready(function() {
  $('#unit').select2({
    placeholder: 'seleccione unidad',
    width: 'resolve',
    theme: 'classic',
    allowClear: true,
    ajax: {
          url: '{{ route('admin.product.unit.select') }}',
          data: function (params) {
              return {
                  search: params.term,
                  page: params.page || 1
              };
          },
          dataType: 'json',
          processResults: function (data) {
              data.page = data.page || 1;
              return {
                  results: data.items.map(function (item) {
                      return {
                          id: item.id,
                          text: item.name
                      };
                  }),
                  pagination: {
                      more: data.pagination
                  }
              }
          },
          cache: true,
          delay: 250
      }
    });
});

$(document).ready(function() {
  $('#color').select2({
    placeholder: 'seleccione color',
    width: 'resolve',
    theme: 'classic',
    allowClear: true,
    ajax: {
          url: '{{ route('admin.product.color.select') }}',
          data: function (params) {
              return {
                  search: params.term,
                  page: params.page || 1
              };
          },
          dataType: 'json',
          processResults: function (data) {
              data.page = data.page || 1;
              return {
                  results: data.items.map(function (item) {
                      return {
                          id: item.id,
                          text: item.name
                      };
                  }),
                  pagination: {
                      more: data.pagination
                  }
              }
          },
          cache: true,
          delay: 250
      }
    });
});


$(document).ready(function() {
  $('#size').select2({
    placeholder: 'seleccione talla',
    width: 'resolve',
    theme: 'classic',
    allowClear: true,
    ajax: {
          url: '{{ route('admin.product.size.select') }}',
          data: function (params) {
              return {
                  search: params.term,
                  page: params.page || 1
              };
          },
          dataType: 'json',
          processResults: function (data) {
              data.page = data.page || 1;
              return {
                  results: data.items.map(function (item) {
                      return {
                          id: item.id,
                          text: item.name
                      };
                  }),
                  pagination: {
                      more: data.pagination
                  }
              }
          },
          cache: true,
          delay: 250
      }
    });
});

</script>

<script>
  

    $(function () {
      let table = $('.data-table').DataTable({
        dom: 'lBfrtip',
        buttons: [
          {
              extend: 'export',
              text: '<i class="fa fa-download"></i>&nbsp;Exportar&nbsp;<i class="fa fa-caret-down"></i>',
              messageTop: 'Exportar',
          },
          {
              extend: 'print',
              text: 'Imprimir&nbsp;<i class="fa fa-print"></i>',
              messageTop: 'Imprimir',
          },
          {
              extend: 'reset',
              text: 'Recargar&nbsp;<i class="fa fa-undo"></i>',

          },
        ],
        // select: true,
        responsive: true,
        processing: true,
        serverSide: true,
        autoWidth: false,
        order: ['6', 'desc'], 
        ajax: {
          url: "{{ route('admin.materialhistoryout.index') }}",
          method: 'get',
          data: function (d) {
            d.start_date = $('#start-date').val(); // Pass along start date and end date here
            d.end_date = $('#end-date').val();
          }
        },
        language: {
          "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
        },
        columnDefs: [
            {
                "targets": [ 0 ],
                "visible": false,
                "searchable": false
            }        
        ],
        search: {
        caseInsensitive: false,
        },
        columns: [
           // {
           //      data: null,
           //      defaultContent: '',
           //      className: 'select-checkbox',
           //      title: '',
           //      orderable: false,
           //      searchable: false
           //  },
            {data: 'id', name: 'id', printable: false, visible: false},
            {data: 'part', name: 'material.part_number', printable: false, visible: false},
            {data: 'material', name: 'material.name'},
            {data: 'old_quantity', name: 'old_quantity'},
            {data: 'quantity', name: 'quantity'},
            {data: 'actual', name: 'actual'},
            // {data: 'show', name: 'audi', class: 'text-center'},
            {data: 'created_at', name: 'created_at'},
            // {data: 'show', name: 'show', printable: false, orderable: false, searchable: false},
            // {data: 'action', name: 'action', printable: false, orderable: false, searchable: false},
        ]
      });

      $("#btn-filter").click(function(){
            table.draw(); // Update data table upon filter button clicked
      });

      $("#refresh_").click(function(){
        $('#start-date').val('');
        $('#end-date').val('');
            table.draw(); // Update data table upon filter button clicked
      });



      $("#refresh").click(function(){
        $('#material').val('').trigger('change');
        $('#stock_').val('');
            table.draw(); // Update data table upon filter button clicked
      });

    });
</script>

{!! $dataTable->scripts() !!}

@endpush
