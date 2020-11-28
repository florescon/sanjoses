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
                <td class="left"><strong><a href="{{ route('admin.product.product.show', $product->product_detail->product_detail->id) }}"> {{ $product->product_detail->product_detail->name }} </a> </strong>{!! $product->product_detail->product_detail_color->name. ' / '.$product->product_detail->product_detail_size->name !!}</td>
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


    @if($product_revision_log->product_revision_log->count())
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
              <th scope="col">Fecha</th>
              <th scope="col">Acciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach($product_revision_log->product_revision_log as $product)
            <tr>
              <td>
                {{ $product->product_detail->product_detail->name .' — '. $product->product_detail->product_detail_color->name.' — '.$product->product_detail->product_detail_size->name }}
              </td>
              <td>
                {{ $product->sum }}
              </td>
              <td>
                {{ $product->created_at }}
              </td>
              <td>


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




@endsection

@push('after-scripts')
@endpush
