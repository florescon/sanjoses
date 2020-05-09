@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.access.order.management'))

@push('after-styles')
@endpush

@section('content')

<div class="card card-accent-info">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('labels.backend.access.order.management') }}
                </h4>
            </div><!--col-->

            <div class="col-sm-7">
				<div class="btn-toolbar float-right" role="toolbar" aria-label="@lang('labels.general.toolbar_btn_groups')">
				    <a href="{{ route('admin.order.create') }}" class="btn btn-success ml-1" title="@lang('labels.general.create_new')"><i class="fas fa-plus-circle"></i></a>
				</div><!--btn-toolbar-->

            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
            <h4 class="card-title mb-0">
              <small class="text-muted"><em>@lang('labels.backend.access.order.filter_by_date_created')</em></small>
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
                    <table class="table table-striped data-table" style="width:100%">
                        <thead>
                        <tr>
                            <th>@lang('labels.backend.access.order.table.folio')</th>
                            <th>@lang('labels.backend.access.order.client')</th>
                            <th>@lang('labels.backend.access.order.payment_method')</th>
                            <th>@lang('labels.backend.access.order.table.to_production')</th>
                            <th>@lang('labels.backend.access.order.table.to_final_order')</th>
                            <th>@lang('labels.backend.access.order.table.status')</th>
                            <th>@lang('labels.backend.access.order.table.created')</th>
                            <th>@lang('labels.general.actions') </th>
                        </tr>
                        </thead>
                        <tbody>
{{--                         @foreach($sales as $sale)
                            <tr>
                                <td>#{{ $sale->id }}</td>
                                <td>
                                @if(isset($sale->user_id))
                                  {{ optional($sale->user)->name }}
                                @else
                                  <span class="badge badge-pill badge-secondary"> <em>No definido</em></span>
                                @endif
                                </td>
                                <td>
                                  {{ optional($sale->payment)->name }}
                                </td>
                                <td>{{ $sale->generated_by->name }}</td>
                                <td>{{ $sale->created_at->diffForHumans() }}</td>
                                <td> 

                                <div class="btn-group" role="group" aria-label="{{ __('labels.backend.access.users.user_actions') }}">

                                <a href="{{ route('admin.order.show', $sale->id) }}" data-toggle="tooltip" data-placement="top" title="{{ __('buttons.general.crud.view') }}" class="btn btn-info"><i class="fas fa-eye"></i></a>

                                <a href="{{ route('admin.order.generate', $sale->id) }}" data-toggle="tooltip" data-placement="top" title="{{ __('buttons.general.crud.print') }}" class="btn btn-outline-info" target="_blank"><i class="fas fa-print"></i></a>

                                @role('administrator')
            							        <a href="{{ route('admin.order.destroy', $sale->id) }}" class="btn btn-danger" data-method="delete" title="{{ __('buttons.general.crud.delete') }}" data-trans-button-cancel="{{ __('buttons.general.cancel') }}" data-trans-button-confirm="{{ __('buttons.general.crud.delete') }}" data-trans-title="{{ __('strings.backend.general.are_you_sure') }}">
            									     <i class="fas fa-eraser"></i>
                								  </a>
                                @endrole

                                </div>
                                </td>
                            </tr>
                        @endforeach
 --}}                        </tbody>
                    </table>
                </div>
            </div><!--col-->
        </div><!--row-->
        <div class="row">
            <div class="col-7">
                <div class="float-left">
                    {{-- {!! $sales->total() !!} {{ trans_choice('labels.backend.access.order.table.total', $sales->total()) }} --}}
                </div>
            </div><!--col-->

            <div class="col-5">
                <div class="float-right">
                    {{-- {{ $sales->links() }} --}}
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->

<!-- Modal -->
<div class="modal fade" id="view" tabindex="-1" role="dialog" aria-labelledby="viewLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="viewLabel">@lang('labels.backend.access.order.view')</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

    <form autocomplete="off">
      <div class="modal-body">
        <input type="hidden" name="id" id="id" value="">
          <div class="form-group">
            <label for="name" class="col-form-label">@lang('labels.backend.access.order.user'):</label>
            <input type="text" class="form-control" id="name" readonly required>
          </div>
          <div class="form-group">
            <label for="name" class="col-form-label">@lang('labels.backend.access.order.payment_method'):</label>
            <input type="payment" class="form-control" id="payment" readonly required>
          </div>
          <div class="form-group">
            <label for="audi" class="col-form-label">@lang('labels.backend.access.order.table.generated_by'):</label>
            <input type="text" class="form-control" value="" name="audi" id="audi" readonly required>
          </div>
          <hr>
          <hr>
          {{-- <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Larry</td>
                <td>the Bird</td>
                <td>@twitter</td>
              </tr>
            </tbody>
           </table>  --}}
        </div>     
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('labels.general.buttons.close')</button>
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
        select: true,
        responsive: true,
        processing: true,
        serverSide: true,
        autoWith: false,
        ajax: {
          url: "{{ route('admin.order.index') }}",
          method: 'get',
          data: function (d) {
            d.start_date = $('#start-date').val(); // Pass along start date and end date here
            d.end_date = $('#end-date').val();
          }
        },
        language: {
          "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
        },
        search: {
          caseInsensitive: false,
        },
        order: ['7', 'desc'], 
        columns: [
            {data: 'folio', name: 'id'},
            {data: 'user', name: 'user.first_name', orderable: false},
            {data: 'payment', name: 'payment.name', orderable: false},
            {data: 'production', name: 'production', orderable: false, searchable: false, className: 'text-center'},
            {data: 'final', name: 'final', orderable: false, searchable: false, className: 'text-center'},
            {data: 'status', name: 'status', orderable: false, searchable: false, className: 'text-center'},
            {data: 'created_at', name: 'created_at'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
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


    $('#view').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var name = button.data('myuser')
      var payment = button.data('mypayment')
      var audi = button.data('myaudi')
      var id = button.data('id')
      var modal = $(this)


      modal.find('.modal-body #audi').val(audi)
      modal.find('.modal-body #payment').val(payment)
      modal.find('.modal-body #name').val(name)
      modal.find('.modal-body #id').val(id)
    });
</script>
        

{!! $dataTable->scripts() !!}
@endpush