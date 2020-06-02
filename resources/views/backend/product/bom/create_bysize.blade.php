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

        <form id="cart" action="{{ route('admin.product.bom.bomsizestore', [$product->id , $size->id]) }}" method="POST">
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

  <div class="col-lg-8">

    <div class="card">
      <div class="card-header"><strong>Materia prima principal</strong>
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('admin.product.bom.replicate', 'test') }}">
          @csrf
          <input type="hidden" name="product" id="product" value="{{ $product->id }}">
          <input type="hidden" name="size" id="size" value="{{ $size->id }}">
          <button type="submit" class="btn btn-primary"><small>Replicar materia prima</small></button>
        </form>

      </div>
    </div>

    @if($materials->count())
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
                <div class="btn-group" role="group">
                    <a href="#" data-toggle="modal" data-placement="top" title="{{ __('buttons.general.crud.edit') }}" class="btn btn-primary btn-sm" data-id="{{ $product->id }}" data-myquantity="{{ $product->quantity }}" data-target="#editConsumption"><i class="fas fa-edit"></i></a>

                    <a href="{{ route('admin.product.cartbombysize.destroy', $product->id) }}" class="btn btn-danger btn-sm" data-method="delete" data-trans-button-cancel="{{ __('buttons.general.cancel') }}" data-trans-button-confirm="{{ __('buttons.general.crud.delete') }}" data-trans-title="{{ __('strings.backend.general.are_you_sure') }}" class="dropdown-item">
                        <i class="fas fa-eraser"></i>
                    </a> 
                </div>
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
    @endif

  </div>
  <!-- /.col-->
</div>

</div><!--card-->


<div class="modal fade" id="editConsumption" tabindex="-1" role="dialog" aria-labelledby="createTagLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createTagLabel">@lang('labels.backend.access.material.edit_consumption')</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

    <form autocomplete="off" method="POST" action="{{ route('admin.product.bom.updateconsumption', 'test') }}">
        {{method_field('patch')}}
        {{ csrf_field() }}
      <div class="modal-body">
          <div class="form-group">

            <label for="quantity" class="col-form-label">@lang('labels.backend.access.material.table.quantity'):</label>
            <input type="hidden" name="id" id="id" value="">
            <input type="text" class="form-control" value="" name="quantity" id="quantity" required>
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

