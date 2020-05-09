@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.access.expense.management'))

@section('content')

<div class="card">

    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('labels.backend.access.expense.management') }}
                </h4>
            </div><!--col-->

            <div class="col-sm-7">
              <div class="btn-toolbar float-right" role="toolbar" aria-label="@lang('labels.general.toolbar_btn_groups')">
                  <a href="#" data-toggle="modal" class="btn btn-success ml-1" title="@lang('labels.general.create_new')" data-target="#createExpense"><i class="fas fa-plus-circle"></i></a>
              </div><!--btn-toolbar-->
              {{-- <div class="btn-toolbar float-right" role="toolbar" aria-label="@lang('labels.general.toolbar_btn_groups')">
                  <a href="#" data-toggle="modal" class="btn btn-info ml-1" title="@lang('labels.general.create_new')" data-target="#">Categorias <i class="fas fa-eye"></i></a>
              </div> --}}<!--btn-toolbar-->

            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table table-striped data-table" style="width:100%">
                        <thead>
                        <tr>
                            <th>Folio</th>
                            <th>@lang('labels.backend.access.expense.table.name')</th>
                            <th>@lang('labels.backend.access.expense.table.mount')</th>
                            <th>@lang('labels.backend.access.expense.table.comment')</th>
                            <th>@lang('labels.backend.access.expense.table.user')</th>
                            <th>@lang('labels.backend.access.expense.table.created')</th>
                            <th>@lang('labels.general.actions') </th>
                        </tr>
                        </thead>
                        <tbody>
                        {{-- @foreach($expenses as $expense)
                            <tr>
                                <td>#{{ $expense->id }}</td>
                                <td>{{ $expense->name }}</td>
                                <td>${{ $expense->price }}</td>
                                <td>{{ $expense->comment }}</td>
                                <td>{{ $expense->created_at->diffForHumans() }}</td>
                                <td>{{ $expense->updated_at->diffForHumans() }}</td>
                                <td> 
                                <div class="btn-group" role="group" aria-label="_{{ _('labels.backend.access.users.user_actions') }}">

                                    <a href="#" data-toggle="modal" data-placement="top" title="{{ __('buttons.general.crud.edit') }}" class="btn btn-primary" data-id="{{ $expense->id }}" data-myname="{{ $expense->name }}" data-myprice="{{ $expense->price }}" data-mycomment="{{ $expense->comment }}" data-target="#editExpense"><i class="fas fa-edit"></i></a>

                                    <a href="{{ route('admin.transaction.expense.destroy', $expense->id) }}" class="btn btn-danger" data-method="delete" data-trans-button-cancel="{{ __('buttons.general.cancel') }}" data-trans-button-confirm="{{ __('buttons.general.crud.delete') }}" data-trans-title="{{ __('strings.backend.general.are_you_sure') }}" class="dropdown-item">
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
                    {{-- {!! $expenses->total() !!} {{ trans_choice('labels.backend.access.expense.table.total', $expenses->total()) }} --}}
                </div>
            </div><!--col-->

            <div class="col-5">
                <div class="float-right">
                    {{-- {{ $expenses->links() }} --}}
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->



<!-- Modal -->
<div class="modal fade" id="createExpense" tabindex="-1" role="dialog" aria-labelledby="createExpenseLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createExpenseLabel">@lang('labels.backend.access.expense.create')</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

    <form autocomplete="off" method="POST" action="{{ route('admin.transaction.expense.store') }}">
       @csrf
      <div class="modal-body">

          <div class="form-group">
            <label for="name" class="col-form-label">@lang('labels.backend.access.expense.table.name')<sup>*</sup></label>
            <input type="text" class="form-control" name="name" id="name" required>
          </div>
          <div class="form-group">
            <label for="price" class="col-form-label">@lang('labels.backend.access.expense.table.mount')<sup>*</sup></label>
            <input type="number" class="form-control" name="price" id="price" required>
          </div>
          <div class="form-group">
            <label for="user" class="col-form-label">@lang('labels.backend.access.expense.table.user'):</label>
           <select type="text" style="width: 100% !important;" name="user" class="col-form-label" id="user">
           </select>
          </div>
          <div class="form-group">
            <label for="comment" class="col-form-label">@lang('labels.backend.access.expense.table.comment'):</label>
            <textarea rows="2"  class="form-control" name="comment" id="comment"></textarea>
          </div>
          <div class="form-group">
            <label for="ticket_text" class="col-form-label">@lang('labels.backend.access.expense.table.text_ticket'):</label>
            <textarea rows="2"  class="form-control" name="ticket_text" id="ticket_text"></textarea>
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
<div class="modal fade" id="editExpense" tabindex="-1" role="dialog" aria-labelledby="editExpendeLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editExpendeLabel">@lang('labels.backend.access.expense.edit')</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

    <form autocomplete="off" method="POST" action="{{ route('admin.transaction.expense.update', 'test') }}">
        {{method_field('patch')}}
        @csrf
      <div class="modal-body">

          <div class="form-group">
            <label for="name" class="col-form-label">@lang('labels.backend.access.expense.table.name'):</label>
            <input type="hidden" name="id" id="id" value="">
            <input type="text" class="form-control" value="" name="name" id="name" required>
          </div>
          <div class="form-group">
            <label for="price" class="col-form-label">@lang('labels.backend.access.expense.table.mount'):</label>
            <input type="number" class="form-control" value="" name="price" id="price" readonly>
          </div>
          <div class="form-group">
            <label for="user" class="col-form-label">@lang('labels.backend.access.expense.table.user'):</label>
            <input type="number" class="form-control" value="" name="user" id="user" readonly>
          </div>
          <div class="form-group">
            <label for="comment" class="col-form-label">@lang('labels.backend.access.expense.table.comment'):</label>
            <textarea rows="2"  class="form-control" name="comment" id="comment"></textarea>
          </div>
          <div class="form-group">
            <label for="ticketext" class="col-form-label">@lang('labels.backend.access.expense.table.show_text_ticket'):</label>
            <textarea rows="2"  class="form-control" name="ticketext" id="ticketext"></textarea>
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
    $('#editExpense').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var name = button.data('myname')
      var price = button.data('myprice')
      var user = button.data('myuser')
      var comment = button.data('mycomment')
      var ticketext = button.data('myticketext')
      var id = button.data('id')
      var modal = $(this)


      modal.find('.modal-body #name').val(name)
      modal.find('.modal-body #price').val(price)
      modal.find('.modal-body #user').val(user)
      modal.find('.modal-body #comment').val(comment)
      modal.find('.modal-body #ticketext').val(ticketext)
      modal.find('.modal-body #id').val(id)
    });

    $(document).ready(function() {
        $('#user').select2({
          ajax: {
                url: '{{ route('admin.user.select') }}',
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
                                text: item.first_name + ' ' + item.last_name
                            };
                        }),
                        pagination: {
                            more: data.pagination
                        }
                    }
                },
                cache: true,
                delay: 250
            },
            placeholder: '@lang('labels.backend.access.sell.user')',
            width: 'resolve'
          });
    });

    $(function () {
      var table = $('.data-table').DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        ajax: "{{ route('admin.transaction.expense.index') }}",
        language: {
          "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
        },
        order: ['5', 'desc'], 
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
            {data: 'first_name', name: 'user.first_name'},
            {data: 'created_at', name: 'created_at'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
      });
    
    });

</script>
@endpush