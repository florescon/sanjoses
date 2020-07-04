@extends('backend.layouts.app')

@push('after-styles')
  <style type="text/css">
    .blinking{
      animation:blinkingText 3.2s infinite;
    }
    @keyframes blinkingText{
        0%{     color: #000;    }
        49%{    color: #000; }
        80%{    color: transparent; }
        99%{    color:#000;  }
        100%{   color: #000;    }
    }

  </style>
@endpush

@section('content')

<div class="row">
  <div class="col-sm-12 col-xl-8">
    <div>
      <div class="card">
        <div class="card-body p-0 d-flex align-items-center">
          <i class="fa fa-users-cog bg-success p-4 px-5 font-3xl mr-3"></i>
          <div>
            <div class="text-value-sm text-success"> {{ $status_url->name }} </div>
            <div class="text-muted text-uppercase font-weight-bold small">Agregar personal</div>
          </div>
        </div>
      </div>
    </div>

    <div class="card">
      @if($sale->material_product_sale->count() && $sale->latestStatus()->level >= 0)

      <div class="card-header">
        Folio @lang('labels.backend.access.order.sale'):  <strong>#{{ $sale->id }}</strong> 
        <i class="fa fa-cog fa-spin fa-fw"></i>

        <div class="float-right">
          <a href="{{ route('admin.order.show', $sale->id) }}" data-toggle="tooltip" data-placement="top" title="{{ __('labels.backend.access.sell.back_order') }}" class="btn btn-outline-light text-info btn-sm"> <i class="fas fa-long-arrow-alt-left"></i> @lang('labels.general.back')  </a>
        </div>

        {{-- <div class="float-right">
            <a href="{{ route('admin.inventory.sell.generate', $sale->id) }}" data-toggle="tooltip" data-placement="top" title="{{ __('labels.backend.access.sell.print') }}" class="btn btn-info ml-1 btn-sm" target="_blank"> <i class="fa fa-print"></i> @lang('labels.backend.access.sell.print') </a>
        </div> --}}

        <div class="float-right">
          <a href="#" data-toggle="modal" data-myid="{{ $sale->id }}" data-mystatus="{{ $status_url->id }}" title="{{ __('labels.general.assign_staff') }}" class="btn btn-success ml-1 btn-sm" data-target="#addStaff" > <i class="fa fa-user"></i> @lang('labels.general.assign_staff') </a>
        </div>
      </div>
      @endif
      <div class="card-body">
        <div class="table-responsive-sm">
          @if($sale->material_product_sale->count() && $sale->latestStatus()->level >= 0)
          <table class="table table-striped">
            <thead class="thead-dark">
              <tr>
                <th>Producto</th>
                <th class="right">@lang('labels.backend.access.sell.table.quantity')</th>
                <th class="right">@lang('labels.backend.access.sell.table.price')</th>
                <th class="right">@lang('labels.backend.access.sell.table.total_sale')</th>
              </th>
            </tr>
          </thead>
          <tbody>
            @php($totalmat=0)
            @foreach($sale->products as $material)
            <tr>
              <td class="left"><strong><a href="{{ route('admin.product.product.show', $material->product_detail->product_detail->id) }}"> {{ $material->product_detail->product_detail->name }} </a> </strong>{{ ' Color:'.$material->product_detail->product_detail_color->name. ' Talla:'.$material->product_detail->product_detail_size->name }}</td>
              <td class="right" align="center">
                <em>
                  {{ $material->quantity}}
                </em>
              </td>
              <td class="right">P.U: <strong>${{ $material->product_detail->price }}</strong></td>
              <td class="right"><strong>${{ $material->quantity*$material->product_detail->price }}</td>
            </tr>
            @php($totalmat += $material->quantity*$material->product_detail->price)
            @endforeach
            <tr>
              <td class="left"></td>
              <td class="right"></td>
              <td class="right"><strong>Total:</strong></td>
              <td class="right"><strong>${{ $totalmat }}</strong></td>
            </tr>
            {{-- @foreach($sale->product_sale_staff as $prod)
            <tr class="table-secondary">
              <td class="right" >{{ $prod->product_stock->product_detail->name  }}</td>
              <td class="right" align="center">{{ $prod->sum }}</td>
              <td class="right"><strong></strong></td>
              <td class="right"><strong>$</strong></td>
            </tr>
            @endforeach --}}

          </tbody>
          </table>
          @endif
        </div>

        @if($staff_by_product->product_sale_staff->count())
        <div class="row">
          <div class="col-lg-12">
            <div class="card border border-primary">
              <div class="card-header">
                <i class="fa fa-align-justify"></i> <span class="blinking">Productos asignados</span></div>
              <div class="card-body">
                <table class="table table-responsive-sm table-sm">
                  <thead>
                    <tr>
                      <th>Producto</th>
                      <th>Cantidad</th>
                      <th><i class="fa fa-check-double"></i></th>
                      <th>Usuario</th>
                      <th>Folio</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($staff_by_product->product_sale_staff as $product)
                    <tr>
                      <td><strong>{{ $product->product_stock->product_detail->name }}</strong>{{ ' Color:'.$product->product_stock->product_detail_color->name. ' Talla:'.$product->product_stock->product_detail_size->name }}</td>
                      <td align="center">{{ $product->quantity }}</td>
                      <td align="center">{{ $product->ready_quantity }}</td>
                      <td>{{ $product->staff->name }}</td>
                      <td>
                        <a href="{{ route('admin.inventory.sell.generateproductbystaff', [$sale->id, $product->user_id, $product->folio, $status_url->id]) }}" data-toggle="tooltip" data-placement="top" title="{{ __('labels.backend.access.sell.print') }}" class="btn btn-info ml-1 btn-sm" target="_blank"># {{ $product->folio }}</a>
                      </td>
                      <th>
                        <a href="#" data-toggle="modal" data-placement="top" title="{{ __('buttons.general.crud.edit') }}" class="btn btn-primary btn-sm" data-id="{{ $product->id }}" data-myquantity="{{ $product->quantity }}" data-target="#editConsumption"><i class="fa fa-check-double"></i></a>
                      </th>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- /.col-->
        </div>
        <!-- /.row-->
        @endif

      </div>
    </div>
  </div>



  @if($sale->latestStatus())
  <div class="col-sm-12 col-xl-4">
      <div class="card border-light">
      {{-- <hr> --}}
          @php($timelineValue = $sale->latestStatus())
          <div class="container py-2">
              <h3 class="font-weight-light text-center text-muted py-3">Estatus de la orden</h3>
              <!-- timeline item 2 -->
              @foreach($statuses->sortBy('level') as $status => $stat)
                <div class="row">
                    <div class="col-auto text-center flex-column d-none d-sm-flex">
                        <div class="row h-50">
                            @if($stat->level != -1) <div class="col border-right">&nbsp;</div> @endif
                            <div class="col">&nbsp;</div>
                        </div>
                        <h5 class="m-2">
                            <span class="badge badge-pill {{ $timelineValue->id == $stat->id ? 'bg-success' : 'bg-light border' }}">&nbsp;</span>
                        </h5>
                        <div class="row h-50">
                            @if($stat->level != 10)<div class="col border-right">&nbsp;</div>@endif
                            <div class="col">&nbsp;</div>
                        </div>
                    </div>
                    <div class="col py-2">
                        <div class="card {{ $timelineValue->id == $stat->id ? 'border-success' : '' }} shadow">
                            <div class="card-body">
                                <div class="float-right {{ $timelineValue->id == $stat->id ? 'text-dark' : 'text-muted' }}"> {{ $timelineValue->id == $stat->id ? $timelineValue->pivot->created_at : '' }} </div>
                                <h4 class="card-title {{ $timelineValue->id == $stat->id ? 'text-success' : 'text-muted' }}">  {{ $stat->name }} </h4>
                                <p class="card-text"> {{  $stat->description }} </p>
                                <p class="card-text"> @if($stat->to_add_users) <h5><a href="{{ route('admin.order.addtostaff', [$sale->id , $stat->id]) }}"> <span class="badge badge-success">{{ __('labels.general.assign_staff') }}</span></a></h5> @endif </p>
                                @if($timelineValue->id == $stat->id)
                                <button class="btn btn-sm btn-outline-dark" type="button" data-target="#t2_details" data-toggle="collapse">{!! $timelineValue->id == $stat->id ? '<i class="fa fa-cog fa-spin fa-fw"></i>' : '' !!} @lang('labels.backend.access.order.history_status') ▼</button> 

                                <br>
                                <br>
                                <div class="collapse border" id="t2_details">
                                    <div class="p-2 text-monospace">
                                      @foreach($sale->status as $all_status)
                                        <div>{!! '<strong>'. $all_status->name.'</strong> | '.$all_status->pivot->created_at !!}</div>
                                      @endforeach
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
              @endforeach
              <!--/row-->
          </div>
        {{-- <hr> --}}
      </div>
  </div>
  @endif

</div>


<!-- Modal staff -->
<div class="modal fade" id="addStaff" tabindex="-1" role="dialog" aria-labelledby="addStaffLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addStaffLabel">@lang('labels.general.assign_staff') 
          | <span class="badge badge-success"> {{ $status_url->name }} </span>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


    <form autocomplete="off" method="POST" action="{{ route('admin.order.orderstaff') }}">
       {{ csrf_field() }}
        <div class="modal-body">

        <div>
         <select type="text" name="user" class="form-control" id="user" style="width:100%;" required>
         </select>
        </div>

        <div class="float-right text-success">
          <span class="help-block"><strong>@lang('labels.general.select_staff')</strong></span>
        </div>
        <br>
        <br>

          <table class="table table-responsive-sm table-sm">
            <thead>
              <tr>
                <th>Producto</th>
                <th>Disponible</th>
                <th>Precio</th>
                <th>Total</th>
                <th>Cantidad</th>
              </tr>
            </thead>
            <tbody>

          <div class="checkbox d-flex align-items-center float-right">
              <label>&nbsp; <strong class="text-success">Asignar todas las cantidades de la orden al usuario seleccionado</strong> </label>&nbsp;
              <label class="switch switch-label switch-pill switch-primary switch-sm">
                <input class="switch-input" type="checkbox" value="1" name="all_quantities">
                <span class="switch-slider" data-checked="&#x2713;" data-unchecked="&#x2715;"></span>
              </label>
          </div>

              @foreach($sale->products as $material)
              <input type="hidden" name="id" id="id" value="">
              <input type="hidden" name="status" id="status" value="">
              <input type="hidden" name="material[]" id="material" value="{{ $material->product_id }}">
              <tr>
                <td class="left"><strong><a href="{{ route('admin.product.product.show', $material->product_detail->product_detail->id) }}">  {{ $material->product_id.' | '. $material->product_detail->product_detail->name }} </a> </strong>{{ ' Color:'.$material->product_detail->product_detail_color->name. ' Talla:'.$material->product_detail->product_detail_size->name }}</td>
                    <td class="right" align="center">
                      <em>
                        {{ $material->quantity}}
                      </em>
                    </td>
                    <td class="right">P.U: <strong>${{ $material->product_detail->price }}</strong></td>
                    <td class="right"><strong>${{ $material->quantity*$material->product_detail->price }}</td>
                <td>
                  <input class="form-control" id="quantity" type="number" step="any" min="0" max="{{ $material->quantity}}" name="quantity[]">
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <div>
            <label for="note" class="col-form-label"><strong>Nota: </strong><em>El valor de la cantidad por defecto es 0, sólo agregue valores positivos</em></label>
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



<div class="modal fade" id="editConsumption" tabindex="-1" role="dialog" aria-labelledby="createTagLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createTagLabel">@lang('labels.backend.access.product.ready_product')</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

    <form autocomplete="off" method="POST" action="{{ route('admin.order.readyproduct', 'test') }}">
        {{method_field('patch')}}
        {{ csrf_field() }}
      <div class="modal-body">
          <div class="form-group">

            <label for="quantity" class="col-form-label">@lang('labels.backend.access.material.table.quantity'):</label>
            <input type="hidden" name="id" id="id" value="">
            <input type="number" class="form-control" value="" name="ready_quantity" id="quantity" required>
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

<script>
    $('#editConsumption').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var quantity = button.data('myquantity')
      var id = button.data('id')
      var modal = $(this)

      modal.find('.modal-body #quantity').val(quantity)
      modal.find('.modal-body #id').val(id)
    });
</script>

<script>

    $('#addStaff').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var id = button.data('myid')
      var status = button.data('mystatus')
      var modal = $(this)

      modal.find('.modal-body #id').val(id)
      modal.find('.modal-body #status').val(status)
    });

  $(document).ready(function() {
      $('#status').select2({
        ajax: {
              url: '{{ route('admin.setting.status.select') }}',
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
          placeholder: '@lang('labels.backend.access.order.status')',
          width: 'resolve'
        });
  });


$(document).ready(function() {
    $('#user').select2({
      ajax: {
            url: '{{ route('admin.user.selectdiferentcustomer') }}',
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
                            text: item.first_name + ' ' + item.last_name
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
        placeholder: '@lang('labels.general.assign_staff')',
        width: 'resolve'
      });
});


//plugin bootstrap minus and plus
//http://jsfiddle.net/laelitenetwork/puJ6G/
$('.btn-number').click(function(e){
    e.preventDefault();
    
    fieldName = $(this).attr('data-field');
    type      = $(this).attr('data-type');
    var input = $("input[name='"+fieldName+"']");
    var currentVal = parseInt(input.val());
    if (!isNaN(currentVal)) {
        if(type == 'minus') {
            
                input.val(currentVal - 1).change();

        } else if(type == 'plus') {

                input.val(currentVal + 1).change();

        }
    } else {
        input.val(0);
    }
});

</script>


@endpush
