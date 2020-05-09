@extends('backend.layouts.app')

@section('content')
<div class="container">
  <div class="card">

    <div class="card-header">
    
    <strong>Folio @lang('labels.backend.access.sell.sale'): #{{ $sale->id }}</strong> 

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
            <tr>
              <th>@lang('labels.backend.access.sell.table.concept')</th>
              <th class="right">@lang('labels.backend.access.sell.table.quantity')</th>
              <th class="right">@lang('labels.backend.access.sell.table.price')</th>
              <th class="right">@lang('labels.backend.access.sell.table.total_sale')</th>
            </tr>
          </thead>
            <tbody>
            @php($total=0)
            @foreach($sale->products as $sales)
            <tr>
              <td class="left">{{ $sales->product_detail->product_detail->name }}</td>
              <td class="right">{{ $sales->quantity }}</td>
              <td class="right">${{ number_format($sales->product_detail->price, 2, ".", ",") }}</td>
              <td class="right">${{ number_format($sales->quantity*$sales->product_detail->price, 2, ".", ",") }}</td>
            </tr>
            @php($total+=$sales->quantity*$sales->product_detail->price)
            @endforeach
            <tr>
              <td class="left"></td>
              <td class="right"></td>
              <td class="right"></td>
              <td class="right"><strong>${{ number_format($total, 2, ".", ",") }}</strong></td>
            </tr>
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
