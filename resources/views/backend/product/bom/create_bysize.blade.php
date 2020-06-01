@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.access.order.create'))

@section('content')

<div class="row">
  <div class="col-sm-4">
    <div class="card">
      <div class="card-header">
        <strong>@lang('labels.backend.access.order.add')</strong>
        <small>@lang('labels.backend.access.material.material')</small>
            <strong style="float:right;"><a class="btn btn-outline-light btn-sm text-info " href="{{ route('admin.product.product.index') }}"><i class="fas fa-long-arrow-alt-left"></i> @lang('labels.general.back')  </a></strong> 
      </div>
      <div class="card-body">

        <form id="cart" action="{{ route('admin.product.bom.bomsizestore', [$product->id , $size]) }}" method="POST">
        @csrf
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <strong> {!! $product->code !!}</strong> {!! $product->name !!} <a href="{{ route('admin.product.product.show', $product->id) }}" data-toggle="tooltip" data-placement="top" title="{{ __('labels.backend.access.product.table.view') }}" class="btn btn-info ml-1 btn-sm" target="_blank"> <i class="fa fa-eye"></i> </a>
                </div>

                <div class="form-group">
                  <strong> Talla: {!! $size->name !!}</strong>
                </div>

              </div>

              <div class="col-sm-12">
                <div class="form-group">
                  <label for="product" class="col-form-label">@lang('labels.backend.access.material.material')</label>
                  <select type="text" name="product" class="form-control" id="product" required>
                  </select>
                </div>
              </div>
            </div>
            <!-- /.row-->
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="quantity">@lang('labels.backend.access.material.table.consumption')</label>
                  <input class="form-control" id="quantity" name="quantity" type="number" min="0" placeholder="Cantidad"  step="any" value="1">
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
  @if($materials->count())
  <div class="col-lg-8">
    <div class="card">
      <div class="card-header">
        <i class="fa fa-align-justify"></i> @lang('labels.backend.access.material.table.list_material')</div>
      <div class="card-body">
        <table class="table table-responsive-sm table-striped">
          <thead>
            <tr>
              <th>@lang('labels.backend.access.material.material')</th>
              <th>@lang('labels.backend.access.material.table.size')</th>
              <th>@lang('labels.backend.access.material.table.color')</th>
              <th>@lang('labels.backend.access.material.table.consumption')</th>
              <th>@lang('labels.backend.access.material.table.unit_price')</th>
              <th>@lang('labels.backend.access.order.table.total_sale')</th>
              <th>@lang('labels.general.actions')</th>
            </tr>
          </thead>
          <tbody>
            @php($total=0)
            @foreach($materials as $product)
            <tr>
              <td> {!! '<em>'.$product->material->part_number.'</em> '.$product->material->name.' '.($product->material->unit_id ? '<sup>'.$product->unit_name .'</sup>' :'') !!} </td>
              <td>{!! $product->material->size_id ? $product->size_name : '<span class="badge badge-pill badge-secondary"> <em>No definida</em></span>' !!}</td>
              <td>{!! $product->material->color_id ? $product->color_name : '<span class="badge badge-pill badge-secondary"> <em>No definido</em></span>' !!}</td>
              <td>{{ $product->quantity }}</td>
              <td>${{ $product->material->price }}</td>
              <td>${{ $product->total_price }}
              </td>
              <td>
                    <a href="{{ route('admin.product.cartbombysize.destroy', $product->id) }}" class="btn btn-danger btn-sm" data-method="delete" data-trans-button-cancel="{{ __('buttons.general.cancel') }}" data-trans-button-confirm="{{ __('buttons.general.crud.delete') }}" data-trans-title="{{ __('strings.backend.general.are_you_sure') }}" class="dropdown-item">
                        @lang('labels.backend.access.sell.delete')
                    </a> 
               </td>
            </tr>
            @php($total+=$product->quantity*$product->material->price)
            @endforeach
              <tfoot>
                <tr>
                  <td></td>
                  <td></td>
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
        placeholder: 'Material',
        width: 'resolve',
        escapeMarkup: function(m) { return m; }

      });
});




</script>
@endpush

