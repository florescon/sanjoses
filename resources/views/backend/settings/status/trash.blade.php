@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.access.status.management_deleted'))

@section('content')
<div class="container">
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('labels.backend.access.status.management_deleted') }} {{-- <small class="text-muted">{{ __('labels.backend.access.status.text') }}</small> --}}
                </h4>
            </div><!--col-->

            <div class="col-sm-7">
              <div class="btn-toolbar float-right" role="toolbar" aria-label="@lang('labels.general.toolbar_btn_groups')">
                  <a href="{{ route('admin.setting.status.index') }}" data-toggle="tooltip" data-placement="top" title="{{ __('labels.backend.access.status.return_status') }}" class="btn btn-info ml-1" title="@lang('labels.general.create_new')" data-target="#">Regresar a todos los estatus <i class="fas fa-arrow-left"></i></a>
              </div>
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>@lang('labels.backend.access.status.table.name')</th>
                            <th>@lang('labels.backend.access.status.table.description')</th>
                            <th>@lang('labels.backend.access.status.table.level')</th>
                            <th>@lang('labels.backend.access.status.table.created')</th>
                            <th>@lang('labels.backend.access.status.table.last_updated')</th>
                            <th style="width:150px">@lang('labels.general.actions') </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($status as $setting)
                            <tr>
                                <td>{{ $setting->name }}</td>
                                <td><em>{{ $setting->description }}</em></td>
                                <td>{{ $setting->level }}</td>
                                <td>{{ $setting->created_at->diffForHumans() }}</td>
                                <td>{{ $setting->updated_at->diffForHumans() }}</td>
                                <td> 

                                <div class="btn-group" role="group" aria-label="_{{ _('labels.backend.access.users.user_actions') }}">

                                    <a href="{{ route('admin.setting.status.restore', $setting->id) }}" data-toggle="tooltip" data-placement="top" title="{{ __('buttons.general.crud.restore') }}" class="btn btn-primary" data-trans-button-cancel="{{ __('buttons.general.cancel') }}"  data-trans-button-confirm="{{ __('buttons.general.continue') }}" data-trans-title="{{ __('strings.backend.general.are_you_sure') }}" name="confirm_item" ><i class="fas fa-undo"></i></a>
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
                    {!! $status->total() !!} {{ trans_choice('labels.backend.access.status.table.total_deleted', $status->total()) }}
                </div>
            </div><!--col-->

            <div class="col-5">
                <div class="float-right">
                    {{ $status->links() }}
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">@lang('labels.backend.access.status.create')</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

    <form autocomplete="off" method="POST" action="{{ route('admin.setting.status.store') }}">
       @csrf
      <div class="modal-body">
          <div class="form-group">
            <label for="name" class="col-form-label">@lang('labels.backend.access.status.table.name'):</label>
            <input type="text" class="form-control" name="name" id="name" required>
          </div>
          <div class="form-group">
            <label for="description" class="col-form-label">@lang('labels.backend.access.status.table.description'):</label>
            <input type="text" class="form-control" name="description" id="description">
          </div>
          <div class="form-group">
            <label for="level" class="col-form-label">@lang('labels.backend.access.status.table.level'):</label>
            <input type="number" min="1" max="9" class="form-control" name="level" id="level" required>
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
<div class="modal fade" id="editSetting" tabindex="-1" role="dialog" aria-labelledby="editSettingLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editSettingLabel">@lang('labels.backend.access.status.edit')</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

    <form autocomplete="off" method="POST" action="{{ route('admin.setting.status.update', 'test') }}">
        {{method_field('patch')}}
        @csrf
      <div class="modal-body">
          <div class="form-group">
            <label for="name" class="col-form-label">@lang('labels.backend.access.status.table.name'):</label>
            <input type="hidden" name="id" id="id" value="">
            <input type="text" class="form-control" value="" name="name" id="name" required>
          </div>
          <div class="form-group">
            <label for="description" class="col-form-label">@lang('labels.backend.access.status.table.description'):</label>
            <input type="text" class="form-control" value="" name="description" id="description">
          </div>
         <div class="form-group">
            <label for="level" class="col-form-label">@lang('labels.backend.access.status.table.level'):</label>
            <input type="number" min="1" max="9" class="form-control" value="" name="level" id="level" required>
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
<div class="modal fade" id="editStatus2" tabindex="-1" role="dialog" aria-labelledby="editStatus2Label" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editStatus2Label">@lang('labels.backend.access.status.edit')</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

    <form autocomplete="off" method="POST" action="{{ route('admin.setting.status.update', 'test') }}">
        {{method_field('patch')}}
        @csrf
      <div class="modal-body">
          <input type="hidden" name="id" id="id" value="">
          <div class="form-group">
            <label for="description" class="col-form-label">@lang('labels.backend.access.status.table.description'):</label>
            <input type="text" class="form-control" value="" name="description" id="description">
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

</div>


@endsection


@push('after-scripts')
<script>
    $('#editSetting').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var name = button.data('myname')
      var description = button.data('mydescription')
      var level = button.data('myvalue')
      var id = button.data('id')
      var modal = $(this)


      modal.find('.modal-body #name').val(name)
      modal.find('.modal-body #description').val(description)
      modal.find('.modal-body #level').val(level)
      modal.find('.modal-body #id').val(id)
    })
</script>

<script>
    $('#editStatus2').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var name = button.data('myname')
      var description = button.data('mydescription')
      var level = button.data('myvalue')
      var id = button.data('id')
      var modal = $(this)


      modal.find('.modal-body #name').val(name)
      modal.find('.modal-body #description').val(description)
      modal.find('.modal-body #level').val(level)
      modal.find('.modal-body #id').val(id)
    })
</script>

@endpush