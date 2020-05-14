@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.access.material.management'))

@section('content')

<div class="card card-accent-info">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('labels.backend.access.material.management') }}
                </h4>
            </div><!--col-->

            <div class="col-sm-7">
        <div class="btn-toolbar float-right" role="toolbar" aria-label="@lang('labels.general.toolbar_btn_groups')">

            <a href="#" data-toggle="modal" class="btn btn-success ml-1" title="@lang('labels.general.create_new')" data-target="#newService"><i class="fas fa-plus-circle"></i></a>
        </div><!--btn-toolbar-->

            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
            <h4 class="card-title mb-0">
              <small class="text-muted"><em>Filtro por fecha de última modificación</em></small>
            </h4>
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
                    <button type="button" name="refresh" id="refresh" class="btn btn-default">@lang('labels.general.clear_filter')</button>
                </div>
            </div>
            <br />
                <div class="table-responsive">
                    <table class="table table-striped data-table">
                        <thead>
                        <tr>
                            {{-- <th></th> --}}
                            <th>@lang('labels.backend.access.material.table.id')</th>
                            <th>@lang('labels.backend.access.material.table.part_number')</th>
                            <th>@lang('labels.backend.access.material.table.name')</th>
                            <th>@lang('labels.backend.access.material.table.color')</th>
                            <th>@lang('labels.backend.access.material.table.size')</th>
                            <th>@lang('labels.backend.access.material.table.acquisition_cost')</th>
  	                        <th>@lang('labels.backend.access.material.table.price')</th>
                            <th>@lang('labels.backend.access.material.table.stock')</th>
                            <th>@lang('labels.backend.access.material.table.last_updated')</th>
                            <th>@lang('labels.general.actions') </th>
                        </tr>
                        </thead>
                        <tbody>
{{--                         @foreach($services as $service)
                            <tr>
                                <td>{{ $service->name }}</td>
                                <td>${{ $service->price }}</td>
                                <td>{{ $service->created_at->diffForHumans() }}</td>
                                <td>{{ $service->updated_at->diffForHumans() }}</td>
                                <td> 
                                <div class="btn-group" role="group" aria-label="_{{ _('labels.backend.access.users.user_actions') }}">

                                    <a href="#" data-toggle="modal" data-placement="top" title="{{ __('buttons.general.crud.edit') }}" class="btn btn-primary" data-id="{{ $service->id }}" data-myname="{{ $service->name }}" data-myprice="{{ $service->price }}" data-target="#editService"><i class="fas fa-edit"></i></a>

                                    <a href="{{ route('admin.inventory.service.destroy', $service->id) }}" class="btn btn-danger" data-method="delete" data-trans-button-cancel="{{ __('buttons.general.cancel') }}" data-trans-button-confirm="{{ __('buttons.general.crud.delete') }}" data-trans-title="{{ __('strings.backend.general.are_you_sure') }}" class="dropdown-item">
                                      <i class="fas fa-eraser"></i>
                                    </a>
                                </div>
                                </td>
                            </tr>
                        @endforeach
 --}}                        </tbody>
                    </table>
                </div>
<br>
<br>

{{-- {!! $dataTable->table() !!} --}}

             </div><!--col-->
        </div><!--row-->
        <div class="row">
            <div class="col-7">
                <div class="float-left">
                    {{-- {!! $services->total() !!} {{ trans_choice('labels.backend.access.service.table.total', $services->total()) }} --}}
                </div>
            </div><!--col-->

            <div class="col-5">
                <div class="float-right">
                    {{-- {{ $services->links() }} --}}
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->


<!-- Modal -->
<div class="modal fade" id="newService" tabindex="-1" role="dialog" aria-labelledby="newServiceLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newServiceLabel">@lang('labels.backend.access.material.create')</h5>
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
            <input type="text" class="form-control" name="description" id="description">
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
            <select type="text" style="width: 100% !important;" name="unit" class="form-control" id="unit" required>
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



<!-- Modal -->
<div class="modal fade" id="editService" tabindex="-1" role="dialog" aria-labelledby="editServiceLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editServiceLabel">@lang('labels.backend.access.material.edit')</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

    <form autocomplete="off" method="POST" action="{{ route('admin.material.update', 'test') }}">
        {{method_field('patch')}}
        @csrf

      <div class="modal-body">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="part_number" class="col-form-label">@lang('labels.backend.access.material.table.part_number'):</label>
            <input type="text" class="form-control" name="part_number" id="part_number" required>
          </div>
          <div class="form-group col-md-6">
            <input type="hidden" name="id" id="id" value="">
            <label for="name" class="col-form-label">@lang('labels.backend.access.material.table.name'):</label>
            <input type="text" class="form-control" name="name" id="name" required>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="description" class="col-form-label">@lang('labels.backend.access.material.table.description'):</label>
            <input type="text" class="form-control" name="description" id="description">
          </div>
          <div class="form-group col-md-6">
            <label for="acquisition_cost" class="col-form-label">@lang('labels.backend.access.material.table.acquisition_cost'):</label>
            <input type="number" step="any" class="form-control" name="acquisition_cost" id="acquisition_cost" required>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="name" class="col-form-label">@lang('labels.backend.access.material.table.price'):</label>
            <input type="number" step="any" class="form-control" name="price" id="price" required>
          </div>
          <div class="form-group col-md-6">
            <label for="stock" class="col-form-label">@lang('labels.backend.access.material.table.stock'):</label>
            <input type="number" step="any" class="form-control" name="stock" id="stock" required>
          </div>
        </div>
        <div class="form-row">
           <div class="form-group col-md-6">
            <label for="unita" class="col-form-label">Unidad de medida:</label>
            <select type="text" style="width: 100% !important;" name="unit_id" class="form-control" id="unita">

            </select>
          </div>
           <div class="form-group col-md-6">
            <label for="colora" class="col-form-label">Color:</label>
            <select type="text" style="width: 100% !important;" name="color_id" class="form-control" id="colora"> 
            
            </select>
          </div>
        </div>
        <div class="form-row">
           <div class="form-group col-md-6">
            <label for="sizea" class="col-form-label">Talla:</label>
            <select type="text" style="width: 100% !important;" name="size_id" class="form-control" id="sizea">

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
          dateFormat:'yy-mm-dd',
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
    $('#editService').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var name = button.data('myname')
      var price = button.data('myprice')
      var part_number = button.data('mypart_number')
      var description = button.data('mydescription')
      var acquisition_cost = button.data('myacquisition_cost')
      var stock = button.data('mystock')
      var unita = button.data('myunit')
      var colora = button.data('mycolor')
      var sizea = button.data('mysize')
      var id = button.data('id')
      var modal = $(this)


      modal.find('.modal-body #name').val(name)
      modal.find('.modal-body #price').val(price)
      modal.find('.modal-body #part_number').val(part_number)
      modal.find('.modal-body #description').val(description)
      modal.find('.modal-body #acquisition_cost').val(acquisition_cost)
      modal.find('.modal-body #stock').val(stock)
      modal.find('.modal-body #unita').val(unita)
      modal.find('.modal-body #colora').val(colora)
      modal.find('.modal-body #sizea').val(sizea)
      modal.find('.modal-body #id').val(id)
    });

    // $(function () {
    //   let table = $('.data-table').DataTable({
    //     dom: 'Bfrtip',
    //     buttons: [
    //       {
    //           extend: 'print',
    //           text: 'Imprimir',
    //           messageTop: 'This print was produced using the Print button for DataTables'

    //       },
    //     ],
    //     select: true,
    //     processing: true,
    //     serverSide: true,
    //     order: ['8', 'desc'], 
    //     ajax: {
    //       url: "{{ route('admin.material.index') }}",
    //       method: 'get',
    //       data: function (d) {
    //         d.start_date = $('#start-date').val(); // Pass along start date and end date here
    //         d.end_date = $('#end-date').val();
    //       }
    //     },
    //     language: {
    //       "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
    //     },
    //     columnDefs: [
    //         {
    //             "targets": [ 0 ],
    //             "visible": false,
    //             "searchable": false
    //         }        
    //     ],
    //     search: {
    //     caseInsensitive: false,
    //     },
    //     columns: [
    //         {data: 'id', name: 'id'},
    //         {data: 'part_number', name: 'part_number'},
    //         {data: 'name', name: 'name'},
    //         {data: 'description', name: 'description'},
    //         {data: 'acquisition_cost', name: 'acquisition_cost', render: $.fn.dataTable.render.number( ',', '.', 2, '$' )},
    //         {data: 'price', name: 'price', render: $.fn.dataTable.render.number( ',', '.', 2, '$' )},
    //         {data: 'stock', name: 'stock'},
    //         {data: 'unit', name: 'unit.name'},
    //         {data: 'updated_at', name: 'updated_at'},
    //         {data: 'action', name: 'action', orderable: false, searchable: false},
    //     ]
    //   });

    //   $("#btn-filter").click(function(){
    //         table.draw(); // Update data table upon filter button clicked
    //   });

    //   $("#refresh").click(function(){
    //     $('#start-date').val('');
    //     $('#end-date').val('');
    //         table.draw(); // Update data table upon filter button clicked
    //   });

    
    // });


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



$(document).ready(function() {
  $('#sizea').select2({
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

$(document).ready(function() {
  $('#unita').select2({
    placeholder: 'seleccione unidad',
    theme: 'classic',
    width: 'resolve',
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
  $('#colora').select2({
    placeholder: 'seleccione color',
    theme: 'classic',
    width: 'resolve',
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
      },

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
              key: {
                  key: 'p',
                  altkey: true
              }
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
        order: ['2', 'asc'], 
        ajax: {
          url: "{{ route('admin.material.index') }}",
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
            {data: 'part_number', name: 'part_number'},
            {data: 'name', name: 'name'},
            {data: 'color', name: 'color.name', orderable: false},
            {data: 'size', name: 'size.name', orderable: false},
            {data: 'acquisition_cost', name: 'acquisition_cost', class: 'text-center'},
            {data: 'price', name: 'price', class: 'text-center'},
            {data: 'stock', name: 'stock', class: 'text-center'},
            {data: 'updated_at', name: 'updated_at'},
            {data: 'action', name: 'action', printable: false, orderable: false, searchable: false},
        ]
      });

      $("#btn-filter").click(function(){
            table.draw(); // Update data table upon filter button clicked
      });

      $("#refresh").click(function(){
        $('#start-date').val('');
        $('#end-date').val('');
            table.draw(); // Update data table upon filter button clicked
      });

    
    });


  $('.data-table').append('<caption style="caption-side: bottom">Materia prima</caption>');

</script>
        

{!! $dataTable->scripts() !!}
@endpush