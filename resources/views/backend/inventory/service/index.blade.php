@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.access.service.management'))

@push('after-styles')

@endpush

@section('content')
<div class="container">
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('labels.backend.access.service.management') }}
                </h4>
            </div><!--col-->

            <div class="col-sm-7">
        <div class="btn-toolbar float-right" role="toolbar" aria-label="@lang('labels.general.toolbar_btn_groups')">

            <a href="#" data-toggle="modal" class="btn btn-success ml-1" title="@lang('labels.general.create_new')" data-target="#newService"><i class="fas fa-plus-circle"></i></a>
        </div><!--btn-toolbar-->

            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table table-striped data-table" style="width:100%">
                        <thead>
                        <tr>
                            <th>@lang('labels.backend.access.service.table.id')</th>
                            <th>@lang('labels.backend.access.service.table.name')</th>
  	                        <th>@lang('labels.backend.access.service.table.price')</th>
                            <th>@lang('labels.backend.access.service.table.created')</th>
                            <th>@lang('labels.backend.access.service.table.last_updated')</th>
                            <th>@lang('labels.general.actions') </th>
                        </tr>
                        </thead>
                        <tbody>
                        {{-- @foreach($services as $service)
                            <tr>
                                <td>{{ $service->name }}</td>
                                <td>${{ $service->price }}</td>
                                <td>{{ $service->created_at->diffForHumans() }}</td>
                                <td>{{ $service->updated_at->diffForHumans() }}</td>
                                <td> 
                                <div class="btn-group" role="group" aria-label="_{{ _('labels.backend.access.users.user_actions') }}">

                                    <a href="#" data-toggle="modal" data-placement="top" title="{{ __('buttons.general.crud.edit') }}" class="btn btn-primary" data-id="{{ $service->id }}" data-myname="{{ $service->name }}" data-myprice="{{ $service->price }}" data-target="#editService"><i class="fas fa-edit"></i></a>

                                    <a href="{{ route('admin.inventory.service.destroy', $service->id) }}" class="btn btn-danger" data-method="delete" data-trans-button-cancel="{{ __('buttons.general.cancel') }}" data-trans-button-confirm="{{ __('buttons.general.crud.delete') }}" data-trans-title="{{ __('strings.backend.general.are_you_sure') }}" class="dropdown-item">
                                      <i class="fas fa-eraser"></i>
                                    </a>
                                </div>
                                </td>
                            </tr>
                        @endforeach --}}
                        </tbody>
                    </table>
                </div>
            </div><!--col-->
        </div><!--row-->
        <div class="row">
            <div class="col-7">
                <div class="float-left">
                    {{-- {!! $services->total() !!} {{ trans_choice('labels.backend.access.service.table.total', $services->total()) }} --}}
                </div>
            </div><!--col-->

            <div class="col-5">
                <div class="float-right">
                    {{-- {{ $services->links() }} --}}
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->
</div>

<!-- Modal -->
<div class="modal fade" id="newService" tabindex="-1" role="dialog" aria-labelledby="newServiceLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newServiceLabel">@lang('labels.backend.access.service.create')</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

    <form autocomplete="off" method="POST" action="{{ route('admin.inventory.service.store') }}">
       @csrf
      <div class="modal-body">
          <div class="form-group">
            <label for="name" class="col-form-label">@lang('labels.backend.access.service.table.name'):</label>
            <input type="text" class="form-control" name="name" id="name" required>
          </div>
          <div class="form-group">
            <label for="name" class="col-form-label">@lang('labels.backend.access.service.table.price'):</label>
            <input type="number" step="any" class="form-control" name="price" id="price" required>
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
<div class="modal fade" id="editService" tabindex="-1" role="dialog" aria-labelledby="editServiceLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editServiceLabel">@lang('labels.backend.access.section.edit')</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

    <form autocomplete="off" method="POST" action="{{ route('admin.inventory.service.update', 'test') }}">
        {{method_field('patch')}}
        @csrf

      <div class="modal-body">
          <div class="form-group">
            <input type="hidden" name="id" id="id" value="">
            <label for="name" class="col-form-label">@lang('labels.backend.access.service.table.name'):</label>
            <input type="text" class="form-control" name="name" id="name" required>
          </div>
          <div class="form-group">
            <label for="name" class="col-form-label">@lang('labels.backend.access.service.table.price'):</label>
            <input type="number" class="form-control" name="price" id="price" required>
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
    $('#editService').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var name = button.data('myname')
      var price = button.data('myprice')
      var id = button.data('id')
      var modal = $(this)


      modal.find('.modal-body #name').val(name)
      modal.find('.modal-body #price').val(price)
      modal.find('.modal-body #id').val(id)
    });

    $(function () {
      var table = $('.data-table').DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        ajax: "{{ route('admin.inventory.service.index') }}",
        language: {
          "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
        },
        order: ['4', 'desc'], 
        columnDefs: [
            {
                "targets": [ 0 ],
                "visible": false,
                "searchable": false
            }        
        ],
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'price', name: 'price', render: $.fn.dataTable.render.number( ',', '.', 2, '$' )},
            {data: 'created_at', name: 'created_at'},
            {data: 'updated_at', name: 'updated_at'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
      });
    
    });


</script>

@endpush