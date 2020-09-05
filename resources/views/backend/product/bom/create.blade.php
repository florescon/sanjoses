@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.access.order.create'))

@section('content')

<div class="row">
  <div class="col-sm-4">
    <div class="card">
      <div class="card-header bg-primary">
        <strong>@lang('labels.backend.access.order.add')</strong>
        <small>@lang('labels.backend.access.material.material')</small>
            <strong style="float:right;"><a class="btn btn-light btn-sm  " href="{{ route('admin.product.productconsumption.consumption') }}"><i class="fas fa-long-arrow-alt-left"></i> @lang('labels.general.back')  </a></strong> 
      </div>
      <div class="card-body">

        <form id="cart" action="{{ route('admin.product.bom.storecart', $product->id) }}" method="POST">
        @csrf
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <strong> {!! $product->code !!}</strong> {!! $product->name !!} <a href="{{ route('admin.product.product.show', $product->id) }}" data-toggle="tooltip" data-placement="top" title="{{ __('labels.backend.access.product.table.view') }}" class="btn btn-info ml-1 btn-sm" target="_blank"> <i class="fa fa-eye"></i> </a>
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
                  <input type="hidden" name="id" id="id" value="">
                  <label for="quantity">@lang('labels.backend.access.material.table.consumption')</label>
                  <input class="form-control" id="quantity" name="quantity" type="number" min="0" placeholder="Cantidad" step="any">
                </div>
              </div>
            </div>
            <!-- /.row-->
          <div class="modal-footer">
            <button type="submit" class="btn btn-success btn-sm">@lang('labels.general.buttons.add')</button>
          </div>
      </form>
      </div>    
    </div>


    @if($product->sizes->count())
      <div class="card">
        <div class="card-header bg-primary">
          <small>@lang('labels.backend.access.material.material_by_size')</small>
        </div>
        <div class="card-body">
          <div class="list-group">
            @foreach ($product->sizes as $size)
              <a href="{{ route('admin.product.bom.addtosize', [$product->id , $size->id]) }}" class="list-group-item d-flex list-group-item-action justify-content-between align-items-center">
                {{-- <u>{{ $size->id }}</u> --}}

                {{ $size->name }}

                @if($size->countAllBySize($product->id))
                  <span class="badge badge-primary badge-pill"> {{ $size->countAllBySize($product->id) }} </span>
                @endif

              </a>
            @endforeach
          </div>
        </div>  
      </div>
    @endif

  </div>
  <!-- /.col-->
  <div class="col-lg-8">
    <div class="card">
      <div class="card-header bg-primary">
        <i class="fa fa-align-justify"></i> @lang('labels.backend.access.material.table.list_material')</div>
      <div class="card-body">
        @if($product->cloth_material)
          <div class="float-right">
          
          <a href="#" class="text-dark" data-toggle="modal" data-placement="top"  data-placement="top" title="modificar" data-target="#addCloth" data-id="{{ $product->cloth_material->id }}" data-myquantity="{{ $product->cloth_material->quantity }}">
            <i class="fas fa-tshirt"></i> <em>Su consumo de tela general es: </em> <strong>{{ $product->cloth_material->quantity }}</strong>
          </a>
         </div>
        @else
          <form id="cart" class="form-inline float-right" action="{{ route('admin.product.bom.bomstorecloth', $product->id) }}" method="POST">
          @csrf
            <div class="form-group mb-2">
              <label for="ingrese" class="sr-only">Ingrese</label>
              <input type="text" readonly class="form-control-plaintext" id="ingrese" value="Ingrese consumo de tela">
            </div>
            <div class="form-group mx-sm-3 mb-2">
              <label for="quantity" class="sr-only">Cantidad</label>
              <input class="form-control" style="border-width:0 0 1px 0;" id="quantity" name="quantity" type="number" min="0" step="any" placeholder="Cantidad">
            </div>
            <button type="submit" class="btn btn-square btn-outline-dark mb-2"><i class="fas fa-tshirt"></i> Confirmar</button>
          </form>
        @endif

        @if($materials->count())
        <table class="table table-responsive-sm table-striped">
          <caption><em>Listado principal</em></caption>
          <thead>
            <tr class="bg-secondary">
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
            <tr {!! $product->material->trashed() ? 'class="table-danger"' : '' !!} >
              <td> {!! '<em>'.$product->material->part_number.'</em> '.$product->material->name.' '.($product->material->unit_id ? '<sup>'.$product->unit_name .'</sup>' :'') !!} 

                {!! $product->material->trashed() ? '<span class="badge badge-pill badge-danger"> <em>Eliminado</em></span>' : '' !!} 

              </td>
              <td>{!! $product->material->size_id ? $product->size_name : '<span class="badge badge-pill badge-secondary"> <em>No definida</em></span>' !!}</td>
              <td>{!! $product->material->color_id ? $product->color_name : '<span class="badge badge-pill badge-secondary"> <em>No definido</em></span>' !!}</td>
              <td>{{ $product->quantity }}</td>
              <td>${{ $product->material->price }}</td>
              <td>${{ $product->total_price }}
              </td>
              <td>
                    <a href="{{ route('admin.product.cartbom.destroy', $product->id) }}" class="btn btn-danger btn-sm" data-method="delete" data-trans-button-cancel="{{ __('buttons.general.cancel') }}" data-trans-button-confirm="{{ __('buttons.general.crud.delete') }}" data-trans-title="{{ __('strings.backend.general.are_you_sure') }}" class="dropdown-item">
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
        @endif

      </div>
      <div class="card-footer text-muted text-center">

      </div>
    </div>

  </div>
  <!-- /.col-->
</div>

</div><!--card-->

<!-- Modal Cloth-->
<div class="modal fade" id="addCloth" tabindex="-1" role="dialog" aria-labelledby="addClothLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addClothLabel">Modificar consumo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

    <form autocomplete="off" method="POST" action="{{ route('admin.product.bom.bomupdatecloth', 'test') }}">
        {{method_field('patch')}}
        {{ csrf_field() }}
      <div class="modal-body">
          <div class="form-group">

            <label for="quantity" class="col-form-label">@lang('labels.backend.access.material.table.quantity'):</label>
            <input type="hidden" name="id" id="id" value="">
            <input type="number" class="form-control" value="" name="quantity" id="quantity" required min="0" placeholder="Cantidad" step="any">
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
    $('#addCloth').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var id = button.data('id')
      var quantity = button.data('myquantity')
      var modal = $(this)

      modal.find('.modal-body #id').val(id)
      modal.find('.modal-body #quantity').val(quantity)
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

