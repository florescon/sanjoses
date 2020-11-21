<!DOCTYPE html>
<!--[if IE 8]><html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]>
<!--><html class="no-js" lang="en"><!--<![endif]-->
@langrtl
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
@else
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@endlangrtl


<head>

	<!-- Basic Page Needs
	================================================== -->
	<meta charset="utf-8">
	<title>@yield('title', app_name())</title>
	<meta name="description"  content="" />
	<meta name="author" content="">
	<meta name="keywords"  content="" />
	<meta property="og:title" content="" />
	<meta property="og:type" content="" />
	<meta property="og:url" content="" />
	<meta property="og:image" content="" />
	<meta property="og:image:width" content="470" />
	<meta property="og:image:height" content="246" />
	<meta property="og:site_name" content="" />
	<meta property="og:description" content="" />
	<meta name="twitter:card" content="" />
	<meta name="twitter:site" content="" />
	<meta name="twitter:domain" content="" />
	<meta name="twitter:title" content="" />
	<meta name="twitter:description" content="" />
	<meta name="twitter:image" content="" />

	<!-- Mobile Specific Metas
	================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="theme-color" content="#212121"/>
    <meta name="msapplication-navbutton-color" content="#212121"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="#212121"/>
	

	@yield('meta')

	{{-- See https://laravel.com/docs/5.5/blade#stacks for usage --}}
	@stack('before-styles')

	<!-- CSS
	================================================== -->
	<link rel="stylesheet" href="{{ asset('/gaia/css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/gaia/css/animsition.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('/gaia/css/unicons.css') }}"/>
	<link rel="stylesheet" href="{{ asset('/gaia/css/lighbox.min.css') }}"/>
	<link rel="stylesheet" href="{{ asset('/gaia/css/tooltip.min.css') }}"/>
	<link rel="stylesheet" href="{{ asset('/gaia/css/swiper.min.css') }}"/>
	<link rel="stylesheet" href="{{ asset('/gaia/css/style.css') }}"/>
			
	<!-- Favicons
	================================================== -->
	<link rel="icon" type="image/png" href="favicon.png">
	<link rel="apple-touch-icon" href="apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="apple-touch-icon-114x114.png">
	
    @stack('after-styles')
	
</head>
<body>	

	<div class="animsition">
	

        @include('frontend.includes3.header')
		

			@yield('content')
		

		<!-- Modal Search -->
		
		<div class="modal fade modal-search" id="modalSearch" tabindex="-1" role="dialog" aria-labelledby="modalSearch" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content bg-dark-blue">
					<div class="modal-body z-bigger d-flex justify-content-center align-items-center">
						<div class="container-fluid">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<i class="uil uil-multiply"></i>
							</button>
							<div class="row justify-content-center">
								<div class="col-lg-8">
									<div class="form-group">
										<input type="text" class="form-style search" placeholder="Buscar..." autocomplete="off">
									</div>
									<p class="mb-0 mt-4 text-center color-gray-dark font-weight-500">Empieza a esciribr & presiona "Enter" o "ESC" para cerrar</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Primary Page Layout
		================================================== -->
		
		<!-- Filter button
		================================================== -->	
		
		<div class="blog-filter-button" data-toggle="modal" data-target="#modalFilters">
			<i class="uil uil-filter size-22"></i>
		</div>
		
		<!-- Modal filters -->
		
		<div class="modal fade modal-search" id="modalFilters" tabindex="-1" role="dialog" aria-labelledby="modalFilters" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content bg-blog-filter-light">
					<div class="modal-body z-bigger d-flex justify-content-center align-items-center">
						<div class="container-fluid">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<i class="uil uil-multiply"></i>
							</button>
							<div class="row">
								<div class="col-12 text-center filter-sorting">									
									<a href="#" class="btn btn-filter-tag light font-weight-800 mx-2 mx-xl-3 position-relative active" data-filter="*">todas las categorías <span class="btn-filter-icon bg-dark color-white">11</span></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		



        @include('frontend.includes3.footer')


	    <div class="progress-wrap">
			<svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
				<path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"/>
			</svg>
		</div>
		
	</div>




	
	<!-- JAVASCRIPT
    ================================================== -->

    @stack('before-scripts')

	<script src="{{ asset('/gaia/js/jquery.min.js') }}"></script>
	<script src="{{ asset('/gaia/js/popper.min.js') }}"></script> 
	<script src="{{ asset('/gaia/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('/gaia/js/plugins.js') }}"></script> 
	<script src="{{ asset('/gaia/js/custom.js') }}"></script> 

    @stack('after-scripts')

<!-- End Document
================================================== -->
</body>

</html>