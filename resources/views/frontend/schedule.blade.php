@extends('frontend.layouts.app2')

@section('title', app_name() . ' | ' . __('labels.frontend.schedule.box_title'))

@section('content')

    <!-- Breadcrumb Area -->
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-contents">
                        <h2 class="page-title">@lang('labels.frontend.schedule.box_title')</h2>
                        <div class="breadcrumb">
                            <ul>
                                <li>
                                    <a href="#">@lang('navs.general.home')</a>
                                </li>
                                <li class="active">
                                    <a href="#">@lang('labels.frontend.schedule.box_title')</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div><!-- end .col-md-12 -->
            </div><!-- end .row -->
        </div><!-- end .container -->
    </section><!-- ends: .breadcrumb-area -->

    <section class="p-top-100 p-bottom-70 bgcolor">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="modules__content">
                        <div class="withdraw_module withdraw_history bg-white">
                            <div class="withdraw_table_header">
                                <h4>@lang('labels.frontend.schedule.our_schedule')</h4>
                            </div>
                            
    <div class="table-responsive">
        <table class="table withdraw__table">
            <thead>
            <tr>
                <th>@lang('labels.backend.access.cms_schedule.table.schedule')</th>
                <th>@lang('labels.backend.access.cms_schedule.table.mon')</th>
                <th>@lang('labels.backend.access.cms_schedule.table.tue')</th>
                <th>@lang('labels.backend.access.cms_schedule.table.wed')</th>
                <th>@lang('labels.backend.access.cms_schedule.table.thu')</th>
                <th>@lang('labels.backend.access.cms_schedule.table.fri')</th>
                <th>@lang('labels.backend.access.cms_schedule.table.sat')</th>
            </tr>
            </thead>

            <tbody>
            @foreach($calendar as $cal)
            <tr>
                <td class="paid">
                    <span>{{ $cal->schedule }}</span>
                </td>
                <td>{{ $cal->mon }}</td>
                <td>{{ $cal->tue }}</td>
                <td>{{ $cal->wed }}</td>
                <td>{{ $cal->thu }}</td>
                <td class="bold">{{ $cal->fri }}</td>
                <td>{{ $cal->sat }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>

                        </div>
                    </div>
                </div><!-- end .col-md-12 -->
            </div><!-- ends: .row -->
        </div><!-- ends: .container -->
    </section>



@endsection

