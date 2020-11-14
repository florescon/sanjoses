@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.access.product.list'))

@section('content')


<div class="card card-accent-info">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('labels.backend.access.product.list') }}
                </h4>
            </div><!--col-->

        </div><!--row-->

        <div class="row mt-4">
            <div class="col">

            <div class="col">
            <h4 class="card-title mb-0">
              <small class="text-muted"><em>Agregar/Restar cantidades de productos</em></small>
            </h4>
            <br>
          <form autocomplete="off" method="POST" action="{{ route('admin.product.producthistory.addstock', 'test') }}">
            @csrf
                <div class="row input-daterange">
                    <div class="col-md-5">
                        <select type="text" name="material" class="form-control" id="material" required>
                        </select>
                    </div>&nbsp;

                    <div class="col-md-3">
                        <input type="number" name="stock_" step="any" id="stock_" class="form-control" placeholder="@lang('labels.backend.access.product.table.quantity')"/>
                    </div>
                      &nbsp;
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-success">@lang('labels.general.add')</button>
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
                            <th>@lang('labels.backend.access.product.table.id')</th>
                            <th>@lang('labels.backend.access.product.table.code')</th>
                            <th>@lang('labels.backend.access.product.table.name')</th>
                            <th>@lang('labels.backend.access.product.table.stock')</th>
                            <th>@lang('labels.backend.access.product.table.price')</th>
                            <th>@lang('labels.backend.access.product.table.last_updated') </th>
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

    $(document).ready(function() {
    $('#material').select2({
      ajax: {
            url: '{{ route('admin.product.productdetails.select') }}',
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
                    results: data.products.map(function (item) {
                        return {
                            id: item.id,
                            text: item.product_detail.name.bold() + ' ' +  item.product_detail_color.name + ' / ' + item.product_detail_size.name + ' $' + item.price + '<br> (Disponible: ' +  item.stock  + ')'
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
        placeholder: '@lang('labels.backend.access.order.product')',
        width: 'resolve',
        minimumInputLength: 1,
        allowClear: true,
        escapeMarkup: function(m) { return m; },
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
        order: ['5', 'desc'], 
        ajax: {
          url: "{{ route('admin.product.productlist.index') }}",
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
            {data: 'code', name: 'code', printable: false, visible: false},
            {data: 'product_detail', name: 'product_detail.name'},
            {data: 'stock', name: 'stock'},
            {data: 'price', name: 'price', render: $.fn.dataTable.render.number( ',', '.', 2, '$' )},
            {data: 'updated_at', name: 'updated_at'},
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
