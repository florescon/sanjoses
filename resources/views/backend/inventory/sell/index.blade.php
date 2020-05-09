@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.access.sell.management'))

@section('breadcrumb-links')
    @include('backend.inventory.sell.includes.breadcrumb-links')
@endsection


@section('content')

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('labels.backend.access.sell.management') }}
                </h4>
            </div><!--col-->

            <div class="col-sm-7">
				<div class="btn-toolbar float-right" role="toolbar" aria-label="@lang('labels.general.toolbar_btn_groups')">
				    <a href="{{ route('admin.inventory.sell.create') }}" class="btn btn-success ml-1" title="@lang('labels.general.create_new')"><i class="fas fa-plus-circle"></i></a>
				</div><!--btn-toolbar-->

            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table table-striped data-table">
                        <thead>
                        <tr>
                            <th>Folio</th>
                            <th>@lang('labels.backend.access.sell.user')</th>
                            <th>@lang('labels.backend.access.sell.payment_method')</th>
                            <th>@lang('labels.backend.access.sell.table.generated_by')</th>
                            <th>@lang('labels.backend.access.sell.table.created')</th>
                            <th>@lang('labels.general.actions') </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sales as $sale)
                            <tr>
                                <td>#{{ $sale->id }}</td>
                                <td>
                                @if(isset($sale->user_id))
                                  {{ optional($sale->user)->name }}
                                @else
                                  <span class="badge badge-pill badge-secondary"> <em>No definido</em></span>
                                @endif
                                </td>
                                <td>
                                  {{ optional($sale->payment)->name }}
                                </td>
                                <td>{{ $sale->generated_by->name }}</td>
                                <td>{{ $sale->created_at->diffForHumans() }}</td>
                                <td> 

                                <div class="btn-group" role="group" aria-label="{{ __('labels.backend.access.users.user_actions') }}">

                                <a href="{{ route('admin.inventory.sell.show', $sale->id) }}" data-toggle="tooltip" data-placement="top" title="{{ __('buttons.general.crud.view') }}" class="btn btn-info"><i class="fas fa-eye"></i></a>

                                <a href="{{ route('admin.inventory.sell.generate', $sale->id) }}" data-toggle="tooltip" data-placement="top" title="{{ __('buttons.general.crud.print') }}" class="btn btn-outline-info" target="_blank"><i class="fas fa-print"></i></a>

                                @role('administrator')
            							        <a href="{{ route('admin.inventory.sell.destroy', $sale->id) }}" class="btn btn-danger" data-method="delete" title="{{ __('buttons.general.crud.delete') }}" data-trans-button-cancel="{{ __('buttons.general.cancel') }}" data-trans-button-confirm="{{ __('buttons.general.crud.delete') }}" data-trans-title="{{ __('strings.backend.general.are_you_sure') }}">
            									     <i class="fas fa-eraser"></i>
                								  </a>
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
                    {!! $sales->total() !!} {{ trans_choice('labels.backend.access.sell.table.total', $sales->total()) }}
                </div>
            </div><!--col-->

            <div class="col-5">
                <div class="float-right">
                    {{ $sales->links() }}
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->

<!-- Modal -->
<div class="modal fade" id="view" tabindex="-1" role="dialog" aria-labelledby="viewLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="viewLabel">@lang('labels.backend.access.sell.view')</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

    <form autocomplete="off">
      <div class="modal-body">
        <input type="hidden" name="id" id="id" value="">
          <div class="form-group">
            <label for="name" class="col-form-label">@lang('labels.backend.access.sell.user'):</label>
            <input type="text" class="form-control" id="name" readonly required>
          </div>
          <div class="form-group">
            <label for="name" class="col-form-label">@lang('labels.backend.access.sell.payment_method'):</label>
            <input type="payment" class="form-control" id="payment" readonly required>
          </div>
          <div class="form-group">
            <label for="audi" class="col-form-label">@lang('labels.backend.access.sell.table.generated_by'):</label>
            <input type="text" class="form-control" value="" name="audi" id="audi" readonly required>
          </div>
          <hr>
          <hr>
          {{-- <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Larry</td>
                <td>the Bird</td>
                <td>@twitter</td>
              </tr>
            </tbody>
           </table>  --}}
        </div>     
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('labels.general.buttons.close')</button>
      </div>
    </form>

    </div>
  </div>
</div>
@endsection


@push('after-scripts')
<script>
    $('#view').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var name = button.data('myuser')
      var payment = button.data('mypayment')
      var audi = button.data('myaudi')
      var id = button.data('id')
      var modal = $(this)


      modal.find('.modal-body #audi').val(audi)
      modal.find('.modal-body #payment').val(payment)
      modal.find('.modal-body #name').val(name)
      modal.find('.modal-body #id').val(id)
    });
</script>
@endpush