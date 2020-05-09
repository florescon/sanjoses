@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.access.method.management'))

@section('content')
<div class="container">

<div class="card">

    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('labels.backend.access.method.management') }}
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
                            <th>@lang('labels.backend.access.method.table.name')</th>
                            <th>@lang('labels.backend.access.method.table.created')</th>
                            <th>@lang('labels.backend.access.method.table.last_updated')</th>
                            <th style="width:150px">@lang('labels.general.actions') </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sections as $method)
                            <tr>
                                <td><a class="btn btn-sm btn-outline-dark" href=" {{ route('admin.setting.method.show', $method->id) }}" role="button">{{ $method->name }}</a>
                                </td>
                                <td>{{ $method->created_at->diffForHumans() }}</td>
                                <td>{{ $method->updated_at->diffForHumans() }}</td>
                                <td> 
                                <div class="btn-group" role="group" aria-label="_{{ _('labels.backend.access.users.user_actions') }}">

                                    @if($method->id > 2)
                                    <a href="#" data-toggle="modal" data-placement="top" title="{{ __('buttons.general.crud.edit') }}" class="btn btn-primary" data-id="{{ $method->id }}" data-myname="{{ $method->name }}" data-target="#exampleModal2"><i class="fas fa-edit"></i></a>
                                    @endif

                                    @role('administrator')
                                    
                                    @if($method->id > 2)
                                    <div class="btn-group btn-group-sm" role="group">
                                      <button id="userActions" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{ __('labels.general.more') }}
                                      </button>
                                      <div class="dropdown-menu" aria-labelledby="userActions">
                                        <a href="{{ route('admin.setting.method.destroy', $method->id) }}"
                                         data-method="delete"
                                         data-trans-button-cancel="{{ __('buttons.general.cancel') }}"
                                         data-trans-button-confirm="{{ __('buttons.general.crud.delete') }}"
                                         data-trans-title="{{ __('strings.backend.general.are_you_sure') }}"
                                         class="dropdown-item">{{ __('buttons.general.crud.delete') }}</a>
                                      </div>
                                    </div>
                                    @endif

                                    @endrole
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
                    {!! $sections->total() !!} {{ trans_choice('labels.backend.access.method.table.total', $sections->total()) }}
                </div>
            </div><!--col-->

            <div class="col-5">
                <div class="float-right">
                    {{ $sections->links() }}
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
        <h5 class="modal-title" id="exampleModalLabel">@lang('labels.backend.access.method.create')</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

    <form autocomplete="off" method="POST" action="{{ route('admin.setting.method.store') }}">
       @csrf
      <div class="modal-body">
          <div class="form-group">
            <label for="name" class="col-form-label">@lang('labels.backend.access.method.table.name'):</label>
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
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">@lang('labels.backend.access.method.edit')</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

    <form autocomplete="off" method="POST" action="{{ route('admin.setting.method.update', 'test') }}">
        {{method_field('patch')}}
        @csrf
      <div class="modal-body">
          <div class="form-group">

            <label for="name" class="col-form-label">@lang('labels.backend.access.method.table.name'):</label>
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
</div>


@endsection


@push('after-scripts')
<script>
    $('#exampleModal2').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var name = button.data('myname')
      var id = button.data('id')
      var modal = $(this)


      modal.find('.modal-body #name').val(name)
      modal.find('.modal-body #id').val(id)
    })
</script>
@endpush