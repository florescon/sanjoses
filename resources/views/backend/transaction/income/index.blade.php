@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.access.income.management'))

@section('content')

<div class="card">

    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('labels.backend.access.income.management') }}
                </h4>
            </div><!--col-->

            <div class="col-sm-7">
				<div class="btn-toolbar float-right" role="toolbar" aria-label="@lang('labels.general.toolbar_btn_groups')">
				    <a href="#" data-toggle="modal" class="btn btn-success ml-1" title="@lang('labels.general.create_new')" data-target="#createIncome"><i class="fas fa-plus-circle"></i></a>
				</div><!--btn-toolbar-->

            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table table-striped data-table" style="width:100%">
                        <thead>
                        <tr>
                            <th>Folio</th>
                            <th>@lang('labels.backend.access.income.table.name')</th>
                            <th>@lang('labels.backend.access.income.table.mount')</th>
                            <th>@lang('labels.backend.access.income.table.comment')</th>
                            <th>@lang('labels.backend.access.income.table.created')</th>
                            <th>@lang('labels.backend.access.income.table.last_updated')</th>
                            <th>@lang('labels.general.actions') </th>
                        </tr>
                        </thead>
                        <tbody>
                        {{-- @foreach($incomes as $income)
                            <tr>
                                <td>#{{ $income->id }}</td>
                                <td>{{ $income->name }}</td>
                                <td>${{ $income->price }}</td>
                                <td>{{ $income->comment }}</td>
                                <td>{{ $income->created_at->diffForHumans() }}</td>
                                <td>{{ $income->updated_at->diffForHumans() }}</td>
                                <td> 
                                <div class="btn-group" role="group" aria-label="_{{ _('labels.backend.access.users.user_actions') }}">

                                    <a href="#" data-toggle="modal" data-placement="top" title="{{ __('buttons.general.crud.edit') }}" class="btn btn-primary" data-id="{{ $income->id }}" data-myname="{{ $income->name }}" data-myprice="{{ $income->price }}" data-mycomment="{{ $income->comment }}" data-target="#editIncome"><i class="fas fa-edit"></i></a>

                    								<a href="{{ route('admin.transaction.income.destroy', $income->id) }}" class="btn btn-danger" data-method="delete" data-trans-button-cancel="{{ __('buttons.general.cancel') }}" data-trans-button-confirm="{{ __('buttons.general.crud.delete') }}" data-trans-title="{{ __('strings.backend.general.are_you_sure') }}" class="dropdown-item">
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
                    {{-- {!! $incomes->total() !!} {{ trans_choice('labels.backend.access.income.table.total', $incomes->total()) }} --}}
                </div>
            </div><!--col-->

            <div class="col-5">
                <div class="float-right">
                    {{-- {{ $incomes->links() }} --}}
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->



<!-- Modal -->
<div class="modal fade" id="createIncome" tabindex="-1" role="dialog" aria-labelledby="createIncomeLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createIncomeLabel">@lang('labels.backend.access.income.create')</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

    <form autocomplete="off" method="POST" action="{{ route('admin.transaction.income.store') }}">
       @csrf
      <div class="modal-body">

          <div class="form-group">
            <label for="name" class="col-form-label">@lang('labels.backend.access.income.table.name')<sup>*</sup></label>
            <input type="text" class="form-control" name="name" id="name" required>
          </div>
          <div class="form-group">
            <label for="price" class="col-form-label">@lang('labels.backend.access.income.table.mount')<sup>*</sup></label>
            <input type="number" class="form-control" name="price" id="price" required>
          </div>
          <div class="form-group">
            <label for="name" class="col-form-label">@lang('labels.backend.access.income.table.comment'):</label>
            <textarea rows="2"  class="form-control" name="comment" id="comment"></textarea>
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
<div class="modal fade" id="editIncome" tabindex="-1" role="dialog" aria-labelledby="editIncomeLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editIncomeLabel">@lang('labels.backend.access.income.edit')</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

    <form autocomplete="off" method="POST" action="{{ route('admin.transaction.income.update', 'test') }}">
        {{method_field('patch')}}
        @csrf
      <div class="modal-body">
          
          <div class="form-group">
            <label for="name" class="col-form-label">@lang('labels.backend.access.income.table.name'):</label>
            <input type="hidden" name="id" id="id" value="">
            <input type="text" class="form-control" name="name" id="name" required>
          </div>
          <div class="form-group">
            <label for="price" class="col-form-label">@lang('labels.backend.access.income.table.mount'):</label>
            <input type="number" class="form-control" name="price" id="price" readonly>
          </div>
          <div class="form-group">
            <label for="name" class="col-form-label">@lang('labels.backend.access.income.table.comment'):</label>
            <textarea rows="2"  class="form-control" name="comment" id="comment"></textarea>
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
    $('#editIncome').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var name = button.data('myname')
      var price = button.data('myprice')
      var comment = button.data('mycomment')
      var id = button.data('id')
      var modal = $(this)


      modal.find('.modal-body #name').val(name)
      modal.find('.modal-body #price').val(price)
      modal.find('.modal-body #comment').val(comment)
      modal.find('.modal-body #id').val(id)
    });

    $(function () {
      var table = $('.data-table').DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        ajax: "{{ route('admin.transaction.income.index') }}",
        language: {
          "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
        },
        order: ['4', 'desc'], 
        columnDefs: [
            { // folio
                'targets': 0,
                'render': function (data, type, full_row, meta){
                      return '#'+ full_row.id;
                }
            },
            { // comment
                'targets': 3,
                'render': function (data, type, full_row, meta){
                    if(full_row.comment){
                      return full_row.comment;
                    } else {
                        return '<span class="badge badge-pill badge-secondary"> <em>No definido</em></span>';
                    }
                }
            }
        ],
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'price', name: 'price', render: $.fn.dataTable.render.number( ',', '.', 2, '$' )},
            {data: 'comment', name: 'comment'},
            {data: 'created_at', name: 'created_at'},
            {data: 'updated_at', name: 'updated_at'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
      });
    
    });

</script>
@endpush