@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.access.cash_out.management'))

@section('content')

  <div class="col-lg-12">
    <div class="card">
      <div class="card-header">
          <a href="{{ route('admin.transaction.cash.indexall') }}" class="btn btn-brand btn-spotify mb-1">
            <span>Ver todos los cortes</span>
          </a>
          <a href="{{ route('admin.transaction.cash.show', $cash->id) }}" class="btn btn-brand btn-facebook mb-1">
            <span>Todos los movimientos</span>
          </a>
          <a href="{{ route('admin.transaction.cash.showcash', $cash->id) }}" class="btn btn-brand btn-facebook mb-1">
            <span>Efectivo</span>
          </a>
      </div>
    </div>
  </div>

  <div class="col-md-12">
    <ul class="nav nav-tabs" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#sales" role="tab" aria-controls="sales">
          <i class="nav-icon fa fa-dollar-sign"></i> @lang('labels.backend.access.cash_out.table.sales')
          @if($sales->count())<span class="badge badge-success">{{ $sales->count() }}</span>@endif
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#inscriptions" role="tab" aria-controls="inscriptions">
          <i class="nav-icon fa fa-credit-card"></i> @lang('labels.backend.access.cash_out.table.inscriptions')
          @if($inscriptions->count())<span class="badge badge-pill badge-success">{{ $inscriptions->count() }}</span>@endif
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#payments" role="tab" aria-controls="payments">
          <i class="nav-icon fa fa-clipboard-list"></i> @lang('labels.backend.access.cash_out.table.monthly_payments')
          @if($payments->count())<span class="badge badge-pill badge-success">{{ $payments->count() }}</span>@endif
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#cashout" role="tab" aria-controls="cashout">
          <i class="nav-icon fa fa-cut"></i>
          <span class="badge badge-pill badge-warning">@lang('labels.backend.access.cash_out.show_details')</span>
        </a>
      </li>
    </ul>
    <div class="tab-content">
      <div class="tab-pane active" id="sales" role="tabpanel">
        <table class="table table-responsive-sm">
          <thead class="thead-dark">
            <tr>
              <th>Folio</th>
              <th>@lang('labels.backend.access.cash_out.table.user')</th>
              <th>@lang('labels.backend.access.cash_out.table.show_text_ticket')</th>
              <th>@lang('labels.backend.access.cash_out.table.payment')</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody>
            @php($totalsale=0)
            @foreach($sales as $sale)
            <tr class="table-primary">
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
                @if(isset($sale->ticket_text))
                  {{ $sale->ticket_text }}
                @else
                  <span class="badge badge-pill badge-secondary"> <em>No definido</em></span>
                @endif
              </td>
              <td>{{ optional($sale->payment)->name }}</td>
              <td>
                @php($total=0)
                @foreach($sale->products as $saleproduct)

                  @php($total+=$saleproduct->quantity*$saleproduct->product_detail->price)

                @endforeach
              ${{ $total }}
                </td>
            </tr>
            @php($totalsale+=$total)
            @endforeach

            <tr>
              <td></td>
              <td></td>
              <td></td>
              <th align="right">Total</th>
              <th><span class="badge badge-pill badge-success">${{ $totalsale }}</span></th>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="tab-pane" id="inscriptions" role="tabpanel">
        <table class="table table-responsive-sm">
          <thead class="thead-dark">
            <tr>
              <th>Folio</th>
              <th>@lang('labels.backend.access.cash_out.table.user')</th>
              <th>Comentario</th>
              <th>Pago</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody>
            @php($totalinscription=0)
            @foreach($inscriptions as $inscription)
            <tr class="table-primary">
              <td>#{{ $inscription->id }}</td>
              <td>{{ $inscription->user->name }}</td>
              <td>
                @if(!empty($inscription->comment))
                  {{ $inscription->comment }}
                @else
                  <span class="badge badge-pill badge-secondary"> <em>No definido</em></span>
                @endif
              </td>
              <td>
                @if(isset($inscription->payment_method_id))
                  {{ optional($inscription->payment_method)->name }}
                @else
                  <span class="badge badge-pill badge-secondary"> <em>No definido</em></span>
                @endif
              </td>
              <td>${{ $inscription->price }}</td>
            </tr>
            @php($totalinscription+=$inscription->price)
            @endforeach
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <th align="right">Total</th>
              <th><span class="badge badge-pill badge-success">${{ $totalinscription }}</span></th>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="tab-pane" id="payments" role="tabpanel">
        <table class="table table-responsive-sm">
          <thead class="thead-dark">
            <tr>
              <th>Folio</th>
              <th>@lang('labels.backend.access.cash_out.table.user')</th>
              <th>Comentario</th>
              <th>Pago</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody>
            @php($totalpayment=0)
            @foreach($payments as $payment)
            <tr class="table-primary">
              <td>#{{ $payment->id }}</td>
              <td>{{ $payment->user->name }}</td>
              <td>
                @if(isset($payment->comment))
                  {{ $payment->comment }}
                @else
                  <span class="badge badge-pill badge-secondary"> <em>No definido</em></span>
                @endif
              </td>
              <td>{{ optional($payment->payment_method)->name }}</td>
              <td>${{ $payment->price }}</td>
            </tr>
            @php($totalpayment+=$payment->price)
            @endforeach
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <th align="right">Total</th>
              <th><span class="badge badge-pill badge-success">${{ $totalpayment }}</span></th>
            </tr>
          </tbody>
        </table>        
      </div>
      <div class="tab-pane" id="cashout" role="tabpanel">
        <table class="table table-responsive-sm">
          <thead class="thead-dark">
            <tr>
              <th>@lang('labels.backend.access.cash_out.table.name')</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>@lang('labels.backend.access.cash_out.table.sales')</td>
              <td><span class="badge badge-pill badge-success">${{ $totalsale }}</span></td>
            </tr>
            <tr>
              <td>@lang('labels.backend.access.cash_out.table.inscriptions')</td>
              <td><span class="badge badge-pill badge-success">${{ $totalinscription }}</span></td>
            </tr>
            <tr>
              <td>@lang('labels.backend.access.cash_out.table.monthly_payments')</td>
              <td><span class="badge badge-pill badge-success">${{ $totalpayment }}</span></td>
            </tr>
            <tr>
              <th style="text-align: right;">Total</th>
              <th>
              @php($final=$totalsale+$totalinscription+$totalpayment)
              <input class="form-control col-sm-3" id="final" name="final" type="number" min="1" placeholder="Cantidad" value="{{ $final }}" readonly>

            </tr>
          </tbody>
        </table>
      </div>
    </div>


  </div>
  <!-- /.col-->


@endsection
