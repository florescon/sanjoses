@extends('backend.documentation.layouts.app')

@section('title')
Documentación
@endsection

@section('breadcrumb')
	<li class="active">Documentación</li>
@endsection

@section('doc-wrapper')
	<div class="doc-wrapper">
		<div class="container">
			<div id="doc-header" class="doc-header text-center">
				<h1 class="doc-title"><span aria-hidden="true" class="icon icon_puzzle_alt"></span> Documentación</h1>
                <div class="meta"><i class="fa fa-clock-o"></i> Última actualización: Junio 23, 2020</div>
			</div><!--//doc-header-->
			<div class="doc-body">
				<div class="doc-content">
					<div class="content-inner">
						<section id="clients" class="doc-section">
							<h2 class="section-title">Clientes</h2>
							<div class="section-block">
								<p>Aquí encontrará a los usuarios registrados que sólo tienen el rol de usuario de cliente</p>

								<p>En este listado sólo encontrará a los clientes, ellos no tienen ningún privilegio en la aplicación, únicamente visualizar las órdenes asignadas a su usuario. Por defecto no tienen acceso al panel de administración.</p>

							</div><!--//section-block-->
						</section><!--//doc-section-->

						<section id="products" class="doc-section">
							<h2 class="section-title">Productos</h2>
							<div class="section-block">

								<p>Todos los productos tienen algún tipo de relación con otros datos, desde las tallas y colores, hasta valorde de uno a muchos en los cuales se encuentran la materia prima.</p>

								<p><strong>Nota:</strong> El desarrollo y todo lo que conlleva en términos generales un producto debe estar en producto padre, para poder tener esas combinaciones probables de las variaciones de productos de éste.</p>

								<p>Listado completo de los valores que es posible asociar a un producto:</p>

								<ul>
									<li>Colores y tallas</li>
									<li>Telas</li>
									<li>Líneas</li>
									<li>Materia prima para generar las órdenes</li>
								</ul>

								<p><em>"Todas las combinaciones posibles de un producto padre pueden ser consideradas como un producto independiente ya que cada cual se tiene con código único."</em></p>
							</div><!--//section-block-->
						</section><!--//doc-section-->
						<section id="sales" class="doc-section">
							<h2 class="section-title">Ventas</h2>
							<div class="section-block">

								<p>En las ventas se tiene para generar un ingreso de las cantidades de productos que se puedan vender. Esto sólo se considera si tenemos cantidades existentes y si el producto no se quiere generar un concentrado de materia prima, esto es, producirlo y/o agregar un servicio como sí lo permite las órdenes.</p>

							</div><!--//section-block-->
						</section><!--//doc-section-->


						<section id="orders" class="doc-section">
							<h2 class="section-title">Órdenes</h2>
							<div class="section-block">

								<p>Las órdenes se genera el concentrado de materia prima, se asignan las cantidades de productos de la orden al personal para un estatus, se integra los productos producidos y/o generados al inventario y venta directa.</p>

								<ul>
									<li><a class="scrollto" href="#CreateOrder">Crear orden</a></li>
									<li><a class="scrollto" href="#ManageOrder">Administrar orden</a></li>
								</ul>

								<div id="CreateOrder" class="section-block">
									<h3 class="block-title">Crear orden</h3>
									<p>El crear la orden implica que generará un consumo de materia prima, donde previamente se ajustó en el producto. </p>
									<p>A la orden es posible agregarle un comentario para darle seguimiento, al igual que un texto al ticket para entrega al cliente. </p>
								</div><!--//section-block-->

								<div id="ManageOrder" class="section-block">
									<h3 class="block-title">Administrar orden</h3>
									<p>En el apartado principal de la administración de órdenes, existe un listado donde directamente se puede visualizar a detallen cada orden, y al igual que poder cambiar en este listado el estatus 'a producción' o 'finalizar orden' sin ingresar propiamente a los detalles de la misma. El orden de este listado está dado por la fecha de creación.</p>

									<p>En las órdenes es posible:</p>

									<ul>
										<li>Mostrar el listado de los productos de la orden.</li>
										<li>Generar el concentrado de materia prima con el estatus mínimo de producción.</li>
										<li>Sumar y/o restar cantidades de materia prima o agregar un nueva a la orden ya creada.</li>
										<li>Asignar las cantidades al personal de cada uno de los estatus de la orden.</li>
										<li>Cambiar el estatus.</li>
										<li>Agregar cantidades al stock, esto es sumarlas al inventario principal.</li>
									</ul>


								</div><!--//section-block-->

							</div><!--//section-block-->
						</section><!--//doc-section-->


					</div><!--//content-inner-->
				</div><!--//doc-content-->

				<div class="doc-sidebar">
					<nav id="doc-nav">
						<ul id="doc-menu" class="nav doc-menu hidden-xs" data-spy="affix">
							<li><a class="scrollto" href="#clients">Clientes</a></li>
							<li><a class="scrollto" href="#products">Productos</a></li>
							<li><a class="scrollto" href="#sales">Ventas</a></li>
							<li><a class="scrollto" href="#orders">Órdenes</a></li>
						</ul><!--//doc-menu-->
					</nav>
				</div><!--//doc-sidebar-->
			</div><!--//doc-body-->
		</div><!--//container-->
	</div><!--//doc-wrapper-->

@endsection