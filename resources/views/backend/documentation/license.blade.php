@extends('backend.documentation.layouts.app')

@section('title')
Licencia
@endsection

@section('breadcrumb')
	<li class="active">Licencia</li>
@endsection

@section('doc-wrapper')
        <div class="doc-wrapper">
            <div class="container">
                <div id="doc-header" class="doc-header text-center">
                    <h1 class="doc-title"><span aria-hidden="true" class="icon icon_gift"></span> Licencia</h1>
                    <div class="meta"><i class="fa fa-clock-o"></i> Última actualización: Junio 12, 2020</div>
                </div><!--//doc-header-->
                <div class="doc-body">
                    <div class="doc-content">
                        <div class="content-inner">
                            <section class="doc-section">
                                <h2 class="section-title">Licencia software</h2>
                                <div class="section-block">
                                    <div class="jumbotron text-center">
                                        <p>El marco de la aplicación es de código abierto con licencia bajo el <a href="https://opensource.org/licenses/MIT" target="_blank">MIT license</a>.</p>
                                    </div><!--//jumbotron-->
                                </div><!--//section-block-->
                            </section><!--//doc-section-->


                            <section class="doc-section">
                                <h2 class="section-title">CoreUI Licencia</h2>
                                <div class="section-block">
                                    <div class="jumbotron text-center">
                                        <p>MIT: <a href="https://github.com/coreui/coreui" target="_blank">https://github.com/coreui/coreui</a></p>
                                    </div><!--//jumbotron-->
                                </div><!--//section-block-->
                            </section><!--//doc-section-->


                            
                        </div><!--//content-inner-->
                    </div><!--//doc-content-->
                    <div class="doc-sidebar">
                        <nav id="doc-nav">
                            <ul id="doc-menu" class="nav doc-menu hidden-xs" data-spy="affix">
                                <li><a class="scrollto" href="#license">Licencia</a></li>
                            </ul><!--//doc-menu-->
                        </nav>
                    </div><!--//doc-sidebar-->
                </div><!--//doc-body-->              
            </div><!--//container-->
        </div><!--//doc-wrapper-->
@endsection