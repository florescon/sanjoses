@extends('backend.layouts.app')

@section('content')

  <div class="fade-in">
    <div class="row">
      <div class="col-sm-12 col-xl-12">
        <div class="card">
          <div class="card-header">@lang('labels.backend.access.order.reintegrate_stock') -- <small class="text-danger"> Orden Folio #{{ $sale->id }}</small> --

            <div class="float-right">
              <a href="{{ route('admin.order.show', $sale->id) }}" data-toggle="tooltip" data-placement="top" title="{{ __('labels.backend.access.sell.back_order') }}" class="btn btn-outline-light text-info btn-sm"> <i class="fas fa-long-arrow-alt-left"></i> @lang('labels.general.back')  </a>
            </div>

            <div class="float-right">
              {!! $sale->reintegrate_all_label !!}
            </div>
          </div>
          <div class="card-body">

            <table class="table table-responsive-sm table-sm">
              <thead class="thead-dark">
                <tr>
                  <th>@lang('labels.backend.access.sell.table.concept')</th>
                  <th class="right">@lang('labels.backend.access.sell.table.quantity')</th>
                  <th align="center">@lang('labels.backend.access.sell.table.price')</th>
                  <th class="right">@lang('labels.backend.access.sell.table.total_sale')</th>
                  <th>

                  </th>
                </tr>
              </thead>
              <tbody>
                @php($total=0)
                @foreach($sale->products as $products_sale)
                  <tr>
                    <td class="left"><strong><a href="{{ route('admin.product.product.show', $products_sale->product_detail->product_detail->id) }}"> {{ $products_sale->product_detail->product_detail->name }} </a> </strong>{!! $products_sale->product_detail->product_detail_color->name. ' / '.$products_sale->product_detail->product_detail_size->name !!}</td>
                    <td class="right"><strong>{{ $products_sale->quantity }}</strong></td>
                    <td class="right"><strong>${{ number_format($products_sale->product_detail->price, 2, ".", ",") }}</strong></td>
                    <td class="right"><strong>${{ number_format($products_sale->quantity*$products_sale->product_detail->price, 2, ".", ",") }}</strong></td>
                    <td>
                      <div class="float-right">
                        {!! $products_sale->reintegrate_label !!}
                      </div>
                    </td>
                  </tr>
                  @php($total+=$products_sale->quantity*$products_sale->product_detail->price)
                @endforeach
                <tr>
                  <td class="left"></td>
                  <td class="right"><p class="text-primary"><strong>{{ $sale->getTotalProducts() }}</strong></p></td>
                  <td class="right"><strong>Total:</strong></td>
                  <td class="right"><strong>${{ number_format($total, 2, ".", ",") }}</strong></td>
                  <td class="right"></td>
                </tr>
              </tbody>
            </table>



          </div>
          </div>
        </div>
      </div>
    </div>
  </div>


@endsection

