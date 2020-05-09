@extends('backend.layouts.app')

@section('content')
<div class="container">
  <div class="card {{ $product->detail->count() ? '' : 'border-danger' }}">
    <div class="card-header">
      <strong>Folio: #{{ $product->id }}</strong> 
      <strong style="float:right;"><a class="btn btn-outline-light text-info " href="{{ route('admin.product.product.index') }}"><i class="fas fa-long-arrow-alt-left"></i> @lang('labels.general.back')  </a></strong> 
   </div>
    <div class="card-body">
      <div class="row mb-4">
        <div class="col-sm-6">
          <h6 class="mb-3"><strong>@lang('labels.backend.access.product.table.actually_quantity'):</strong></h6>
            <div>
              {{ $product->getTotalStock() }}
            </div>
          <br>
          
          <div>
            <strong>@lang('labels.backend.access.sell.table.created'):</strong>
          </div>
          <div>
            {{ $product->created_at }}
          </div>
          <br>
          <div>
            <strong>@lang('labels.backend.access.product.colors'):</strong>
            @if($product->detail->count())
              <a href="" data-id="{{ $product->id }}" data-toggle="modal" data-target="#newColor" class="btn btn-secondary active btn-sm float-right">@lang('labels.backend.access.product.add_color')</a>
            @endif
          </div>
          <div>
            @foreach ($product->colors as $color) 
                {{ $loop->first ? '' : ', ' }}
                {{ $color->name }}
            @endforeach
          </div>

          <br>

          <div>
            <strong>@lang('labels.backend.access.product.sizes'):</strong>
            @if($product->detail->count())
              <a href="" data-id="{{ $product->id }}" data-toggle="modal" data-target="#newSize" class="btn btn-secondary active btn-sm float-right">@lang('labels.backend.access.product.add_size')</a>
            @endif
          </div>
          <div>
            @foreach ($product->sizes as $size) 
                {{ $loop->first ? '' : ', ' }}
                {{ $size->name }}
            @endforeach
          </div>


        </div>
        <div class="col-sm-6">
          <h6 class="mb-3"><strong>@lang('labels.backend.access.product.table.name'):</strong></h6>
          <div>
            {{ $product->name }}
          </div>

          <br>

          <div>
            <strong>@lang('labels.backend.access.product.table.general_code'):</strong>
          </div>
          <div>
           {{ $product->code }}
          </div>

          <br>

          <div>
            <strong>@lang('labels.backend.access.product.table.price'):</strong>
          </div>
          <div>
           ${{ number_format($product->price, 2, ".", ",") }}
          </div>
          <br>
          @if(!$product->color_size_product->count())
          <div>
            <a href="{{ route('admin.product.product.edit', $product->id) }}" data-toggle="tooltip" data-placement="top" title="{{ __('labels.backend.access.product.table.incomplete') }}" class="btn btn-danger active">@lang('labels.backend.access.product.table.incomplete')</a>
          </div>
          @endif
        </div>
      </div>

      @if($product->detail->count())
      <div class="table-responsive-sm">
        <table class="table table-striped">
        <thead>
          <tr>
            <th>@lang('labels.backend.access.sell.table.concept')</th>
            <th class="right">@lang('labels.backend.access.product.table.quantity')</th>
            <th class="right">@lang('labels.backend.access.product.table.movement')</th>
            <th class="right">@lang('labels.backend.access.product.table.generated_by')</th>
            <th class="right">@lang('labels.backend.access.product.table.created')</th>
          </tr>
        </thead>
          <tbody>
            @foreach($product->detail as $pro)
            <tr>
              <td class="left">@lang('labels.backend.access.product.table.amount_changed')</td>
              <td class="right">{{ $pro->quantity }}</td>
              <td class="right">De {{ $pro->old_quantity }} a {{ $pro->old_quantity+$pro->quantity }}</td>
              <td class="right">{{ $pro->generated_by->name }}</td>
              <td class="right">{{ $pro->created_at }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      @endif

    </div>
  </div>

  @if($product->color_size_product->count())
  <div class="card">
    <div class="card-header">
      <strong>@lang('labels.backend.access.product.details_products')</strong> 
   </div>
    <div class="card-body">

      <div class="table-responsive-sm">
        <table class="table table-striped">
        <thead>
          <tr>
            <th>@lang('labels.backend.access.product.table.specific_code')</th>
            <th class="right">@lang('labels.backend.access.product.table.color')</th>
            <th class="right">@lang('labels.backend.access.product.table.size')</th>
            <th class="right">@lang('labels.backend.access.product.table.stock')</th>
            <th class="right">@lang('labels.backend.access.product.table.price')</th>
            <th class="right">@lang('labels.backend.access.product.table.last_updated')</th>
            <th class="right">@lang('labels.general.actions')</th>
          </tr>
        </thead>
          <tbody>
            @foreach($product->color_size_product as $pro)
            <tr>
              <td class="left">{{ $pro->product_detail->code.''.substr(optional($pro->product_detail_color)->name, 0, 2).''.substr(optional($pro->product_detail_size)->name, 0, 2) }}</td>
              <td class="right">{{ optional($pro->product_detail_color)->name }}</td>
              <td class="right">{{ optional($pro->product_detail_size)->name }}</td>
              <td class="right">{{ $pro->stock }}</td>
              <td class="right">${{ number_format($pro->price, 2, ".", ",") }}</td>
              <td class="right">{{ $pro->updated_at }}</td>
              <td class="right">
                <div class="btn-group" role="group" aria-label="_{{ _('labels.backend.access.users.user_actions') }}"> 
                  <a href="#" data-toggle="modal" data-placement="top" title="{{ __('buttons.general.crud.edit') }}" class="btn btn-primary" data-id="{{ $pro->id }}" data-myprice="{{ $pro->price }}" data-target="#editColor"><i class="fas fa-edit"></i></a>
                  <a href="#" data-toggle="modal" data-target="#stockModal" data-placement="top" data-product_id="{{ $pro->id }}" data-code="{{ $pro->code }}" data-stock="{{ $pro->stock }}" title="@lang('buttons.general.crud.edit')" class="btn btn-outline-info"><i class="fas fa-minus"></i>  <i class="fas fa-plus"></i></a>
                </div>                
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
     
    </div>
  </div>
 @endif

</div>


<!-- Modal -->
<div class="modal fade" id="editColor" tabindex="-1" role="dialog" aria-labelledby="createTagLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createTagLabel">@lang('labels.backend.access.product.edit_price')</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

    <form autocomplete="off" method="POST" action="{{ route('admin.product.product.updateprice', 'test') }}">
        {{method_field('patch')}}
        {{ csrf_field() }}
      <div class="modal-body">
          <div class="form-group">

            <label for="price" class="col-form-label">@lang('labels.backend.access.product.table.price'):</label>
            <input type="hidden" name="id" id="id" value="">
            <input type="number" step="any" min="0" class="form-control" value="" name="price" id="price" required>
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


<!-- Modal payment -->
<div class="modal fade" id="stockModal" tabindex="-1" role="dialog" aria-labelledby="stockModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="stockModalLabel">@lang('labels.backend.access.payment.create') </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

    <form autocomplete="off" method="POST" action="{{ route('admin.product.product.addstockindividual', 'test') }}">
       @csrf
      <div class="modal-body">
        <input type="hidden" name="id" id="id" value="">
          <div class="form-group row">
            <div class="col-md-12">
            <label for="name" class="col-form-label">@lang('labels.backend.access.product.table.actually_quantity'):</label>
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
                <input class="form-control" id="stock_" type="number" name="stock_">
                <span class="input-group-btn">
                    <button type="button" class="btn btn-outline-light text-info btn-number " data-type="plus" data-field="stock_">
                        <span class="fas fa-plus"></span>
                    </button>
                </span>
              </div>
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


<!-- Modal -->
<div class="modal fade" id="newColor" tabindex="-1" role="dialog" aria-labelledby="newColorLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newColorLabel">@lang('labels.backend.access.product.add_color')</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

    <form autocomplete="off" method="POST" action="{{ route('admin.product.product.addcolor', 'test') }}">
       @csrf
      <div class="modal-body">

          <input type="hidden" name="id" id="id" value="">
          
          <div class="form-group">
            <label for="color" class="col-form-label">@lang('labels.backend.access.product.table.color'):</label>
            <select type="text" style="width: 100% !important;" name="color" class="form-control" id="color">
            </select>
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


<!-- Modal -->
<div class="modal fade" id="newSize" tabindex="-1" role="dialog" aria-labelledby="newSizeLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newSizeLabel">@lang('labels.backend.access.product.add_size')</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

    <form autocomplete="off" method="POST" action="{{ route('admin.product.product.addsize', 'test') }}">
       @csrf
      <div class="modal-body">

          <input type="hidden" name="id" id="id" value="">
          
          <div class="form-group">
            <label for="size" class="col-form-label">@lang('labels.backend.access.product.table.size'):</label>
            <select type="text" style="width: 100% !important;" name="size" class="form-control" id="size">
            </select>
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
    $('#editColor').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var price = button.data('myprice')
      var id = button.data('id')
      var modal = $(this)


      modal.find('.modal-body #price').val(price)
      modal.find('.modal-body #id').val(id)
    });

    $('#stockModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var id = button.data('product_id')
      var code = button.data('code')
      var stock_ = button.data('stock')
      var modal = $(this)

      modal.find('.modal-body #id').val(id)
      modal.find('.modal-body #code').val(code)
      modal.find('.modal-body #stock').val(stock_)
      modal.find('.modal-title').text('@lang('labels.backend.access.product.add_quantity') - ' + code)
    });


    $('#newColor').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var id = button.data('id')
      var modal = $(this)

      modal.find('.modal-body #id').val(id)
    });

    $('#newSize').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var id = button.data('id')
      var modal = $(this)

      modal.find('.modal-body #id').val(id)
    });

</script>

<script>
$(document).ready(function() {
  $('#color').select2({
    placeholder: 'seleccione color',
    width: 'resolve',
    allowClear: true,
    ajax: {
          url: '{{ route('admin.product.color.select') }}',
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
      }
    });
});
</script>


<script>
$(document).ready(function() {
  $('#size').select2({
    placeholder: 'seleccione talla',
    width: 'resolve',
    allowClear: true,
    ajax: {
          url: '{{ route('admin.product.size.select') }}',
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
      }
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
@endpush