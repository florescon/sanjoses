@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')

    <div class="container">
        @foreach($list as $lis)
          <div class="icon"><i class="pic fab {{ $lis }} fa-lg"></i></div>
        @endforeach
    </div>
    

    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header">
           <strong> {{ __('labels.backend.access.order.orders_in_process') }} </strong>


            <div class="float-right">
                <a href="{{ route('admin.dashboard') }}" data-toggle="tooltip" data-placement="top" title="{{ __('labels.general.back_dashboard') }}" class="btn btn-outline-light text-info btn-sm"> <i class="fas fa-long-arrow-alt-left"></i> @lang('labels.general.back')  </a>
            </div>

          </div><!--card-header-->

          <div class="card-body">


            @foreach($orders as $order)
            <div class="progress-group mb-4">
              <div class="progress-group-header">
                
                <div><a href="{{ route('admin.order.show', $order->id) }}" data-toggle="tooltip" data-placement="top" title="{{ __('labels.backend.access.sell.show_order') }}" class="btn btn-info btn-sm"> #{{ $order->id }} </a>  {{ !empty($order->user_id) ? $order->user->name : '-- No definido --' }} <code class="text-primary"> {{ $order->comment ? substr($order->comment, 0, 120) : '' }} </code> </div>
                <div class="ml-auto font-weight-bold">{{ $order->latestStatus()->name.' | '.$order->latestStatus()->percentage }}%</div>
              </div>
              <div class="progress-group-bars">
                @foreach($order->status_bar  as $all_status)
                <div class="progress progress-xs">
                  <div class="progress-bar {{ $all_status->level_label_bar }} progress-bar-striped progress-bar-animated" role="progressbar" style="width: {{ $all_status->percentage }}%" aria-valuenow="56" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="{{ $all_status->name. ' '.$all_status->pivot->created_at }}"></div>
                </div>
                @endforeach
              </div>
            </div>
            @endforeach

            <div class="row">
                <div class="col-7">
                    <div class="float-left">
                        {!! $orders->total() !!} {{ trans_choice('labels.backend.access.order.table.total_process', $orders->total()) }}
                    </div>
                </div><!--col-->

                <div class="col-5">
                    <div class="float-right">
                        {{ $orders->links() }} 
                        <p><small>Orden descendente</small></p>
                    </div>
                </div><!--col-->
            </div><!--row-->

          </div><!--card-body-->
        </div><!--card-->
      </div><!--col-->
    </div><!--row-->

@endsection
