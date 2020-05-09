@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.access.status.management'))

@section('content')
<div class="container">
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('labels.backend.access.status.management') }} <small class="text-muted">{{ __('labels.backend.access.status.text') }}</small>
                </h4>
            </div><!--col-->

            <div class="col-sm-7">
      				<div class="btn-toolbar float-right" role="toolbar" aria-label="@lang('labels.general.toolbar_btn_groups')">
      				    <span data-toggle="modal" data-target="#exampleModal">
                    <a href="#" data-toggle="tooltip" data-placement="top" title="{{ __('labels.general.create_new') }}" class="btn btn-success ml-1"><i class="fas fa-plus-circle"></i></a>
                  </span>
      				</div><!--btn-toolbar-->
              @if($status_deleted)
              <div class="btn-toolbar float-right" role="toolbar" aria-label="@lang('labels.general.toolbar_btn_groups')">
                  <a href="{{ route('admin.setting.status.trash') }}" data-toggle="tooltip" data-placement="top" title="{{ __('labels.backend.access.status.management_deleted') }}" class="btn btn-danger ml-1" >Eliminados <i class="fas fa-trash"></i></a>
              </div>
              @endif
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
                            <th>@lang('labels.backend.access.status.table.percentage_bar')</th>
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
                                <td>{{ $setting->percentage }}%</td>
                                <td>{{ $setting->updated_at->diffForHumans() }}</td>
                                <td> 

                                <div class="btn-group" role="group" aria-label="_{{ _('labels.backend.access.users.user_actions') }}">

                                    @if($setting->level > 0 && $setting->level < 10)
                                    <span data-toggle="modal" data-id="{{ $setting->id }}" data-myname="{{ $setting->name }}" data-mydescription="{{ $setting->description }}" data-myvalue="{{ $setting->level }}" data-mypercentage="{{ $setting->percentage }}" data-myto_add_users="{{ $setting->to_add_users }}" data-target="#editSetting">
                                      <a href="#" data-toggle="tooltip" data-placement="top" title="{{ __('buttons.general.crud.edit') }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                    </span>
                                    <div class="btn-group btn-group-sm" role="group">
                                      <button id="userActions" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{ __('labels.general.more') }}
                                      </button>
                                      <div class="dropdown-menu" aria-labelledby="userActions">
                                        <a href="{{ route('admin.setting.status.destroy', $setting->id) }}"
                                         data-method="delete"
                                         data-trans-button-cancel="{{ __('buttons.general.cancel') }}"
                                         data-trans-button-confirm="{{ __('buttons.general.crud.delete') }}"
                                         data-trans-title="{{ __('strings.backend.general.are_you_sure') }}"
                                         class="dropdown-item">{{ __('buttons.general.crud.delete') }}</a>
                                      </div>
                                    </div>
                                    @else
                                    <span data-toggle="modal" data-id="{{ $setting->id }}" data-myname="{{ $setting->name }}" data-mydescription="{{ $setting->description }}" data-myvalue="{{ $setting->level }}" data-target="#editStatus2">
                                      <a href="#" data-toggle="tooltip" data-placement="top" title="{{ __('buttons.general.crud.edit') }}" class="btn btn-primary" ><i class="fas fa-edit"></i></a>
                                    </span>
                                    @endif

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
                    {!! $status->total() !!} {{ trans_choice('labels.backend.access.status.table.total', $status->total()) }}
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
          <div class="form-group">
            <label for="percentage" class="col-form-label">@lang('labels.backend.access.status.table.percentage_bar'):</label>
            <input type="number" min="1" max="100" class="form-control" name="percentage" id="percentage" required>
          </div>
          <div class="checkbox d-flex align-items-center">
              <label class="switch switch-label switch-pill switch-primary switch-sm">
                <input class="switch-input" type="checkbox" value="1" name="to_add_users">
                <span class="switch-slider" data-checked="&#x2713;" data-unchecked="&#x2715;"></span>
              </label>
              <label>&nbsp; @lang('labels.backend.access.status.to_add_users')</label>
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
         <div class="form-group">
            <label for="percentage" class="col-form-label">@lang('labels.backend.access.status.table.percentage_bar'):</label>
            <input type="number" min="1" max="100" class="form-control" value="" name="percentage" id="percentage" required>
          </div>
          <div class="checkbox d-flex align-items-center">
              <label class="switch switch-label switch-pill switch-primary switch-sm">
                <input class="switch-input" type="checkbox" value="1" id="to_add_users" name="to_add_users">
                <span class="switch-slider" data-checked="&#x2713;" data-unchecked="&#x2715;"></span>
              </label>
              <label>&nbsp; @lang('labels.backend.access.status.to_add_users')</label>
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
      var percentage = button.data('mypercentage')
      var to_add_users = button.data('myto_add_users')
      var id = button.data('id')
      var modal = $(this)


      modal.find('.modal-body #name').val(name)
      modal.find('.modal-body #description').val(description)
      modal.find('.modal-body #level').val(level)
      modal.find('.modal-body #percentage').val(percentage)
      modal.find('.modal-body #to_add_users').val(to_add_users)
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