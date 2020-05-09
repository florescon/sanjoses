@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.access.method.history'))

@section('content')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-sm-5">
                <strong>
                    {{ __('labels.backend.access.method.history') }}
                </strong>
                    <code style="text-transform:lowercase">
                      <button class="btn btn-brand btn-sm btn-dropbox">
                        <span>{{ $method->name }}</span>
                      </button>
                    </code>
            </div><!--col-->

            <div class="col-sm-7">
                <div class="btn-toolbar float-right" role="toolbar" aria-label="@lang('labels.general.toolbar_btn_groups')">
                    <a href="{{ route('admin.setting.method.index') }}" class="btn btn-light ml-1" title="@lang('labels.general.create_new')">@lang('labels.backend.access.method.return')</a>
                </div><!--btn-toolbar-->

            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->

<div class="row">
  <div class="col-md-12 mb-4">
    <ul class="nav nav-tabs" role="tablist">
      <li class="nav-item">
        <a class="nav-link @if (Request::query('page') === null || Request::query('page') == 'sales') active @endif" data-toggle="tab" href="#home4" role="tab" aria-controls="home">
          <i class="icon-calculator"></i> @lang('labels.backend.access.cash_out.table.sales')
          @if($sales->count())
              <span class="badge badge-success">{{ $sales->total() }}</span>
          @endif
        </a>
      </li>
      @if($method->id == 2)
      <li class="nav-item">
        <a class="nav-link @if (Request::query('page') == 'cards') active @endif" data-toggle="tab" href="#cards" role="tab" aria-controls="messages">
          <i class="icon-pie-chart"></i> @lang('labels.backend.access.cash_out.table.movements')
          @if($cards->count())
              <span class="badge badge-pill badge-info">{{ $cards->total() }}</span>
          @endif
        </a>
      </li>
      @endif
    </ul>
    <div class="tab-content">
      <div class="tab-pane @if (Request::query('page') === null || Request::query('page') == 'sales') active @endif" id="home4" role="tabpanel">
        <table class="table table-responsive-sm">
          <thead>
            <tr>
              <th>Folio</th>
              <th>@lang('labels.backend.access.cash_out.table.user')</th>
              <th>@lang('labels.backend.access.cash_out.table.show_text_ticket')</th>
              <th>Total</th>
              <th>Generado</th>
            </tr>
          </thead>
          <tbody>
            @foreach($sales as $sale)
            <tr>
              <td>
                <a href="{{ route('admin.inventory.sell.show', $sale->id) }}">#{{ $sale->id }}</a>
              </td>
              <td>
                @if($sale->user_id)
                  {{ optional($sale->user)->name }} 
                @else
                  <span class="badge badge-pill badge-secondary"> <em>No asignado</em></span>
                @endif
              </td>
              <td>
                @if(!empty($sale->ticket_text))
                  {{ $sale->ticket_text }}
                @else
                  <span class="badge badge-pill badge-secondary"> <em>No definido</em></span>
                @endif
              </td>
              <td>
                @php($total=0)
                @foreach($sale->products as $saleproduct)

                  @php($total+=$saleproduct->quantity*$saleproduct->product_detail->price)

                @endforeach
                ${{ number_format($total, 2, ".", ",") }}
              </td>
              <td>{{ Carbon::parse($sale->created_at)->format('d-m-Y h:i:s a') }}</td>
            </tr>
            @endforeach
            <tr>
          </tbody>
        </table>
        <div class="row">
            <div class="col-7">
                <div class="float-left">
                    {!! $sales->total() !!} {{ trans_choice('labels.backend.access.sell.table.total', $sales->total()) }} - <button class="btn btn-brand btn-sm btn-dropbox">{{ $method->name }}</button>
                </div>
            </div><!--col-->
        </div>
        <br>
        <div class="row">
            <div class="col-12">
                <div >
                    {{ $sales->appends(['page' => 'sales'])->links() }}
                </div>
            </div><!--col-->
        </div><!--row-->
      </div>
      @if($method->id == 2)
      <div class="tab-pane @if (Request::query('page') == 'cards') active @endif" id="cards" role="tabpanel">

      <div class="row">
        <div class="col-sm-6 col-lg-3">
          <div class="card text-white bg-success">
            <div class="card-body">
                <i class="nav-icon fa fa-dollar-sign float-right"></i>
              <div class="text-value">${{ number_format($method->total_sales, 2, ".", ",") }}</div>
              <div>Ventas</div>
            </div>
          </div>
        </div>
        <!-- /.col-->


      </div>

      <div class="row">
        <div class="col-sm-6 col-lg-3">
          <div class="card text-white bg-primary">
            <div class="card-body">
                <i class="fa fa-angle-double-up float-right"></i>
              <div class="text-value">${{ number_format($cardsincome, 2, ".", ",") }}</div>
              <div>Ingreso</div>
            </div>
          </div>
        </div>
        <!-- /.col-->

        <div class="col-sm-6 col-lg-3">
          <div class="card text-white bg-danger">
            <div class="card-body">
                <i class="fa fa-angle-double-down float-right"></i>
              <div class="text-value">${{ number_format($cardsexpense, 2, ".", ",") }}</div>
              <div>Gasto</div>
            </div>
          </div>
        </div>
        <!-- /.col-->

        @php($totalcard=0)
        @php($totalcard+=$method->total_sales+$method->total_payment+$cardsincome-$cardsexpense)
        <div class="col-sm-6 col-lg-3">
          <div class="card text-white bg-warning">
            <div class="card-body">
                <i class="fa fa-dollar-sign float-right"></i>
              <div class="text-value">${{ number_format($totalcard, 2, ".", ",") }}</div>
              <div>Cantidad actual</div>
            </div>
          </div>
        </div>
        <!-- /.col-->

      </div>



      <div class="float-right">
        {{-- <a class="btn btn-brand btn-sm btn-dropbox" href="{{ route('admin.setting.smallcard.store') }}">@lang('labels.backend.access.cash_out.table.add_movement')</a> --}}
          <div class="btn-toolbar float-right" role="toolbar" aria-label="@lang('labels.general.toolbar_btn_groups')">
              <a href="#" data-toggle="modal" class="btn btn-info ml-1" title="@lang('labels.general.create_new')" data-target="#createIncome"> @lang('labels.backend.access.cash_out.table.add_movement') </a>
          </div>

      </div>
      <br>
      <br>
        <table class="table table-responsive-sm">
          <thead>
            <tr>
              <th>Folio</th>
              <th>Concepto</th>
              <th>Monto</th>
              <th>Comentario</th>
              <th>Generado</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach($cards as $card)
            <tr>
              <td>#{{ $card->id }}</td>
              <td>{{ $card->name }}</td>
              <td>
                @if($card->type==1)
                  <div class="text-info">${{ number_format($card->amount, 2, ".", ",") }}</div>
                @else
                  <div class="text-danger">$-{{ number_format($card->amount, 2, ".", ",") }}</div>
                @endif
              </td>
              <td>
                @if(!empty($card->comment))
                  {{ $card->comment }}
                @else
                  <span class="badge badge-pill badge-secondary"> <em>No definido</em></span>
                @endif
              </td>
              <td>{{ $card->created_at }}</td>
              <td> 
                <div class="btn-group btn-group-sm" role="group">
                  <button id="userActions" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ __('labels.general.more') }}
                  </button>
                  <div class="dropdown-menu" aria-labelledby="userActions">
                    <a href="{{ route('admin.setting.smallcard.destroy', $card->id) }}"
                     data-method="delete"
                     data-trans-button-cancel="{{ __('buttons.general.cancel') }}"
                     data-trans-button-confirm="{{ __('buttons.general.crud.delete') }}"
                     data-trans-title="{{ __('strings.backend.general.are_you_sure') }}"
                     class="dropdown-item">{{ __('buttons.general.crud.delete') }}</a>
                  </div>
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>                
        <div class="row">
            <div class="col-7">
                <div class="float-left">
                    {!! $cards->total() !!} {{ trans_choice('labels.backend.access.smallbox.all_movements', $cards->total()) }} - <button class="btn btn-brand btn-sm btn-dropbox">{{ $method->name }}</button>
                </div>
            </div><!--col-->
        </div>
        <div class="row">
            <div class="col-5">
                <div class="float-left">
                    {{ $cards->appends(['page' => 'cards'])->links() }}
                </div>
            </div><!--col-->
        </div><!--row-->
      </div>
      @endif
    </div>
  </div>
  <!-- /.col-->
</div>
<!-- /.row-->


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

    <form autocomplete="off" method="POST" action="{{ route('admin.setting.smallcard.store') }}">
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
            <label class="btn btn-secondary active">
              <input type="radio" name="type" id="type" value="1" autocomplete="off" checked> @lang('labels.backend.access.smallbox.table.income')
            </label>
            <label class="btn btn-secondary">
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


@endsection
