@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.access.size.management'))

@section('content')
<div class="container">
<div class="card">

    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('labels.backend.access.size.management') }}
                </h4>
            </div><!--col-->

            <div class="col-sm-7">
        <div class="btn-toolbar float-right" role="toolbar" aria-label="@lang('labels.general.toolbar_btn_groups')">
            <a href="#" data-toggle="modal" class="btn btn-success ml-1" title="@lang('labels.general.create_new')" data-target="#createTag"><i class="fas fa-plus-circle"></i></a>
        </div><!--btn-toolbar-->

            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table table-striped data-table">
                        <thead>
                        <tr>
                            {{-- <th>@lang('labels.backend.access.size.table.id')</th> --}}
                            <th>@lang('labels.backend.access.size.table.name')</th>
                            <th>@lang('labels.backend.access.size.table.created')</th>
                            <th>@lang('labels.backend.access.size.table.last_updated')</th>
                            <th>@lang('labels.general.actions') </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($colors as $color)
                            <tr>
                                {{-- <td>{{ $color->id }}</td> --}}
                                <td>{{ $color->name }}</td>
                                <td>{{ $color->created_at->diffForHumans() }}</td>
                                <td>{{ $color->updated_at->diffForHumans() }}</td>
                                <td> 
                                  <div class="btn-group" role="group" aria-label="_{{ _('labels.backend.access.users.user_actions') }}">
                                    <span data-toggle="modal" data-id="{{ $color->id }}" data-myname="{{ $color->name }}" data-target="#editTag">
                                      <a href="#" data-toggle="tooltip" data-placement="top" title="{{ __('buttons.general.crud.edit') }}" class="btn btn-primary" ><i class="fas fa-edit"></i></a>
                                    </span>

                                      <a href="{{ route('admin.product.size.destroy', $color->id) }}" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="{{ __('buttons.general.crud.delete') }}" data-method="delete" data-trans-button-cancel="{{ __('buttons.general.cancel') }}" data-trans-button-confirm="{{ __('buttons.general.crud.delete') }}" data-trans-title="{{ __('strings.backend.general.are_you_sure') }}" class="dropdown-item">
                                        <i class="fas fa-trash"></i>
                                      </a>
                                  </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div><!--col-->
        </div><!--row-->
        <div class="row">
            <div class="col-7">
                <div class="float-left">
                    {!! $colors->total() !!} {{ trans_choice('labels.backend.access.size.table.total', $colors->total()) }}
                </div>
            </div><!--col-->

            <div class="col-5">
                <div class="float-right">
                    {{ $colors->links() }}
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->
</div>


<!-- Modal -->
<div class="modal fade" id="createTag" tabindex="-1" role="dialog" aria-labelledby="createTagLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createTagLabel">@lang('labels.backend.access.size.create')</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

    <form autocomplete="off" method="POST" action="{{ route('admin.product.size.store') }}">
       {{ csrf_field() }}
      <div class="modal-body">
          <div class="form-group">
            <label for="name" class="col-form-label">@lang('labels.backend.access.size.table.name'):</label>
            <input type="text" class="form-control" name="name" id="name" required>
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
<div class="modal fade" id="editTag" tabindex="-1" role="dialog" aria-labelledby="createTagLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createTagLabel">@lang('labels.backend.access.size.edit')</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

    <form autocomplete="off" method="POST" action="{{ route('admin.product.size.update', 'test') }}">
        {{method_field('patch')}}
        {{ csrf_field() }}
      <div class="modal-body">
          <div class="form-group">

            <label for="name" class="col-form-label">@lang('labels.backend.access.size.table.name'):</label>
            <input type="hidden" name="id" id="id" value="">
            <input type="text" class="form-control" value="" name="name" id="name" required>
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
    $('#editTag').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var name = button.data('myname')
      var id = button.data('id')
      var modal = $(this)


      modal.find('.modal-body #name').val(name)
      modal.find('.modal-body #id').val(id)
    });


</script>
@endpush


