@extends('backend.layouts.app')

@section('content')
<div class="container">
  <div class="card">

    <div class="card-header">
    
    <strong>Folio @lang('labels.backend.access.order.sale'): #{{ $sale->id }}</strong> 

    <a class="btn btn-sm btn-info float-right" target="_blank" href="{{ route('admin.inventory.sell.generate', $sale->id) }}" >
      <i class="fa fa-print"></i> 
      @lang('labels.backend.access.sell.print')
    </a>
    </div>
      <div class="card-body">
        <div class="row mb-4">
          <div class="col-sm-6">
            @if(isset($sale->user_id))<h6 class="mb-3">@lang('labels.backend.access.sell.sale_to'):</h6>
              <div>
                <strong>{{ optional($sale->user)->name }}</strong>
              </div>
              <div>{{ optional($sale->user)->email }}</div>
            <br>
            @endif
            
            <div>
            <strong>@lang('labels.backend.access.sell.table.created'):</strong>
            </div>
              <div>
              {{ $sale->created_at }}
            </div>

          </div>
          <div class="col-sm-6">
            <h6 class="mb-3">@lang('labels.backend.access.sell.issued_by'):</h6>
              <div>
                <strong>{{ $sale->generated_by->name }}</strong>
              </div>
              <div>{{ $sale->generated_by->email }}</div>
            <br>
            <div>
              <strong>@lang('labels.backend.access.sell.payment_type'):</strong>
            </div>
            <div>
              {{ optional($sale->payment)->name }}
            </div>
          </div>

        </div>

        <div class="table-responsive-sm">
          <table class="table table-striped">
            <thead>
              <tr class="table-info">
                <th>@lang('labels.backend.access.sell.table.concept')</th>
                <th class="right">@lang('labels.backend.access.sell.table.quantity')</th>
                <th class="right">@lang('labels.backend.access.sell.table.price')</th>
                <th class="right">@lang('labels.backend.access.sell.table.total_sale')</th>
              </tr>
            </thead>
            <tbody>
              @foreach($sale->products as $products_sale)
                <tr>
                  <td class="left"><strong>{{ $products_sale->product_detail->product_detail->name }}</strong>{{ ' Color:'.$products_sale->product_detail->product_detail_color->name. ' Talla:'.$products_sale->product_detail->product_detail_size->name }}</td>
                  <td class="right"><strong>{{ $products_sale->quantity }}</strong></td>
                  <td class="right"><strong>${{ number_format($products_sale->product_detail->price, 2, ".", ",") }}</strong></td>
                  <td class="right"><strong>${{ number_format($products_sale->quantity*$products_sale->product_detail->price, 2, ".", ",") }}</strong></td>
                </tr>
              @endforeach
            </tbody>
          </table>


        </div>
        <div class="row">
          <div class="col-lg-4 col-sm-5">
          </div>

          <div class="col-lg-4 col-sm-5 ml-auto">
            <table class="table table-clear">
              <tbody>
              </tbody>
            </table>
          </div>
        </div>

      </div>
  </div>
</div>

@endsection
