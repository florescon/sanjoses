@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.access.order.create'))

@section('content')

            <div class="row">
              <div class="col-sm-6">
                <div class="card">
                  <div class="card-header">
                    <strong>@lang('labels.backend.access.order.add')</strong>
                    <small>@lang('labels.backend.access.order.order')</small>

                    <div class="card-header-actions">
                      <a class="card-header-action" href="{{ route('admin.order.create') }}" target="_blank">
                        {{-- <small class="text-muted">imprimir</small> --}}
                        <a href="{{ route('admin.order.index') }}" class="badge badge-warning">
                        <i class="fa fa-shopping-cart"></i>
                        @lang('labels.backend.access.order.go_list_sale')</a>
                        <a href="{{ route('admin.order.latest') }}" class="badge badge-primary" target="_blank">
                        <i class="fa fa-print"></i>
                        @lang('labels.backend.access.order.print_last_sale')</a>
                      </a>
                    </div>

                  </div>
                  <div class="card-body">

                    <form id="cart" action="{{route('admin.order.storecart')}}" method="POST">
                    @csrf
                        <div class="row">
                          <div class="col-sm-12">
                          <div class="form-group">
                            <label for="product" class="col-form-label">@lang('labels.backend.access.order.product')</label>
                            <select type="text" name="product" class="form-control" id="product" required>
                            </select>
                          </div>
                          </div>
                        </div>
                        <!-- /.row-->
                        <div class="row">
                          <div class="col-sm-12">
                            <div class="form-group">
                              <label for="quantity">@lang('labels.backend.access.order.table.quantity')</label>
                              <input class="form-control" id="quantity" name="quantity" type="number" min="1" placeholder="Cantidad" value="1">
                            </div>
                          </div>
                        </div>
                        <!-- /.row-->
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-sm">@lang('labels.general.buttons.add')</button>
                      </div>
                  </form>
                  </div>    
                </div>
              </div>
              <!-- /.col-->
              @if($products->count())
              <div class="col-lg-6">
                <div class="card">
                  <div class="card-header">
                    <i class="fa fa-align-justify"></i> @lang('labels.backend.access.order.list_sale')</div>
                  <div class="card-body">
                    <table class="table table-responsive-sm table-striped">
                      <thead>
                        <tr>
                          <th>@lang('labels.backend.access.order.table.concept')</th>
                          <th>@lang('labels.backend.access.order.table.price')</th>
                          <th>@lang('labels.backend.access.order.table.quantity')</th>
                          <th>@lang('labels.backend.access.order.table.total_sale')</th>
                          <th>@lang('labels.general.actions')</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php($total=0)
                        @foreach($products as $product)
                        <tr>
                          <td>{{ $product->product->product_detail->name.' Color: '. $product->product->product_detail_color->name.' Talla: '.$product->product->product_detail_size->name  }}</td>
                          <td>${{ $product->product->price }}</td>
                          <td>{{ $product->quantity }}</td>
                          <td>${{ $product->quantity*$product->product->price }}
                          </td>
                          <td>
                                <a href="{{ route('admin.ordercart.destroy', $product->id) }}" class="btn btn-danger btn-sm" data-method="delete" data-trans-button-cancel="{{ __('buttons.general.cancel') }}" data-trans-button-confirm="{{ __('buttons.general.crud.delete') }}" data-trans-title="{{ __('strings.backend.general.are_you_sure') }}" class="dropdown-item">
                                    @lang('labels.backend.access.sell.delete')
                                </a> 
                           </td>
                        </tr>
                        @php($total+=$product->quantity*$product->product->price)
                        @endforeach
                          <tfoot>
                            <tr>
                              <td></td>
                              <td></td>
                              <th>@lang('labels.backend.access.sell.table.total_sale') <span class="Total"></span></th>
                              <th>${{ $total }}</th>
                              <td></td>
                            </tr>
                          </tfoot>
                      </tbody>
                    </table>

                  </div>
                </div>
                <div class="card">
                  <div class="card-header">
                    <strong>@lang('labels.backend.access.sell.last')</strong> @lang('labels.backend.access.sell.sale_setting')</div>
                  <form class="form-horizontal" action="{{route('admin.order.store')}}" method="POST">
                    @csrf
                  <div class="card-body">
                      <div class="form-group row">
                        <div class="col-sm-6">
                         <select type="text" name="user" class="form-control" id="user">
                         </select>
                          <span class="help-block">@lang('labels.backend.access.order.enter_client')</span>
                        </div>
                        <div class="col-sm-6">
                         <select type="text" name="payment" class="form-control" id="payment" required>
                         </select>
                          <span class="help-block">@lang('labels.backend.access.sell.enter_payment_type')</span>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-sm-6">
                         <select type="text" name="status" class="form-control" id="status">
                         </select>
                          <span class="help-block">@lang('labels.backend.access.order.enter_status')</span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="ticket_text" class="col-form-label">@lang('labels.backend.access.sell.text_ticket'):</label>
                        <textarea rows="2"  class="form-control" name="ticket_text" id="ticket_text"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="ticket_text" class="col-form-label">@lang('labels.backend.access.sell.comment_sale'):</label>
                        <textarea rows="2"  class="form-control border-success" name="comment" id="comment"></textarea>
                      </div>

                  </div>
                  <div class="card-footer">
                    <button class="btn btn-sm btn-success" type="submit">
                      <i class="fa fa-dot-circle-o"></i> @lang('labels.general.buttons.save')</button>
                    <a class="btn btn-sm btn-danger" href="{{ route('admin.order.create') }}" type="reset">
                      <i class="fa fa-ban"></i> Resetear</a>
                  </div>
                  </form>
                </div>

              </div>
              @endif
              <!-- /.col-->
            </div>

</div><!--card-->
@endsection

@push('after-scripts')
<script>


    $(document).ready(function() {
    $('#product').select2({
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
                            text: item.product_detail.name + ' ' + ' Color: ' + item.product_detail_color.name + ' ' + ' Talla: ' + item.product_detail_size.name + ' ' + ' $' + item.price
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
      });
});


$(document).ready(function() {
    $('#user').select2({
      ajax: {
            url: '{{ route('admin.user.select') }}',
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
        placeholder: '@lang('labels.backend.access.order.client')',
        width: 'resolve'
      });
});

$(document).ready(function() {
    $('#payment').select2({
      ajax: {
            url: '{{ route('admin.setting.method.select') }}',
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
        placeholder: '@lang('labels.backend.access.order.payment_method')',
        width: 'resolve'
      });
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
        // templateSelection: function(item) { return item.id || item.text; },
        width: 'resolve'
      });
});


function myFunction() {
  $('#user').val(null).trigger('change');
  $('#payment').val(null).trigger('change');
}


</script>

@endpush
