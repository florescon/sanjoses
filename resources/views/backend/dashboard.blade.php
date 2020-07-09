@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')

    <div class="container">
        @foreach($list as $lis)
          <div class="icon"><i class="pic fab {{ $lis }} fa-lg"></i></div>
        @endforeach
    </div>


    <div class="animated fadeIn">
      <div class="row">
        <div class="col-sm-6 col-lg-3">
          <div class="brand-card">
            <div class="brand-card-header bg-tumblr">
              <i class="nav-icon far fa-user-circle"></i>
              <div class="chart-wrapper">
                <canvas id="social-box-chart-1" height="90"></canvas>
              </div>
            </div>
            <div class="brand-card-body">
              <div>
                <div class="text-value">{{ $users }}</div>
                <div class="text-uppercase text-muted small">total</div>
              </div>
              <div>
                <div class="text-value"> @lang('menus.backend.sidebar.customers')</div>
                <div class="text-uppercase text-muted small">registrados</div>
              </div>
            </div>

            <a href="{{ route('admin.customer.index') }}" class="stretched-link"> </a>

          </div>
        </div>


        <div class="col-sm-6 col-lg-3">
          <div class="brand-card">
            <div class="brand-card-header bg-tumblr">
              <i class="nav-icon fas fa-cubes"></i>
              <div class="chart-wrapper">
                <canvas id="social-box-chart-1" height="90"></canvas>
              </div>
            </div>
            <div class="brand-card-body">
              <div>
                <div class="text-value">{{ $products }}</div>
                <div class="text-uppercase text-muted small">total</div>
              </div>
              <div>
                <div class="text-value"> @lang('labels.backend.access.product.products')</div>
                <div class="text-uppercase text-muted small">Combinaciones</div>
              </div>
            </div>
            <a href="{{ route('admin.product.productlist.index') }}" class="stretched-link"> </a>
          </div>
        </div>


        <div class="col-sm-6 col-lg-3">
          <div class="brand-card">
            <div class="brand-card-header bg-tumblr">
              <i class="nav-icon fas fa-cube"></i>
              <div class="chart-wrapper">
                <canvas id="social-box-chart-1" height="90"></canvas>
              </div>
            </div>
            <div class="brand-card-body">
              <div>
                <div class="text-value">{{ $parent_products }}</div>
                <div class="text-uppercase text-muted small">total</div>
              </div>
              <div>
                <div class="text-value"> @lang('labels.backend.access.product.products')</div>
                <div class="text-uppercase text-muted small">padre</div>
              </div>
            </div>

            <a href="{{ route('admin.product.product.index') }}" class="stretched-link"> </a>

          </div>
        </div>

        <div class="col-sm-6 col-lg-3">
          <div class="brand-card">
            <div class="brand-card-header bg-tumblr">
              <i class="nav-icon fa fa-fill-drip"></i>
              <div class="chart-wrapper">
                <canvas id="social-box-chart-1" height="90"></canvas>
              </div>
            </div>
            <div class="brand-card-body">
              <div>
                <div class="text-value">{{ $material }}</div>
                <div class="text-uppercase text-muted small">total</div>
              </div>
              <div>
                <div class="text-value"> Materia</div>
                <div class="text-uppercase text-muted small">prima</div>
              </div>
            </div>

            <a href="{{ route('admin.material.index') }}" class="stretched-link"> </a>

          </div>
        </div>

      </div>
    </div>
    
    <div id="app">
        <div class="row">
            <div class="col">
                {{-- <exam-component></exam-component> --}}
            </div><!--col-->
        </div><!--row-->
    </div>



    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header">
           <strong> {{ __('labels.backend.access.order.last_orders') }} </strong>

          <div class="float-right">
              <a href="{{ route('admin.order.process-') }}" data-toggle="tooltip" data-placement="top" title="{{ __('labels.backend.access.order.orders_in_process') }}" class="btn btn-info ml-1 btn-sm"> <i class="nav-icon fa fa-stream"></i> @lang('labels.backend.access.order.orders_in_process') </a>
          </div>

          </div><!--card-header-->

          <div class="card-body">


            @foreach($orders as $order)
            <div class="progress-group mb-4">
              <div class="progress-group-header">
                
                <div><a href="{{ route('admin.order.show', $order->id) }}" data-toggle="tooltip" data-placement="top" title="{{ __('labels.backend.access.sell.show_order') }}" class="btn btn-info btn-sm"> #{{ $order->id }} </a>  {{ !empty($order->user_id) ? $order->user->name : '-- No definido --' }} <code class="text-primary">  {{ $order->comment ? substr($order->comment, 0, 120) : '' }} </code> </div>
                <div class="ml-auto font-weight-bold"> {{ $order->latestStatus()->name.' | '.$order->latestStatus()->percentage }}%</div>
              </div>
              <div class="progress-group-bars">
                @foreach($order->status_bar  as $all_status)
                <div class="progress progress-xs">
                  <div class="progress-bar {{ $all_status->level_label_bar }}" role="progressbar" style="width: {{ $all_status->percentage }}%" aria-valuenow="56" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="{{ $all_status->name. ' '.$all_status->pivot->created_at }}"></div>
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
