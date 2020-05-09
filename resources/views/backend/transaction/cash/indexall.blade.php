@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.access.cash_out.management'))

@section('content')

<div class="card">

    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('labels.backend.access.cash_out.management') }}
                </h4>
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table table-striped data-table">
                        <thead>
                        <tr>
                            <th>Folio</th>
                            <th>@lang('labels.backend.access.cash_out.table.cash_out_initial')</th>
                            <th>@lang('labels.backend.access.cash_out.table.cash_out_final')</th>
                            <th>@lang('labels.backend.access.cash_out.table.withdrawal')</th>
                            <th>@lang('labels.backend.access.cash_out.table.cash_out_remaining')</th>
                            <th>@lang('labels.backend.access.cash_out.table.last_updated')</th>
                            <th>@lang('labels.general.actions') </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cashout as $cash)
                            <tr>
                                <td>#{{ $cash->id }}</td>
                                <td>${{ number_format($cash->initial, 2, ".", ",") }}</td>
                                <td>${{ number_format($cash->final, 2, ".", ",") }}</td>
                                <td>-${{ number_format($cash->withdraw, 2, ".", ",") }}</td>
                                <td>${{ number_format($cash->withdraw_final, 2, ".", ",") }}</td>
                                <td>{{ $cash->updated_at }}</td>
                                <td> 
                                <div class="btn-group" role="group" aria-label="_{{ _('labels.backend.access.users.user_actions') }}">

                                    <a href="{{ route('admin.transaction.cash.show', $cash->id) }}" data-toggle="tooltip" data-placement="top" title="{{ __('buttons.general.crud.view') }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                     
                                    <a href="{{ route('admin.transaction.cash.generate', $cash->id) }}" data-toggle="tooltip" data-placement="top" title="{{ __('buttons.general.crud.print') }}" class="btn btn-warning" target="_blank"><i class="fas fa-print"></i></a>

                                    <a href="#" data-toggle="modal" data-placement="top" title="{{ __('buttons.general.crud.edit') }}" class="btn btn-secondary" data-id="{{ $cash->id }}" data-target="#withdrawModal">@lang('labels.backend.access.cash_out.table.withdrawal')</a>
                                    <a href="{{ route('admin.transaction.cash.destroy', $cash->id) }}" class="btn btn-danger" data-method="delete" data-trans-button-cancel="{{ __('buttons.general.cancel') }}" data-trans-button-confirm="{{ __('buttons.general.crud.delete') }}" data-trans-title="{{ __('strings.backend.general.are_you_sure') }}" class="dropdown-item">
                                      <i class="fas fa-eraser"></i>
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
                    {!! $cashout->total() !!} {{ trans_choice('labels.backend.access.cash_out.table.total', $cashout->total()) }}
                </div>
            </div><!--col-->

            <div class="col-5">
                <div class="float-right">
                    {{ $cashout->links() }}
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->


<!-- Modal -->
<div class="modal fade" id="withdrawModal" tabindex="-1" role="dialog" aria-labelledby="withdrawModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="withdrawModalLabel">@lang('labels.backend.access.cash_out.table.mount_withdrawal')</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

    <form autocomplete="off" method="POST" action="{{ route('admin.transaction.cash.withdraw', 'test') }}">
       {{method_field('patch')}}
       @csrf
      <div class="modal-body">
          <div class="form-group">
            <label for="withdraw" class="col-form-label">@lang('labels.backend.access.cash_out.table.withdrawal'):</label>
            <input type="hidden" name="id" id="id" value="">
            <input type="number" min="0" class="form-control" name="withdraw" id="withdraw" >
          </div>

            <div class="checkbox d-flex align-items-center">
                <label class="switch switch-label switch-pill switch-primary switch-sm">
                  <input class="switch-input" type="checkbox" value="1" name="checkbox" checked>
                  <span class="switch-slider" data-checked="&#x2713;" data-unchecked="&#x2715;"></span>
                </label>
                <label>&nbsp; Agregar a caja chica</label>
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
    $('#withdrawModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var id = button.data('id')
      var modal = $(this)

      modal.find('.modal-body #id').val(id)
    });

</script>
@endpush