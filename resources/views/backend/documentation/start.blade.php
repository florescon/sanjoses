@extends('backend.documentation.layouts.app')

@section('title')
Inicio rapido
@endsection

@section('breadcrumb')
	<li class="active">Inicio rápido</li>
@endsection

@section('doc-wrapper')
	<div class="doc-wrapper">
		<div class="container">
			<div id="doc-header" class="doc-header text-center">
				<h1 class="doc-title"><i class="icon fa fa-paper-plane"></i> Inicio rápido</h1>
                <div class="meta"><i class="fa fa-clock-o"></i> Última actualización: Junio 12, 2020</div>
			</div><!--//doc-header-->
			<div class="doc-body">
				<div class="doc-content">
					<div class="content-inner">
						<section id="feature-section" class="doc-section">
							<h2 class="section-title">Características</h2>
							<div class="section-block">
								<p>La aplicación es realizada en base a las necesidades de San José Uniformes, para ello tomando las consideraciones de la relación del solicitante-desarrollador para llevar a cabo el proyecto con toda la conformidad.</p>

								<ul>
									<li>Generar órdenes, asociarlas con la producción si es un producto configurado para la explosión de materiales.</li>
									<li>Consultar estatus de la orden</li>
									<li>Configurar producto para la explosión de materiales</li>
									<li>Generación del a explosión de materiales, personalizable a cada producto</li>
									<li>Generar orden de maquila</li>
									<li>Almacén de materia prima y de producto terminado</li>
									<li>Inventario con stock dinámico</li>
									<li>Ingresos y egresos</li>
									<li>Generar reportes de ventas</li>
									<li>Historial de ventas por método de pago</li>
								</ul>
							</div>
						</section><!--//doc-section-->

						<section id="screenshots-section" class="doc-section">
							<h2 class="section-title">Capturas de pantalla</h2>
							<div class="section-block">
								<div class="row">
									<div class="col-md-6 col-sm-12 col-sm-12">
										<div class="screenshot-holder">
											<a href="{{ asset('/documentation/assets/images/6.0/create_product.png') }}" data-title="Crear producto" data-toggle="lightbox" class="hoverZoomLink"><img class="img-responsive" src="{{ asset('/documentation/assets/images/6.0/create_product.png') }}" alt="screenshot"></a>
											<a class="mask hoverZoomLink" href="{{ asset('/documentation/assets/images/6.0/create_product.png') }}" data-title="Crear producto" data-toggle="lightbox"><i class="icon fa fa-search-plus"></i></a>
										</div>
									</div>

									<div class="col-md-6 col-sm-12 col-sm-12">
										<div class="screenshot-holder">
											<a href="{{ asset('/documentation/assets/images/6.0/create_raw_material.png') }}" data-title="Crear materia prima" data-toggle="lightbox" class="hoverZoomLink"><img class="img-responsive" src="{{ asset('/documentation/assets/images/6.0/create_raw_material.png') }}" alt="screenshot"></a>
											<a class="mask hoverZoomLink" href="{{ asset('/documentation/assets/images/6.0/create_raw_material.png') }}" data-title="Crear materia prima" data-toggle="lightbox"><i class="icon fa fa-search-plus"></i></a>
										</div>
									</div>

									<div class="clearfix"></div>

									<div class="col-md-6 col-sm-12 col-sm-12">
										<div class="screenshot-holder">
											<a href="{{ asset('/documentation/assets/images/6.0/final_save_product.png') }}" data-title="Últimos ajustes de guardar producto" data-toggle="lightbox" class="hoverZoomLink"><img class="img-responsive" src="{{ asset('/documentation/assets/images/6.0/final_save_product.png') }}" alt="screenshot"></a>
											<a class="mask hoverZoomLink" href="{{ asset('/documentation/assets/images/6.0/final_save_product.png') }}" data-title="Últimos ajustes de guardar producto" data-toggle="lightbox"><i class="icon fa fa-search-plus"></i></a>
										</div>
									</div>

									<div class="col-md-6 col-sm-12 col-sm-12">
										<div class="screenshot-holder">
											<a href="{{ asset('/documentation/assets/images/6.0/add_material_select.png') }}" data-title="Agregar/restar materia prima a la orden" data-toggle="lightbox" class="hoverZoomLink"><img class="img-responsive" src="{{ asset('/documentation/assets/images/6.0/add_material_select.png') }}" alt="screenshot"></a>
											<a class="mask hoverZoomLink" href="{{ asset('/documentation/assets/images/6.0/add_material_select.png') }}" data-title="Agregar/restar materia prima a la orden" data-toggle="lightbox"><i class="icon fa fa-search-plus"></i></a>
										</div>
									</div>

									<div class="clearfix"></div>

									<div class="col-md-6 col-sm-12 col-sm-12">
										<div class="screenshot-holder">
											<a href="{{ asset('/documentation/assets/images/6.0/add_quantity_to_stock.png') }}" data-title="Agregar producto de la orden al stock principal" data-toggle="lightbox" class="hoverZoomLink"><img class="img-responsive" src="{{ asset('/documentation/assets/images/6.0/add_quantity_to_stock.png') }}" alt="screenshot"></a>
											<a class="mask hoverZoomLink" href="{{ asset('/documentation/assets/images/6.0/add_quantity_to_stock.png') }}" data-title="Agregar producto de la orden al stock principal" data-toggle="lightbox"><i class="icon fa fa-search-plus"></i></a>
										</div>
									</div>

									<div class="col-md-6 col-sm-12 col-sm-12">
										<div class="screenshot-holder">
											<a href="{{ asset('/documentation/assets/images/6.0/asign_staff.png') }}" data-title="Asignar productos al personal dentro de la orden" data-toggle="lightbox" class="hoverZoomLink"><img class="img-responsive" src="{{ asset('/documentation/assets/images/6.0/asign_staff.png') }}" alt="screenshot"></a>
											<a class="mask hoverZoomLink" href="{{ asset('/documentation/assets/images/6.0/asign_staff.png') }}" data-title="Asignar productos al personal dentro de la orden" data-toggle="lightbox"><i class="icon fa fa-search-plus"></i></a>
										</div>
									</div>

									<div class="clearfix"></div>

									<div class="col-md-6 col-sm-12 col-sm-12">
										<div class="screenshot-holder">
											<a href="{{ asset('/documentation/assets/images/6.0/show_asign_staff.png') }}" data-title="Mostar asignar productos al personal dentro de la orden" data-toggle="lightbox" class="hoverZoomLink"><img class="img-responsive" src="{{ asset('/documentation/assets/images/6.0/show_asign_staff.png') }}" alt="screenshot"></a>
											<a class="mask hoverZoomLink" href="{{ asset('/documentation/assets/images/6.0/show_asign_staff.png') }}" data-title="Mostar asignar productos al personal dentro de la orden" data-toggle="lightbox"><i class="icon fa fa-search-plus"></i></a>
										</div>
									</div>

									<div class="col-md-6 col-sm-12 col-sm-12">
										<div class="screenshot-holder">
											<a href="{{ asset('/documentation/assets/images/6.0/order_show.png') }}" data-title="Mostrar orden" data-toggle="lightbox" class="hoverZoomLink"><img class="img-responsive" src="{{ asset('/documentation/assets/images/6.0/order_show.png') }}" alt="screenshot"></a>
											<a class="mask hoverZoomLink" href="{{ asset('/documentation/assets/images/6.0/order_show.png') }}" data-title="Mostrar orden" data-toggle="lightbox"><i class="icon fa fa-search-plus"></i></a>
										</div>
									</div>

									<div class="clearfix"></div>
								</div>
							</div><!--//section-block-->
						</section><!--//doc-section-->


					</div><!--//content-inner-->
				</div><!--//doc-content-->
				<div class="doc-sidebar hidden-xs">
					<nav id="doc-nav">
						<ul id="doc-menu" class="nav doc-menu" data-spy="affix">
							<li><a class="scrollto" href="#feature-section">Características</a></li>
							<li><a class="scrollto" href="#screenshots-section">Capturas de pantalla</a></li>
						</ul><!--//doc-menu-->
					</nav>
				</div><!--//doc-sidebar-->
			</div><!--//doc-body-->
		</div><!--//container-->
	</div><!--//doc-wrapper-->

@endsection