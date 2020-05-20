@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.access.material.show_history'))

@section('content')

              <div class="row">
                <div class="col-sm-6 col-md-4">
                  <div class="card border-primary">
                    <div class="card-header">Materia prima</div>
                    <div class="card-body">
						{!! $materialhistory->material->full_name !!} <br>
						<strong>Fecha: </strong>  {!! ($materialhistory->created_at)->format('d-m-Y H:i:s') !!}                    	
                    </div>
                  </div>
                </div>
                <!-- /.col-->
                <div class="col-sm-6 col-md-4">
                  <div class="card border-secondary">
                    <div class="card-header">Cantidad</div>
                    <div class="card-body">
                    	<strong> Operación: </strong> {!! $materialhistory->quantity !!} <br>
                    	<strong> Anterior: </strong> {!! $materialhistory->old_quantity !!} <br>
                    	<strong> Actual: </strong> {!! $materialhistory->old_quantity + $materialhistory->quantity !!}
                    	
                    </div>
                  </div>
                </div>
                <!-- /.col-->
                <div class="col-sm-6 col-md-4">
                  <div class="card border-secondary">
                    <div class="card-header">Precio</div>
                    <div class="card-body">
                    	<strong> Precio ingresado: </strong> {!! $materialhistory->price_entered ?  $materialhistory->price_entered : '<span class="badge badge-pill badge-secondary"> <em>No asignado</em></span>' !!}<br>
                    	<strong> Precio actual: </strong> {!! $materialhistory->price_actual ? $materialhistory->price_actual : '<span class="badge badge-pill badge-secondary"> <em>No asignado</em></span>' !!}<br>
                    	<strong> Diferencia: </strong> {!! $materialhistory->price_entered - $materialhistory->price_actual !!}<br>
                    </div>
                  </div>
                </div>
                <!-- /.col-->
              </div>

@endsection

