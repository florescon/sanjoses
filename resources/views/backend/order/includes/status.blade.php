  @if($sale->latestStatus())
    <div class="col-sm-12 col-xl-4">
        <div class="card border-light">
        {{-- <hr> --}}
            @php($timelineValue = $sale->latestStatus())
            <div class="container py-2">
                <h3 class="font-weight-light text-center text-muted py-3">Estatus de la orden</h3>
                <!-- timeline item 2 -->
                @foreach($statuses->sortBy('level') as $status => $stat)
                  <div class="row">
                      <div class="col-auto text-center flex-column d-none d-sm-flex">
                          <div class="row h-50">
                              @if($stat->level != -1) <div class="col border-right">&nbsp;</div> @endif
                              <div class="col">&nbsp;</div>
                          </div>
                          <h5 class="m-2">
                              <span class="badge badge-pill {{ $timelineValue->id == $stat->id ? 'bg-success' : 'bg-light border' }}">&nbsp;</span>
                          </h5>
                          <div class="row h-50">
                              @if($stat->level != 20)<div class="col border-right">&nbsp;</div>@endif
                              <div class="col">&nbsp;</div>
                          </div>
                      </div>
                      <div class="col py-2">
                          <div class="card {{ $timelineValue->id == $stat->id ? 'border-success' : '' }} shadow">
                              <div class="card-body">
                                  <div class="float-right {{ $timelineValue->id == $stat->id ? 'text-dark' : 'text-muted' }}"> {{ $timelineValue->id == $stat->id ? $timelineValue->pivot->created_at : '' }} </div>
                                  <h4 class="card-title {{ $timelineValue->id == $stat->id ? 'text-success' : 'text-muted' }}">  {{ $stat->name }} </h4>
                                  <p class="card-text"> {{  $stat->description }} </p>
                                  @if($stat->to_add_users) 
                                  <p class="card-text"> 
                                      <h5><a href="{{ route('admin.order.addtostaff', [$sale->id , $stat->id]) }}"> <span class="badge badge-success">{{ __('labels.general.assign_staff') }}</span></a></h5> 
                                  </p>
                                  @endif 
                                  @if($stat->level == 10) 
                                  <p class="card-text"> 
                                      <h5><a href="{{ route('admin.order.addtorevisionstock', [$sale->id , $stat->id]) }}"> <span class="badge badge-info">Transferir productos</span></a></h5> 
                                  </p>
                                  @endif 
                                  @if($timelineValue->id == $stat->id)
                                  <button class="btn btn-sm btn-outline-dark" type="button" data-target="#t2_details" data-toggle="collapse">{!! $timelineValue->id == $stat->id ? '<i class="fa fa-cog fa-spin fa-fw"></i>' : '' !!} @lang('labels.backend.access.order.history_status') ▼</button> 

                                  <br>
                                  <br>
                                  <div class="collapse border" id="t2_details">
                                      <div class="p-2 text-monospace">
                                        @foreach($sale->status as $all_status)
                                          <div>{!! '<strong>'. $all_status->name.'</strong> | '.$all_status->pivot->created_at !!}</div>
                                        @endforeach
                                      </div>
                                  </div>
                                  @endif
                              </div>
                          </div>
                      </div>
                  </div>
                @endforeach
                <!--/row-->
            </div>
          {{-- <hr> --}}
        </div>
    </div>
  @endif
