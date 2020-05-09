@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.access.setting.management'))

@section('content')
<div class="container">
<div class="card">

    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('labels.backend.access.setting.management') }}
                </h4>
            </div><!--col-->

            <div class="col-sm-7">
				<div class="btn-toolbar float-right" role="toolbar" aria-label="@lang('labels.general.toolbar_btn_groups')">
				    <a href="#" data-toggle="modal" class="btn btn-success ml-1" title="@lang('labels.general.create_new')" data-target="#exampleModal"><i class="fas fa-plus-circle"></i></a>
				</div><!--btn-toolbar-->

            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>@lang('labels.backend.access.setting.table.key')</th>
                            <th>@lang('labels.backend.access.setting.table.value')</th>
                            <th>@lang('labels.backend.access.setting.table.created')</th>
                            <th>@lang('labels.backend.access.setting.table.last_updated')</th>
                            <th style="width:150px">@lang('labels.general.actions') </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($settings as $setting)
                            <tr>
                                <td>{{ $setting->key }}</td>
                                <td>{{ $setting->value }}</td>
                                <td>{{ $setting->created_at->diffForHumans() }}</td>
                                <td>{{ $setting->updated_at->diffForHumans() }}</td>
                                <td> 
                                <div class="btn-group" role="group" aria-label="_{{ _('labels.backend.access.users.user_actions') }}">

                                    <a href="#" data-toggle="modal" data-placement="top" title="{{ __('buttons.general.crud.edit') }}" class="btn btn-primary" data-id="{{ $setting->id }}" data-myname="{{ $setting->key }}" data-myvalue="{{ $setting->value }}" data-target="#editSetting"><i class="fas fa-edit"></i></a>

                                    <div class="btn-group btn-group-sm" role="group">
                                      <button id="userActions" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{ __('labels.general.more') }}
                                      </button>
                                      <div class="dropdown-menu" aria-labelledby="userActions">
                                        <a href="{{ route('admin.setting.general.destroy', $setting->id) }}"
                                         data-method="delete"
                                         data-trans-button-cancel="{{ __('buttons.general.cancel') }}"
                                         data-trans-button-confirm="{{ __('buttons.general.crud.delete') }}"
                                         data-trans-title="{{ __('strings.backend.general.are_you_sure') }}"
                                         class="dropdown-item">{{ __('buttons.general.crud.delete') }}</a>
                                      </div>
                                    </div>
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
                    {!! $settings->total() !!} {{ trans_choice('labels.backend.access.setting.table.total', $settings->total()) }}
                </div>
            </div><!--col-->

            <div class="col-5">
                <div class="float-right">
                    {{ $settings->links() }}
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
        <h5 class="modal-title" id="exampleModalLabel">@lang('labels.backend.access.setting.create')</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

    <form autocomplete="off" method="POST" action="{{ route('admin.setting.general.store') }}">
       @csrf
      <div class="modal-body">
          <div class="form-group">
            <label for="key" class="col-form-label">@lang('labels.backend.access.setting.table.key'):</label>
            <input type="text" class="form-control" name="key" id="key" required>
          </div>
          <div class="form-group">
            <label for="value" class="col-form-label">@lang('labels.backend.access.setting.table.value'):</label>
            <input type="text" class="form-control" name="value" id="value" required>
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
        <h5 class="modal-title" id="editSettingLabel">@lang('labels.backend.access.setting.edit')</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

    <form autocomplete="off" method="POST" action="{{ route('admin.setting.general.update', 'test') }}">
        {{method_field('patch')}}
        @csrf
      <div class="modal-body">
          <div class="form-group">
            <label for="key" class="col-form-label">@lang('labels.backend.access.setting.table.key'):</label>
            <input type="hidden" name="id" id="id" value="">
            <input type="text" class="form-control" value="" name="key" id="key" required>
          </div>
         <div class="form-group">
            <label for="value" class="col-form-label">@lang('labels.backend.access.setting.table.value'):</label>
            <input type="text" class="form-control" value="" name="value" id="value" required>
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
      var value = button.data('myvalue')
      var id = button.data('id')
      var modal = $(this)


      modal.find('.modal-body #key').val(name)
      modal.find('.modal-body #value').val(value)
      modal.find('.modal-body #id').val(id)
    })
</script>
@endpush