@extends('backend.documentation.layouts.app')

@section('title')
Preguntas frecuentes
@endsection

@section('breadcrumb')
	<li class="active">Preguntas frecuentes</li>
@endsection

@section('doc-wrapper')
        <div class="doc-wrapper">
            <div class="container">
                <div id="doc-header" class="doc-header text-center">
                    <h1 class="doc-title"><span aria-hidden="true" class="icon icon_lifesaver"></span> Preguntas frecuentes</h1>
                    <div class="meta"><i class="fa fa-clock-o"></i> Última actualización: Junio 12, 2020</div>
                </div><!--//doc-header-->
                <div class="doc-body">
                    <div class="doc-content">
                        <div class="content-inner">
                            <section id="products" class="doc-section">
                                <h2 class="section-title">Productos</h2>
                                <div class="section-block">
                                    <h3 class="question"><i class="fa fa-question-circle"></i> ¿Puedo registrar la materia prima de un producto y ajustar la variación de los consumos por talla?</h3>
                                    <div class="answer">Sí, es posible administrar en el apartado de 'Consumos de producto' para ajustar las cantidades por tallas previamente registradas.</div>
                                </div><!--//section-block-->

                                <div class="section-block">
                                    <h3 class="question"><i class="fa fa-question-circle"></i> ¿Cuál es la diferencia entre 'Lista de productos padre' y 'Lista de productos'?</h3>
                                    <div class="answer">Para crear un registro en 'Lista de productos' es necesario crear el producto padre, que a resumidas cuentas, la 'Lista de productos' son todas las combinaciones posibles de tallas y colores de un producto padre.</div>
                                </div><!--//section-block-->

                                <div class="section-block">
                                    <h3 class="question"><i class="fa fa-question-circle"></i> ¿Qué son los 'Consumos de producto'?</h3>
                                    <div class="answer">Es la materia prima que puede consumir un producto para poder generar el concentrado de consumos al momento de generar la orden, esto, generado de manera automática sólo con ajustar los cantidades de consumo previamente.</div>
                                </div><!--//section-block-->
                                <div class="section-block">
                                    <h3 class="question"><i class="fa fa-question-circle"></i> ¿Qué sucede cuando agrego una nueva talla y/o color al producto?</h3>
                                    <div class="answer">Se crea las combinaciones posibles en combinación una de otra, de talla y color, esto significa que si tengo tal cantidad de colores se multiplicará por la cantidad de tallas, e inversamente. Esto es generar todas las combinaciones posibles y serán agregadas a la 'Lista de productos'</div>
                                </div><!--//section-block-->
                            </section><!--//doc-section-->                                                       
                            <section id="raw_material" class="doc-section">
                                <h2 class="section-title">Materia prima</h2>
                                <div class="section-block">
                                    <h3 class="question"><i class="fa fa-question-circle"></i> ¿Cuál es la diferencia entre costo de adquisición y precio?</h3>
                                    <div class="answer">El precio es el costo en la que será agregado ya a los consumos del producto y el costo de adquisición es lo que ha costado tal materia prima.</div>
                                </div><!--//section-block-->
                                <div class="section-block">
                                    <h3 class="question"><i class="fa fa-question-circle"></i> ¿Puedo registrar una materia prima con múltiples colores y/o tallas?</h3>
                                    <div class="answer">No, cada materia prima con sus combinaciones es necesario hacerla de manera específica por color y/o talla, de manera individual, esto para que al momento de realizar los consumos del producto, se especifique de manera puntual qué materia prima realmente se requiere. Esto también es necesario porque cada materia prima tiene su código.</div>
                                </div><!--//section-block-->
                            </section><!--//doc-section-->                                                       
                            <section id="orders" class="doc-section">
                                <h2 class="section-title">Órdenes</h2>
                                <div class="section-block">
                                    <h3 class="question"><i class="fa fa-question-circle"></i> ¿Qué sucede con las órdenes?</h3>
                                    <div class="answer">Es el apartado donde puede tener los consumos del concentrado de materia de todos los productos incluidos. Se puede ver el estatus de la orden y cambiarla. Asignar personal a las cantidades de productos de cada estatus registrado. Agregar cantidades al stock principal, esto es lo que se ha producido en materia prima y servicios, se reintegra en producto al inventario.</div>
                                </div><!--//section-block-->
                                <div class="section-block">
                                    <h3 class="question"><i class="fa fa-question-circle"></i> ¿Puedo agregar o restar cantidades de la materia prima en la orden, e incluso agregar nuevas materias primas?</h3>
                                    <div class="answer">Sí, cuando existe ya la materia prima agregada al producto, y desde el estatus de producción, se puede ver el listado de materia prima donde agregas o restas cantidades (restar es sólo incluir el signo - antes de la cantidad). Si la materia prima no está en el listado y se desea agregar, es sólo buscarlo en el apartado 'Agregar materia prima a la orden' y colocar la cantidad. Estos movimientos se ven reflejados al inventario de materia prima.</div>
                                </div><!--//section-block-->
                            </section><!--//doc-section-->                                                       
                        </div><!--//content-inner-->
                    </div><!--//doc-content-->
                    <div class="doc-sidebar">
                        <nav id="doc-nav">
                            <ul id="doc-menu" class="nav doc-menu hidden-xs" data-spy="affix">
                                <li><a class="scrollto" href="#products">Productos</a></li>
                                <li><a class="scrollto" href="#raw_material">Materia prima</a></li>
                                <li><a class="scrollto" href="#orders">Órdenes</a></li>
                            </ul><!--//doc-menu-->
                        </nav>
                    </div><!--//doc-sidebar-->
                </div><!--//doc-body-->              
            </div><!--//container-->
        </div><!--//doc-wrapper-->
@endsection