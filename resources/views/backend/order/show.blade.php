@extends('backend.layouts.app')

@section('content')

<div class="row">
  <div class="col-sm-12 col-xl-8">
      <div class="card">
        <div class="card-header">
          Folio @lang('labels.backend.access.order.sale'):  <strong>#{{ $sale->id }}</strong> 
          <i class="fa fa-cog fa-spin fa-fw"></i>

              <div class="float-right">
                  <a href="{{ route('admin.order.index') }}" data-toggle="tooltip" data-placement="top" title="{{ __('labels.backend.access.sell.back_all_order') }}" class="btn btn-outline-light text-info btn-sm"> <i class="fas fa-long-arrow-alt-left"></i> @lang('labels.general.back')  </a>
              </div>

              @if($sale_material->material_product_sale->count() && $sale->latestStatus()->level >= 0)
              <div class="float-right">
                  <a href="{{ route('admin.inventory.sell.generatematerial', $sale->id) }}" data-toggle="tooltip" data-placement="top" title="{{ __('labels.backend.access.sell.print_material') }}" class="btn btn-warning ml-1 btn-sm" target="_blank"> <i class="fa fa-print"></i> @lang('labels.backend.access.sell.print_material') </a>
              </div>
              @endif
              
              <div class="float-right">
                  <a href="{{ route('admin.inventory.sell.generate', $sale->id) }}" data-toggle="tooltip" data-placement="top" title="{{ __('labels.backend.access.sell.print') }}" class="btn btn-info ml-1 btn-sm" target="_blank"> <i class="fa fa-print"></i> @lang('labels.backend.access.sell.print') </a>
              </div>

        </div>
        <div class="card-body">
          <div class="row mb-4">
              <div class="col-sm-6">
                @if(isset($sale->user_id))<h5 class="mb-3">@lang('labels.backend.access.order.reintegrate_to_stock'):</h5>
                  <div>
                    <strong>{{ optional($sale->user)->name }}</strong>
                  </div>
                  <div>
                    <strong>{{ optional($sale->user)->email }}</strong>
                  </div>
                <br>
                @endif
                
                <div>
                  @lang('labels.backend.access.sell.table.created'):
                </div>
                <div>
                  <strong>{{ $sale->created_at }}</strong>
                </div>
              </div>
              <div class="col-sm-6">
                <h6 class="mb-3">@lang('labels.backend.access.order.issued_by'):</h6>
                  <div>
                    <strong>{{ $sale->generated_by->name }}</strong>
                  </div>
                  <div>
                    <strong>{{ $sale->generated_by->email }}</strong>
                  </div>
                <br>
                <div>
                  @lang('labels.backend.access.sell.payment_type'):
                </div>
                <div>
                  <strong>{!! $sale->payment_method_id ? optional($sale->payment)->name : '<span class="badge badge-pill badge-secondary"> <em>No definido</em></span>' !!}</strong>
                </div>
              </div>
              <div class="col-sm-6">
                @if($sale->latestStatus())
                  <br>
                    <div>
                      @lang('labels.backend.access.order.actual_status'):
                    </div>
                    <div><strong>{{ optional($sale->latestStatus())->name }}</strong>  {{ optional($sale->latestStatus())->pivot->created_at }}</div>
                @endif
                <br>
                  <form id="cart" action="{{route('admin.order.change')}}" method="POST">
                    @csrf
                      <div>
                        @lang('labels.backend.access.order.change_status'):
                      </div>
                      <div>                          
                        <input type="hidden" name="id" id="id" value="{{ $sale->id }}">
                        <select type="text" name="status" class="form-control" id="status">
                        </select>
                      </div>
                      <br>
                      <button type="submit" class="btn btn-success btn-sm">@lang('labels.general.buttons.add')</button>
                  </form>
                <br>
              </div>
              <div class="col-sm-6">
                @if($sale->comment)
                  <br>
                    <div>
                      @lang('labels.backend.access.order.comment'):
                    </div>
                    <div><code class="text-primary">{!! $sale->comment !!}</code></div>
                @endif
                <br>
              </div>
          </div>

            <div class="card border-0">
              <div class="card-header bg-transparent border-light"> 
                <div class="card-header-actions"><a class="card-header-action" href="{{ route('admin.order.reintegrate', $sale->id) }}"><small class="text-primary">@lang('labels.backend.access.order.reintegrate_stock')</small></a></div>
              </div>
            </div>

          <div class="table-responsive-sm">
            <table class="table table-striped">
              <thead class="thead-dark">
                <tr>
                  <th>@lang('labels.backend.access.sell.table.concept')</th>
                  <th class="right">@lang('labels.backend.access.sell.table.quantity')</th>
                  <th align="center">@lang('labels.backend.access.sell.table.price')</th>
                  <th class="right">@lang('labels.backend.access.sell.table.total_sale')</th>
                  <th>
                    <div class="float-right">
                        <a href="{{ route('admin.inventory.sell.generate', $sale->id) }}" data-toggle="tooltip" data-placement="top" title="{{ __('labels.backend.access.sell.print') }}" class="btn btn-info ml-1 btn-sm" target="_blank"> <i class="fa fa-print"></i> </a>
                    </div>
                  </th>
                </tr>
              </thead>
              <tbody>
                @php($total=0)
                @foreach($sale->products as $products_sale)
                  <tr>
                    <td class="left"><strong><a href="{{ route('admin.product.product.show', $products_sale->product_detail->product_detail->id) }}"> {{ $products_sale->product_detail->product_detail->name }} </a> </strong>{{ ' Color:'.$products_sale->product_detail->product_detail_color->name. ' Talla:'.$products_sale->product_detail->product_detail_size->name }}</td>
                    <td class="right"><strong>{{ $products_sale->quantity }}</strong></td>
                    <td class="right"><strong>${{ number_format($products_sale->product_detail->price, 2, ".", ",") }}</strong></td>
                    <td class="right"><strong>${{ number_format($products_sale->quantity*$products_sale->product_detail->price, 2, ".", ",") }}</strong></td>
                    <td></td>
                  </tr>

{{--                   @if($products_sale->boms->count())
                    @foreach($products_sale->boms as $bom => $bomss)
                      <tr class="table-warning">
                        <td class="right">&nbsp;&nbsp;&nbsp; <em> <strong> {{  $bomss->material->part_number }} </strong> {{ $bomss->material->name }}</em></td>
                        <td class="right"><em>{{ $bomss->quantity * $products_sale->quantity }} </em></td>
                        <td class="right"><em>P.U: ${{ $bomss->material->price }}</em></td>
                        <td class="right"><em>Total: ${{ $bomss->total_price*$products_sale->quantity }}</em></td>
                      </tr>
                    @endforeach
                  @else
                      <tr>
                        <td class="right">&nbsp;&nbsp;&nbsp;<strong> <em>Producto no definido para producción</em></strong></td>
                        <td class="right"></td>
                        <td class="right"></td>
                        <td class="right"></td>
                      </tr>
                  @endif --}}

                  @php($total+=$products_sale->quantity*$products_sale->product_detail->price)
                @endforeach
                <tr>
                  <td class="left"></td>
                  <td class="right"></td>
                  <td class="right"><strong>Total:</strong></td>
                  <td class="right"><strong>${{ number_format($total, 2, ".", ",") }}</strong></td>
                  <td class="right"></td>
                </tr>
              </tbody>
            </table>

            @if($sale_material->material_product_sale->count() && $sale->latestStatus()->level >= 0)
            <div class="card-body">
              <form id="cart" action="{{ route('admin.order.addmaterialselect', $sale->id) }}" method="POST">
              @csrf
                  <div class="row">
                    <div class="col-sm-9">
                    <div class="form-group">
                      <label for="product" class="col-form-label">@lang('labels.backend.access.material.add_material_to_order')</label>
                      <select type="text" name="product" class="form-control" id="product" required>
                      </select>
                    </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label for="quantity">@lang('labels.backend.access.order.table.quantity')</label>
                        <input class="form-control" style="border-width:0 0 1px 0;" id="quantity" name="quantity" type="number" min="0" step="any" placeholder="Cantidad" value="1">
                      </div>
                    </div>

                  </div>
                  <!-- /.row-->
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary btn-sm">@lang('labels.general.buttons.add')</button>
                </div>
              </form>
            </div>  
            @endif

            @if($sale_material->material_product_sale->count() && $sale->latestStatus()->level >= 0)
            <table class="table">
              <thead>
                <tr class="table-dark">
                  <th>Materia prima | Concentrado</th>
                  <th class="right">@lang('labels.backend.access.sell.table.unit')</th>
                  <th class="right">@lang('labels.backend.access.sell.table.quantity')</th>
                  <th class="right">@lang('labels.backend.access.sell.table.price')</th>
                  <th class="right">@lang('labels.backend.access.sell.table.total_sale')</th>
                  <th class="right"> 
                    <div class="float-right">
                        <a href="{{ route('admin.inventory.sell.generatematerial', $sale->id) }}" data-toggle="tooltip" data-placement="top" title="{{ __('labels.backend.access.sell.print_material') }}" class="btn btn-warning ml-1 btn-sm" target="_blank"> <i class="fa fa-print"></i> </a>
                    </div>
                  </th>
                </tr>
              </thead>
              <tbody>
                @php($totalmat=0)
                @foreach($sale_material->material_product_sale as $material)
                  <tr class="table-warning">
                    <td class="left"> <strong>{{ $material->material->part_number }}</strong> {!! ($material->material->color_id ? $material->material->color_name : '').' | '.$material->material->name !!} {!! ($material->product_id == NULL ? '<span class="badge badge-success"> '.__('labels.general.aggregate').' </span></a>' : '') !!} </td>
                    <td class="right">
                        {{ $material->material->unit->name }}
                    </td>
                    <td class="right" align="center">
                      <em>
                        {{ $material->sum }}
                      </em>
                    </td>
                    <td class="right">P.U: <strong>${{ $material->material->price }}</strong></td>
                    <td class="right"><strong>${{ $material->material->price * $material->sum }}</td>

                    <td class="right">
                      <div class="btn-group" role="group" aria-label="_{{ _('labels.backend.access.users.user_actions') }}"> 
                        <a href="#" data-toggle="modal" data-target="#stockModal" data-placement="top" data-material_id="{{ $material->id }}" data-stock="{{ $material->sum }}" title="@lang('buttons.general.crud.edit')" class="btn btn-outline-light  text-info btn-sm"><i class="fas fa-minus"></i>  <i class="fas fa-plus"></i></a>
                      </div>                
                    </td>
                  </tr>




                    @if($material->history->count())
                      @foreach($material->history as $histo)
                        <tr class="table table-sm">
                          <td class="right">&nbsp;&nbsp;&nbsp;<em> Se modificó la cantidad </em></td>
                          <td class="right"><em>  </em></td>
                          <td class="right" align="center"><em> {{ $histo->quantity }} </em></td>
                          <td class="right" align="center" colspan="3" ><em>{{ $histo->created_at }}</em></td>
                        </tr>
                      @endforeach
                    @endif

                  @php($totalmat += $material->material->price * $material->sum)
                @endforeach
                <tr>
                  <td class="left"></td>
                  <td class="right"></td>
                  <td class="right"></td>
                  <td class="right"><strong>Total:</strong></td>
                  <td class="right"><strong>${{ $totalmat }}</strong></td>
                  <td class="right"></td>
                </tr>
              </tbody>
            </table>
            @endif

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


<!-- Modal stock -->
<div class="modal fade" id="stockModal" tabindex="-1" role="dialog" aria-labelledby="stockModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="stockModalLabel">@lang('labels.backend.access.payment.create') </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

    <form autocomplete="off" method="POST" action="{{ route('admin.order.addmaterial', 'test') }}">
       @csrf
      <div class="modal-body">
        <input type="hidden" name="id" id="id" value="">
          <div class="form-group row">
            <div class="col-md-12">
            <label for="name" class="col-form-label">@lang('labels.backend.access.material.table.consumption'):</label>
              <div class="input-group">
                <div class="input-group-prepend">
                </div>
                <input class="form-control" id="stock" type="number" name="stock" disabled>
              </div>
            </div>

            <div class="col-md-12">
            <label for="name" class="col-form-label">@lang('labels.backend.access.product.add_quantity'):</label>
              <div class="input-group">
                <span class="input-group-btn">
                    <button type="button" class="btn btn-default btn-outline-light text-danger btn-number" data-type="minus" data-field="stock_">
                        <span class="fas fa-minus"></span>
                    </button>
                </span>
                <input class="form-control" id="stock_" type="number" step="any" name="stock_">
                <span class="input-group-btn">
                    <button type="button" class="btn btn-outline-light text-info btn-number " data-type="plus" data-field="stock_">
                        <span class="fas fa-plus"></span>
                    </button>
                </span>
              </div>
            </div>
            <div class="col-md-12">
              <label for="note" class="col-form-label"><strong>Nota: </strong><em>Si suma o resta cantidades se verá reflejado en el inventario de materia prima. Agregar cantidad de materia prima a la orden implica restar en el inventario, e inversamente.</em></label>
            </div>

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

    $('#stockModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var id = button.data('material_id')
      var stock_ = button.data('stock')
      var modal = $(this)

      modal.find('.modal-body #id').val(id)
      modal.find('.modal-body #stock').val(stock_)
      modal.find('.modal-title').text('@lang('labels.backend.access.product.add_quantity') ')
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

<script>
    $(document).ready(function() {
    $('#product').select2({
      ajax: {
            url: '{{ route('admin.product.materialdetails.select') }}',
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
                            text:  item.part_number.fixed() + ' ' +item.name + ' ' + (item.unit_id ? item.unit.name.sup().fontcolor('#20a8d8') : '') + (item.color_id  ?  '<br> Color: ' + item.color.name.bold()  : '')  + (item.size_id  ?  '<br> Talla: ' + item.size.name.bold()  : '')
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
        placeholder: 'Materia prima',
        width: 'resolve',
        escapeMarkup: function(m) { return m; }

      });
});
</script>


@endpush
