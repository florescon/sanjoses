@extends('backend.layouts.app')

@section('content')

<div class="row">
  <div class="col-sm-12 col-xl-8">
    <div>
      <div class="card">
        <div class="card-body p-0 d-flex align-items-center">
          <i class="fa fa-users-cog bg-info p-4 px-5 font-3xl mr-3"></i>
          <div>
            <div class="text-value-sm text-info"> {{ $status_url->name }} </div>
            <div class="text-value-md font-weight-bold small"> {{ $status_url->description }} </div>
            <div class="text-muted font-weight-bold small font-italic">Transferir productos al almacén</div>
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
      </div>
      @endif

      <form autocomplete="off" method="POST" action="{{ route('admin.order.orderstockrevision') }}">
      {{ csrf_field() }}
        <div class="card-body">

              <div class="checkbox d-flex align-items-center float-right">
                  <label>&nbsp; <strong class="text-info">Transferir todas las cantidades</strong> </label>&nbsp;
                  <label class="switch switch-label switch-pill switch-primary switch-sm">
                    <input class="switch-input" type="checkbox" value="1" name="all_quantities">
                    <span class="switch-slider" data-checked="&#x2713;" data-unchecked="&#x2715;"></span>
                  </label>
              </div>

          <div class="table-responsive-sm">
            @if($sale->material_product_sale->count() && $sale->latestStatus()->level >= 0)
            <table class="table table-striped">
              <thead class="thead-dark">
                <tr>
                  <th>Producto</th>
                  <th class="right">@lang('labels.backend.access.sell.table.quantity')</th>
                  <th class="right">@lang('labels.backend.access.sell.table.price')</th>
                  <th class="right">@lang('labels.backend.access.sell.table.total_sale')</th>
                  <th class="right">Ingresar</th>
                </th>
              </tr>
            </thead>
            <tbody>
              @php($totalmat=0)
              @foreach($sale->products as $product)

              <input type="hidden" name="id" id="id" value="{{ $sale->id }}">
              <input type="hidden" name="product[]" id="product" value="{{ $product->product_id }}">
              <tr>
                <td class="left"><strong><a href="{{ route('admin.product.product.show', $product->product_detail->product_detail->id) }}"> {{ $product->product_detail->product_detail->name }} </a> </strong>{{ ' Color:'.$product->product_detail->product_detail_color->name. ' Talla:'.$product->product_detail->product_detail_size->name }}</td>
                <td class="right" align="center">
                  <em>
                    {{ $product->quantity}}
                  </em>
                </td>
                <td class="right"><strong>${{ $product->product_detail->price }}</strong></td>
                <td class="right"><strong>${{ $product->quantity*$product->product_detail->price }}</strong></td>
                <td>
                  <input class="form-control" id="quantity" type="number" step="any" min="0" max="{{ $product->quantity}}" name="quantity[]">
                </td>
              </tr>
              @php($totalmat += $product->quantity*$product->product_detail->price)
              @endforeach
              <tr>
                <td class="left"></td>
                <td align="center"><strong>{{ $sale->getTotalProducts() }}</strong></td>
                <td class="right"><strong>Total:</strong></td>
                <td class="right"><strong>${{ $totalmat }}</strong></td>
                <td class="left"></td>
              </tr>
            </tbody>
            </table>
            @endif
          </div>
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">@lang('labels.general.buttons.to_transfer')</button>
        </div>

      </form>

    </div>


    @if($product_revision_stock->product_revision_stock->count())
    <div class="card">
      <div class="card-header text-center">
        <h5>Transferidos</h5>
      </div>
      <div class="card-body">
        <table class="table">
          <thead>
            <tr class="bg-primary">
              <th scope="col">Producto</th>
              <th scope="col">Cantidad</th>
              <th scope="col">Procesado</th>
              <th scope="col">Fecha</th>
              <th scope="col">Acciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach($product_revision_stock->product_revision_stock as $product)
            <tr>
              <td>
                {{ $product->product_stock->product_detail->name .' — '. $product->product_stock->product_detail_color->name.' — '.$product->product_stock->product_detail_size->name }}
              </td>
              <td>
                {{ $product->quantity }}
              </td>
              <td>
                {{ $product->ready_quantity }}
              </td>
              <td>
                {{ $product->created_at }}
              </td>
              <td>
                @if($product->quantity == $product->ready_quantity)
                  <a href="#" class="btn btn-primary btn-sm" role="button"> Procesado </a>

                @else
                  <a href="#" data-toggle="modal" data-placement="top" title="{{ __('buttons.general.crud.edit') }}"  class="btn btn-outline-dark btn-sm" data-id="{{ $product->id }}" data-myquantity="{{ $product->quantity }}" data-target="#editProductRevisionStock"> Procesar </a>
                @endif
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    @endif

  </div>

  @include('backend.order.includes.status')

</div>


<div class="modal fade" id="editProductRevisionStock" tabindex="-1" role="dialog" aria-labelledby="editProductRevisionStockLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editProductRevisionStockLabel">@lang('labels.backend.access.product.ready_product')</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

    <form autocomplete="off" method="POST" action="{{ route('admin.order.readyproductrevisionstock', 'test') }}">
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
      $('#editProductRevisionStock').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var quantity = button.data('myquantity')
        var id = button.data('id')
        var modal = $(this)

        modal.find('.modal-body #quantity').val(quantity)
        modal.find('.modal-body #id').val(id)
      });
  </script>
@endpush
