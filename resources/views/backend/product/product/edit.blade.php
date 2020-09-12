@extends('backend.layouts.app')

@section('content')

    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="alert-heading"><i class="fas fa-exclamation-triangle"></i> ¡Atención!</h4>
            Guarde los datos preeliminares en la sección de la izquierda y modifique lo que se requiera, hasta al final guardar en la parte derecha y colocar las cantidades existentes<br/>
    </div>


<div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-header">
        <strong>{{ $product->name }}</strong>
        <small>
        @if ($product->type == 1)
            <span class="badge badge-success">@lang('labels.backend.access.product.product')</span>
        @else
            <span class="badge badge-info">Servicio</span>
        @endif
        </small>
      </div>
      <form autocomplete="off" method="POST" action="{{ route('admin.product.product.update', ['id' => $product->id]) }}">
      {{method_field('patch')}}
      @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="name">@lang('labels.backend.access.product.table.name')</label>
          <input class="form-control" name="name" id="name" value="{{ $product->name }}" type="text" placeholder="Nombre">
        </div>
        <div class="form-group">
          <label for="code">@lang('labels.backend.access.product.table.code')</label>
          <input class="form-control" name="code" id="code" value="{{ $product->code }}" type="text" placeholder="Codigo">
        </div>
        <div class="form-group">
          <label for="price">@lang('labels.backend.access.product.table.price')</label>
          <input class="form-control" name="price" id="price" value="{{ $product->price }}" type="number" step="any" placeholder="Precio">
        </div>
        <div class="form-group">
          <label for="colors_edit" class="col-form-label">@lang('labels.backend.access.product.colors'):</label>
          <select type="text" style="width: 100% !important;" multiple="multiple" name="colors_edit[]" class="form-control" id="colors_edit" required>
            @foreach($product->colors as $color)
                @if ($color)
                    <option value="{{ $color->id }}" selected>{{ $color->name }}</option>
                @endif
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="sizes_edit" class="col-form-label">@lang('labels.backend.access.product.sizes'):</label>
          <select type="text" style="width: 100% !important;" multiple="multiple" name="sizes_edit[]" class="form-control" id="sizes_edit" required>
            @foreach($product->sizes as $size)
                @if ($size)
                    <option value="{{ $size->id }}" selected>{{ $size->name }}</option>
                @endif
            @endforeach
          </select>
        </div>
      </div>

      <div class="card-footer">
        <button class="btn btn-sm btn-primary" type="submit">
          <i class="fa fa-dot-circle-o"></i> @lang('labels.general.buttons.save')</button>
        <button class="btn btn-sm btn-danger" type="reset">
          <i class="fa fa-ban"></i>  @lang('labels.general.buttons.reset')</button>
      </div>
      </form>

    </div>
  </div>

    @if($product->color_size_product->count()==0)
    <div class="col-lg-6 float-right">
      <div class="card">
        <div class="card-header">
            <i class="fa fa-align-justify"></i> @lang('labels.backend.access.product.possible_combinations')
        </div>
        <div class="card-body">
      <form autocomplete="off" method="POST" action="{{ route('admin.product.product.updateinitialstock', ['id' => $product->id]) }}">
      {{method_field('patch')}}
      @csrf

        @foreach($product->colors as $color)

            <table class="table table-responsive-sm table-sm table-bordered">
              <thead class="thead-dark">
                <tr>
                  <th>@lang('labels.backend.access.product.table.color'): {{$color->name}}</th>
                  <th width="25%">@lang('labels.backend.access.product.table.stock')</th>
                  <th width="25%">@lang('labels.backend.access.product.table.price')</th>
                </tr>
              </thead>
              <tbody>
              @foreach($product->sizes as $size)
              <input type="hidden" name="color_id[]" value="{{$color->id}}" >
              <input type="hidden" name="size_id[]" value="{{$size->id}}" >

                <tr>
                  <td>@lang('labels.backend.access.product.table.size'): {{ $size->name }} </td>
                  <td> 
                    <input class="form-control" name="stock_for[]" id="stock_for[]" step="any" type="number" placeholder="@lang('labels.backend.access.product.table.current_stock')"> 
                  </td>
                  <td> 
                    <input class="form-control" name="price_for[]" id="price_for[]" value="{{ $product->price }}" step="any" type="number" placeholder="@lang('labels.backend.access.product.table.price')"> 
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
        @endforeach
  
          <div class="card-footer">
            <button class="btn btn-sm btn-primary" type="submit">
              <i class="fa fa-dot-circle-o"></i> @lang('labels.backend.access.product.finish_saving_and_leaving')
            </button>
          </div>

        </form>
        </div>
      </div>
    </div>
    @endif

</div>
<!-- /.row-->

@endsection

@push('after-scripts')
<script>

$(document).ready(function() {
  $('#colors_edit').select2({
    placeholder: 'seleccione',
    multiple: true,
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

$(document).ready(function() {
  $('#sizes_edit').select2({
    placeholder: 'seleccione',
    multiple: true,
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

</script>
@endpush