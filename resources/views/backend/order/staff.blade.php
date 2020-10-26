@extends('backend.layouts.app')

@push('after-styles')
  {{-- <style type="text/css">
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

  </style> --}}

<style type="text/css">
  
.btn-primary.custom-btn {
  background-color: pink;
  border-color: #c8ced3;
  color: #5c6873;
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
            <div class="text-value-md font-weight-bold small"> {{ $status_url->description }} </div>
            <div class="text-muted font-weight-bold small font-italic">Agregar productos y/o materia prima al personal</div>
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
            @foreach($sale->products as $products)
            <tr>
              <td class="left"><strong><a href="{{ route('admin.product.product.show', $products->product_detail->product_detail->id) }}"> {{ $products->product_detail->product_detail->name }} </a> </strong>{{ ' Color:'.$products->product_detail->product_detail_color->name. ' Talla:'.$products->product_detail->product_detail_size->name }}</td>
              <td class="right" align="center">
                <em>
                  {{ $products->quantity}}
                </em>
              </td>
              <td class="right"><strong>${{ $products->product_detail->price }}</strong></td>
              <td class="right"><strong>${{ $products->quantity*$products->product_detail->price }}</td>
            </tr>
            @php($totalmat += $products->quantity*$products->product_detail->price)
            @endforeach
            <tr>
              <td class="left"></td>
              <td align="center"><strong>{{ $sale->getTotalProducts() }}</strong></td>
              <td class="right"><strong>Total:</strong></td>
              <td class="right"><strong>${{ $totalmat }}</strong></td>
            </tr>
          </tbody>
          </table>
          @endif
        </div>
        @if($staff_by_product->product_sale_staff_main_->count())
          <div class="animated fadeIn">
            <div class="row">
            @foreach($staff_by_product->product_sale_staff_main_ as $key => $prod)
              <div class="col-sm-12">
                <div class="card border-dark">
                    <div class="card-body">
                      <h5 class="card-title"> 
                        <div class="float-left"> 
                          {{ ucwords(strtolower($prod->staff->name)) }}
                        </div>
                        <div class="float-right"> 
                          Folio ticket: #{{ $prod->id }}
                        </div>
                      </h5>
                      <br>


                      <h5 class="card-subtitle"> 
                        <p class="font-italic"> Folio orden:#{{ $sale->id }} </p>
                      </h5>
                      <br>

                      <a href="#" data-toggle="modal" data-myid="{{ $sale->id }}" data-mystatus="{{ $status_url->id }}" data-mystatusname="{{ $status_url->name }}" data-mymain="{{ $prod->id }}" data-myname="{{  $prod->staff->name  }}" title="{{ __('labels.general.assign_staff') }}" class="btn btn-success ml-1 btn-sm" data-target="#addStaffMaterial" > Asignar consumos </a>

                      {{-- <a href="{{ route('admin.order.readyallproducts', $prod->id) }}" class="btn btn-primary custom-btn btn-sm" data-toggle="tooltip" data-placement="top" title="Finalizar cantidades de este ticket" method="post" data-trans-button-cancel="{{ __('buttons.general.cancel') }}" data-trans-button-confirm="{{ __('buttons.general.crud.delete') }}" data-trans-title="{{ __('strings.backend.general.are_you_sure') }}" class="dropdown-item">
                        Finalizar todo
                      </a> --}}
                      {!! $prod->ready_all_products_label !!}

                      <a href="{{ route('admin.inventory.sell.generateproductbystaff', [$prod->sale_id, $prod->user_id, $prod->id, $status_url->id]) }}" data-toggle="tooltip" data-placement="top" title="{{ __('labels.backend.access.sell.print') }}" class="btn btn-info btn-sm" target="_blank">{{ __('labels.backend.access.sell.print') }}</a>

                      <br>
                      <br>
                      <h6 class="card-subtitle mb-2 text-muted"></h6>
                        <div class="table-responsive">
                            <table class="table">
                              <thead class="thead-light">
                                <tr>
                                  <th scope="col">Producto</th>
                                  <th scope="col">Cantidad</th>
                                  <th scope="col" style="background-color:pink;">Finalizado</th>
                                  <th scope="col">Actualizado</th>
                                  <th scope="col">Acciones</th>
                                </tr>
                              </thead>
                              <tbody>
                                 @foreach($prod->product_ as $producto)
                                <tr>
                                  <td>{{ $producto->product_stock->product_detail->name.' — '. $producto->product_stock->product_detail_color->name.' — '.$producto->product_stock->product_detail_size->name }}</td>
                                  <td>{{ $producto->quantity }}</td>
                                  <td style="background-color:pink;">{{ $producto->ready_quantity }}</td>
                                  <td>{{ $producto->updated_at }}</td>
                                  <td>
                                    <a href="#" data-toggle="modal" data-placement="top" title="{{ __('buttons.general.crud.edit') }}" class="btn btn-outline-dark btn-sm" data-id="{{ $producto->id }}" data-myquantity="{{ $producto->quantity }}" data-target="#editConsumption"> Finalizar <i class="fa fa-check-double"></i></a>
                                  </td>
                                </tr>
                                @endforeach
                              </tbody>
                            </table>
                          </div>
                          <br>

                            @if($prod->material_->count())
                            <table class="table">
                              <thead class="thead-light">
                                <tr>
                                  <th scope="col">Código</th>
                                  <th scope="col">Material</th>
                                  <th scope="col">Cantidad</th>
                                  <th scope="col">Creado</th>
                                </tr>
                              </thead>
                              <tbody>
                                 @foreach($prod->material_ as $material)
                                <tr class="table-warning">
                                  <td>{{ $material->material->part_number }}</td>
                                    <td>
                                      {{ $material->material->part_number }}</strong> {!! ($material->material->color_id ? $material->material->color_name : '').' | '.$material->material->name !!}  

                                      {!! $material->material->trashed() ? '<span class="badge badge-pill badge-danger"> <em>Eliminado</em></span>' : '' !!}
                                  </td>
                                  <td>{{ $material->quantity }}</td>
                                  <td>{{ $material->created_at }}</td>
                                </tr>
                                @endforeach
                              </tbody>
                            </table>
                            @endif



                      <a href="#" class="card-link float-right text-muted">
                       <em>Creado por: {{ ucwords(strtolower($prod->created_by->name)) }}</em>
                      </a>

                    </div>

                    <div class="card-footer text-muted text-center">
                    Fecha de creación:  {{ $prod->created_at }}
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
          @endif
      </div>
    </div>
  </div>

  @include('backend.order.includes.status')

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
                <td class="right"> <strong>${{ $material->product_detail->price }}</strong></td>
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



<!-- Modal Material staff -->
<div class="modal fade" id="addStaffMaterial" tabindex="-1" role="dialog" aria-labelledby="addStaffMaterialLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addStaffMaterialLabel">Asignar consumos 
          | <span class="badge badge-success"> {{ $status_url->name }} </span>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form autocomplete="off" method="POST" action="{{ route('admin.order.orderstaffmaterial') }}">
       {{ csrf_field() }}
        <div class="modal-body">

            @if($sale_material->material_product_sale->count())
            <table class="table">
              <thead>
                <tr class="table-dark">
                  <th>Materia prima | Concentrado</th>
                  <th class="right">@lang('labels.backend.access.material.table.unit')</th>
                  <th class="right">@lang('labels.backend.access.material.table.quantity')</th>
                  <th class="right"> 
                    Asignar
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach($sale_material->material_product_sale as $material)

                  <input type="hidden" name="id" id="id" value="">
                  <input type="hidden" name="status" id="status" value="">
                  <input type="hidden" name="main" id="main" value="">
                  <input type="hidden" name="material[]" id="material" value="{{ $material->material_id }}">

                  <tr class="table-warning">
                    <td class="left"> <strong>{{ $material->material->part_number }}</strong> {!! ($material->material->color_id ? $material->material->color_name : '').' | '.$material->material->name !!} {!! ($material->product_id == NULL ? '<span class="badge badge-success"> '.__('labels.general.aggregate').' </span></a>' : '') !!} 

                    {!! $material->material->trashed() ? '<span class="badge badge-pill badge-danger"> <em>Eliminado</em></span>' : '' !!}
                    </td>
                    <td class="right">
                        {{ $material->material->unit->name }}
                    </td>
                    <td class="right" align="center">
                      <em>
                        <strong>{{ $material->sum }}</strong>
                      </em>
                    </td>
                    <td class="right">
                      <input class="form-control" id="quantity" type="number" step="any" min="0" max="{{ $material->sum}}" name="quantity[]">
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            @endif
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


<!-- Modal Edit Consumption -->
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


    $('#addStaffMaterial').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var id = button.data('myid')
      var status = button.data('mystatus')
      var main = button.data('mymain')
      var name = button.data('myname')
      var statusname = button.data('mystatusname')
      var modal = $(this)

      modal.find('.modal-body #id').val(id)
      modal.find('.modal-body #status').val(status)
      modal.find('.modal-body #main').val(main)
      modal.find('.modal-title').html('Asignar consumos - ' + name + ' <span class="badge badge-success"> ' + statusname + ' </span>')

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
