@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.access.finalorder.create'))

@section('after-styles')

@endsection

@section('content')

            <div class="row">
              <div class="col-sm-4">
                <div class="card">
                  <div class="card-header">
                    <strong>@lang('labels.backend.access.finalorder.add')</strong>
                    <small>@lang('labels.backend.access.finalorder.order')</small>

                    <div class="card-header-actions">
                        <a href="{{ route('admin.finalorder.index') }}" class="badge badge-warning">
                        <i class="fa fa-shopping-cart"></i>
                        @lang('labels.backend.access.order.go_list_sale')</a>
                        <a href="{{ route('admin.order.latest') }}" class="badge badge-primary" target="_blank">
                        <i class="fa fa-print"></i>
                        @lang('labels.backend.access.order.print_last_sale')</a>
                    </div>

                  </div>
                  <div class="card-body">
                    <form id="cart" action="{{route('admin.finalorder.storecart')}}" method="POST">
                    @csrf
                        <div class="row">
                          <div class="col-sm-12">
                            <div class="form-group">
                              <label for="product" class="col-form-label">@lang('labels.backend.access.finalorder.product')</label>
                              <select type="text" name="product[]" multiple="multiple" class="form-control" id="product" required>
                              </select>
                            </div>

                            <em> <strong>Nota: </strong> Para mantener búsqueda y selección múltiple, mantenga presionado la tecla Ctrl</em>
                            <br>
                          </div>
                        </div>
                        <!-- /.row-->
                        {{-- <div class="row">
                          <div class="col-sm-12">
                            <div class="form-group">
                              <label for="quantity">@lang('labels.backend.access.order.table.quantity')</label>
                              <input class="form-control" id="quantity" name="quantity" type="number" min="1" placeholder="Cantidad" >
                            </div>
                          </div>
                        </div> --}}
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
              <div class="col-lg-8">
                <div class="card">
                  <div class="card-header">
                    <i class="fa fa-align-justify"></i> @lang('labels.backend.access.finalorder.list_sale')

                     <div class="card-header-actions">
                        <a href="{{ route('admin.finalorder.destroyallcart') }}" class="badge badge-danger" data-method="delete" data-trans-button-cancel="{{ __('buttons.general.cancel') }}" data-trans-button-confirm="{{ __('buttons.general.crud.delete') }}" data-trans-title="{{ __('strings.backend.general.are_you_sure') }}" class="dropdown-item">
                            <i class="fas fa-trash"></i> @lang('labels.backend.access.finalorder.clean_list')
                        </a> 
                    </div>

                  </div>
                  <div class="card-body">
                    <table class="table table-responsive-sm table-striped">
                      <thead class="thead-dark">
                        <tr>
                          <th>@lang('labels.backend.access.finalorder.table.concept')</th>
                          <th>@lang('labels.backend.access.finalorder.table.price')</th>
                          <th style="width: 130px;">@lang('labels.backend.access.finalorder.table.quantity')</th>
                          <th>@lang('labels.backend.access.finalorder.table.total_sale')</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        @php($total=0)
                        <form action="{{route('admin.finalorder.updatequantities')}}" method="POST" class="was-validated">
                        @csrf
                          @foreach($products as $product)
                            <tr>
                              <td>{!! '<strong>'.$product->product->product_detail->name.'</strong> '. $product->product->product_detail_color->name.' / '.$product->product->product_detail_size->name  !!}</td>
                              <td>${{ $product->product->price }}</td>
                              <td>
                                <input type="hidden" id="hid" value="{{$product->id}}" name="hid[]">
                                <div class="mb-3">
                                  <input type="number" class="form-control" name="quantities[]" min="0" value="{{ $product->quantity }}" required>
                                </div>


                              {{-- <input type="hidden" id="hid" value="{{$product->id}}" name="hid">
                              <input class="jscolor float-right form-control" name="backgroundcolor" id="statscolor" value="{{$product->quantity}}" autocomplete="off" onChange="autoSave(this.jscolor)"> --}}


                              </td>
                              <td>${{ $product->quantity*$product->product->price }}
                              </td>
                              <td>
                                    <a href="{{ route('admin.finalorder.destroy', $product->id) }}" class="btn btn-danger btn-sm" data-method="delete" data-trans-button-cancel="{{ __('buttons.general.cancel') }}" data-trans-button-confirm="{{ __('buttons.general.crud.delete') }}" data-trans-title="{{ __('strings.backend.general.are_you_sure') }}" class="dropdown-item">
                                        <i class="fas fa-trash"></i>
                                    </a> 
                               </td>
                            </tr>
                            @php($total+=$product->quantity*$product->product->price)
                          @endforeach
                            <tr>
                              <td colspan="2"></td>
                              <th> 
                                <button class="btn btn-sm btn-success" type="submit"> Guardar cantidades </button>
                              </th>
                              <th colspan="2"></th>
                            </tr>

                        </form>
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
                    <strong>@lang('labels.backend.access.sell.last')</strong> @lang('labels.backend.access.order.sale_setting')</div>
                  <form class="form-horizontal" action="{{route('admin.finalorder.store')}}" method="POST">
                    @csrf
                  <div class="card-body">
                      <div class="form-group row">
                        <div class="col-sm-6">
                         <select type="text" name="user" class="form-control" id="user">
                         </select>
                          <span class="help-block">@lang('labels.backend.access.order.enter_client')</span>
                        </div>
                        <div class="col-sm-6">
                         <select type="text" name="payment" class="form-control" id="payment">
                         </select>
                          <span class="help-block">@lang('labels.backend.access.sell.enter_payment_type')</span>
                        </div>
                      </div>
                      <div class="form-group row">

                        <div class="col-md-6">
                          <input type="text" name="date_entered" step="any" id="date_entered" class="datepicker form-control" placeholder="@lang('labels.backend.access.material.table.date')" required readonly/>
                          <span class="help-block">@lang('labels.backend.access.sell.enter_date')</span>
                        </div>

                      </div>
                      <div class="form-group">
                        <label for="comment" class="col-form-label">@lang('labels.backend.access.sell.comment_sale'):</label>
                        <textarea rows="2"  class="form-control border-primary" name="comment" id="comment"></textarea>
                      </div>

                  </div>
                  <div class="card-footer">
                    <button class="btn btn-sm btn-success" type="submit">
                      <i class="fa fa-dot-circle-o"></i> @lang('labels.general.buttons.generate_order')</button>
                    <a class="btn btn-sm btn-danger" href="{{ route('admin.finalorder.create') }}" type="reset">
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

<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


<script>
  
    $(document).ready(function() {
      $('.datepicker').datepicker({
          language: 'es',
          dateFormat: 'dd-mm-yy',
          autoclose: true,
          todayHighlight: true,
          dateFormat:'dd-mm-yy',
      });
  });

    $.datepicker.regional['es'] = {
      closeText: 'Cerrar',
      prevText: '&#x3C;Ant',
      nextText: 'Sig&#x3E;',
      currentText: 'Hoy',
      monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto',
        'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
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
    $('#product').select2({
      ajax: {
            url: '{{ route('admin.revision.productrevision.select') }}',
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
                            id: item.product_id,
                            text: item.product_detail.product_detail.name.bold() + ' ' +  item.product_detail.product_detail_color.name + ' / ' + item.product_detail.product_detail_size.name + ('<br> Disponible: ' + item.quantity )
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
        allowClear: true,
        escapeMarkup: function(m) { return m; }
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




function myFunction() {
  $('#user').val(null).trigger('change');
  $('#payment').val(null).trigger('change');
}


</script>

@endpush
