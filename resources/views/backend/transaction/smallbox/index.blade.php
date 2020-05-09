@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.access.smallbox.management'))

@section('content')

<div class="row">
  <div class="col-sm-6 col-lg-3">
    <div class="card text-white bg-primary">
      <div class="card-body">
          <i class="fa fa-angle-double-up float-right"></i>
        <div class="text-value">${{ number_format($income, 2, ".", ",") }}</div>
        <div>Ingreso</div>
      </div>
    </div>
  </div>
  <!-- /.col-->

  <div class="col-sm-6 col-lg-3">
    <div class="card text-white bg-danger">
      <div class="card-body">
          <i class="fa fa-angle-double-down float-right"></i>
        <div class="text-value">${{ number_format($expenditure, 2, ".", ",") }}</div>
        <div>Gasto</div>
      </div>
    </div>
  </div>
  <!-- /.col-->

  <div class="col-sm-6 col-lg-3">
    <div class="card text-white bg-xing">
      <div class="card-body">
          <i class="fa fa-dollar-sign float-right"></i>
        <div class="text-value">${{ number_format($total, 2, ".", ",") }}</div>
        <div>Caja chica</div>
      </div>
    </div>
  </div>
  <!-- /.col-->
</div>


<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('labels.backend.access.smallbox.management') }}
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
                            <th>@lang('labels.backend.access.smallbox.table.name')</th>
                            <th>@lang('labels.backend.access.smallbox.table.amount')</th>
                            <th>@lang('labels.backend.access.smallbox.table.comment')</th>
                            <th>@lang('labels.backend.access.smallbox.table.created')</th>
                            <th>@lang('labels.general.actions') </th>
                        </tr>
                        </thead>
                        <tbody>
                        {{-- @foreach($smallbox as $small)
                            <tr>
                                <td>#{{ $small->id }}</td>
                                <td>{{ $small->name }}</td>
                                <td>
                                  @if($small->type==1)
                                    <div class="text-info">${{ number_format($small->amount, 2, ".", ",") }}</div>
                                  @else
                                    <div class="text-danger">$-{{ number_format($small->amount, 2, ".", ",") }}</div>
                                  @endif
                                </td>
                                <td>{{ $small->comment }}</td>
                                <td>{{ $small->created_at ? with(new Carbon($small->created_at))->format('d-m-Y H:i:s') : '' }}</td>
                                <td> 
                                <div class="btn-group" role="group" aria-label="_{{ _('labels.backend.access.users.user_actions') }}"> --}}

                                    {{-- <a href="#" data-toggle="modal" data-placement="top" title="{{ __('buttons.general.crud.edit') }}" class="btn btn-primary" data-id="{{ $small->id }}" data-myname="{{ $small->name }}" data-myamount="{{ $small->amount }}" data-mycomment="{{ $small->comment }}" data-target="#editIncome"><i class="fas fa-edit"></i></a> --}}

                    								{{-- <a href="{{ route('admin.transaction.small.destroy', $small->id) }}" class="btn btn-danger" data-method="delete" data-trans-button-cancel="{{ __('buttons.general.cancel') }}" data-trans-button-confirm="{{ __('buttons.general.crud.delete') }}" data-trans-title="{{ __('strings.backend.general.are_you_sure') }}" class="dropdown-item">
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
                    {{-- {!! $smallbox->total() !!} {{ trans_choice('labels.backend.access.smallbox.table.total', $smallbox->total()) }} --}}
                </div>
            </div><!--col-->

            <div class="col-5">
                <div class="float-right">
                    {{-- {{ $smallbox->links() }} --}}
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
        <h5 class="modal-title" id="createIncomeLabel">@lang('labels.backend.access.smallbox.create')</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

    <form autocomplete="off" method="POST" action="{{ route('admin.transaction.small.store') }}">
       @csrf
      <div class="modal-body">

          <div class="form-group">
            <label for="name" class="col-form-label">@lang('labels.backend.access.smallbox.table.name')<sup>*</sup></label>
            <input type="text" class="form-control" name="name" id="name" required>
          </div>
          <div class="form-group">
            <label for="amount" class="col-form-label">@lang('labels.backend.access.smallbox.table.amount')<sup>*</sup></label>
            <input type="number" class="form-control" name="amount" id="amount" required>
          </div>
          <div class="form-group">
            <label for="comment" class="col-form-label">@lang('labels.backend.access.smallbox.table.comment'):</label>
            <textarea rows="2"  class="form-control" name="comment" id="comment"></textarea>
          </div>

          <div class="btn-group btn-group-toggle" data-toggle="buttons">
            <label class="btn btn-outline-primary active">
              <input type="radio" name="type" id="type" value="1" autocomplete="off" checked> @lang('labels.backend.access.smallbox.table.income')
            </label>
            <label class="btn btn-outline-danger">
              <input type="radio" name="type" id="type" value="2" autocomplete="off"> @lang('labels.backend.access.smallbox.table.expenditure')
            </label>
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
        <h5 class="modal-title" id="editIncomeLabel">@lang('labels.backend.access.smallbox.edit')</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

    <form autocomplete="off" method="POST" action="{{ route('admin.transaction.small.update', 'test') }}">
        {{method_field('patch')}}
        @csrf
      <div class="modal-body">
          
          <div class="form-group">
            <label for="name" class="col-form-label">@lang('labels.backend.access.smallbox.table.name'):</label>
            <input type="hidden" name="id" id="id" value="">
            <input type="text" class="form-control" value="" name="name" id="name" required>
          </div>
          <div class="form-group">
            <label for="amount" class="col-form-label">@lang('labels.backend.access.smallbox.table.amount'):</label>
            <input type="number" class="form-control" value="" name="amount" id="amount" disabled>
          </div>
          <div class="form-group">
            <label for="comment" class="col-form-label">@lang('labels.backend.access.smallbox.table.comment'):</label>
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
      var amount = button.data('myamount')
      var comment = button.data('mycomment')
      var id = button.data('id')
      var modal = $(this)


      modal.find('.modal-body #name').val(name)
      modal.find('.modal-body #amount').val(amount)
      modal.find('.modal-body #comment').val(comment)
      modal.find('.modal-body #id').val(id)
    });


    $(function () {
    
      var table = $('.data-table').DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        ajax: "{{ route('admin.transaction.small.index') }}",
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
            { // mount
                'targets': 2,
                'render': function (data, type, full_row, meta){
                    if(full_row.type==1){
                      return '<div class="text-info">$'+ full_row.amount + '</div>';
                    } else if(full_row.type==2) {
                        return '<div class="text-danger">$'+ full_row.amount + '</div>';
                    }
                    else{
                     return full_row.amount + ' <div class="text-danger"> Monto no considerado </div>';
                    }
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
            {data: 'amount', name: 'amount'},
            {data: 'comment', name: 'comment'},
            {data: 'created_at', name: 'created_at'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
      });
    
    });



</script>
@endpush