@extends('backend.layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center ">
  <div class="col-sm-9 ">
    <div class="card was-validated">
      <div class="card-header">
        <strong>{{ $material->name }}</strong>
        <small>@lang('labels.backend.access.material.edit')</small>

      <div class="float-right">
          <a href="{{ route('admin.material.index') }}" data-toggle="tooltip" data-placement="top" title="{{ __('labels.backend.access.material.back_all_material') }}" class="btn btn-outline-light text-info btn-sm"> <i class="fas fa-long-arrow-alt-left"></i> @lang('labels.general.back')  </a>
      </div>


      </div>
      <form autocomplete="off" method="POST" action="{{ route('admin.material.update', ['id' => $material->id]) }}">
      {{method_field('patch')}}
      @csrf
      <div class="card-body">
        <div class="row">
          <div class="form-group required col-sm-6">
            <label for="part_number">@lang('labels.backend.access.material.table.part_number')</label>
            <input class="form-control is-invalid" id="part_number" name="part_number" type="text" value="{{ $material->part_number }}" required>
          </div>
          <div class="form-group required col-sm-6">
            <label for="name">@lang('labels.backend.access.material.table.name')</label>
            <input class="form-control is-invalid" id="name" name="name" type="text" value="{{ $material->name }}" required>
          </div>
        </div>
        <div class="row">
          <div class="form-group col-sm-6">
            <label for="description">@lang('labels.backend.access.material.table.description')</label>
            <input class="form-control is-invalid" id="description" name="description" type="text" value="{{ $material->description }}">
          </div>
          <div class="form-group required col-sm-6">
            <label for="acquisition_cost">@lang('labels.backend.access.material.table.acquisition_cost')</label>
            <input class="form-control is-invalid" id="acquisition_cost" name="acquisition_cost" type="text" value="{{ $material->acquisition_cost }}" required>
          </div>
        </div>
        <div class="row">
          <div class="form-group required col-sm-6">
            <label for="price">@lang('labels.backend.access.material.table.price')</label>
            <input class="form-control is-invalid" id="price" name="price" type="text" value="{{ $material->price }}" required>
          </div>
          <div class="form-group required col-sm-6">
            <label for="unit">@lang('labels.backend.access.material.table.unit')</label>
            <select type="text" style="width: 100% !important;" name="unit_id" class="form-control" id="unit" required>
                @if($material->unit)
                    <option value="{{ $material->unit->id }}"> {{ $material->unit->name }}</option>
                @endif
            </select>
          </div>
        </div>
        <div class="row">
          <div class="form-group col-sm-6">
            <label for="color">@lang('labels.backend.access.material.table.color')</label>
            <select type="text" style="width: 100% !important;" name="color_id" class="form-control" id="color">
                @if($material->color)
                    <option value="{{ $material->color->id }}"> {{ $material->color->name }}</option>
                @endif
            </select>
          </div>
          <div class="form-group col-sm-6">
            <label for="size">@lang('labels.backend.access.material.table.size')</label>
            <select type="text" style="width: 100% !important;" name="size_id" class="form-control" id="size">
                @if($material->size)
                    <option value="{{ $material->size->id }}"> {{ $material->size->name }}</option>
                @endif
            </select>
          </div>
        </div>
      </div>
      <div class="card-footer">
        <button class="btn btn-sm btn-primary" type="submit">
          <i class="fa fa-dot-circle-o"></i> Guardar</button>
      </div>
      </form>
    </div>
  </div>
</div>
@endsection

@push('after-scripts')
<script>
$(document).ready(function() {
  $('#unit').select2({
    placeholder: 'seleccione unidad',
    width: 'resolve',
    theme: 'classic',
    allowClear: true,
    ajax: {
          url: '{{ route('admin.product.unit.select') }}',
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
  $('#color').select2({
    placeholder: 'seleccione color',
    width: 'resolve',
    theme: 'classic',
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
  $('#size').select2({
    placeholder: 'seleccione talla',
    width: 'resolve',
    theme: 'classic',
    selectOnClose: true,
    allowClear: true,
    tags: true,
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
    }).on('select2:unselecting', function(e) {
        $(this).val('').trigger('change');
        // console.log('cleared '+$(this).val());
        e.preventDefault();
    });
});

</script>
@endpush