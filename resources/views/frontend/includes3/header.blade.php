        <!-- Navigation
		================================================== -->
				
        <div class="navigation-wrap cbp-af-header header-transparent">
            <div class="padding-on-scroll">
				<div class="section-1400">
					<div class="container-fluid">
						<div class="row">
							<div class="col-12">
								<nav class="navbar navbar-expand-xl navbar-light">

									<a class="navbar-brand animsition-link" href="{{ url('/') }}"><img src="{{ asset('/porto/assets/images/logo22.png') }}"
											alt="logo"></a>

									<button class="navbar-toggler" type="button" data-toggle="collapse"
										data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
										aria-expanded="false" aria-label="Toggle navigation">
										<span class="navbar-toggler-icon"></span>
									</button>

									<div class="collapse navbar-collapse" id="navbarSupportedContent">
										<ul class="navbar-nav mr-xl-4 ml-auto pt-4 pt-xl-0">
											<li class="nav-item">
												<a class="nav-link" role="button" aria-haspopup="true" aria-expanded="false" href="{{ url('/') }}">@lang('labels.general.home')</a>
											</li>
											@guest
											<li class="nav-item">
												<a class="nav-link" role="button" aria-haspopup="true" aria-expanded="false" href="{{ route('frontend.auth.login') }}">@lang('navs.frontend.login')</a>
											</li>
											@endguest
											<li class="nav-item">
												<a class="nav-link" role="button" aria-haspopup="true" aria-expanded="false" href="{{ route('frontend.contact') }}">@lang('navs.frontend.contact')</a>
											</li>

				                            @can('ver panel')
											<li class="nav-item">
												<a class="nav-link" role="button" aria-haspopup="true" aria-expanded="false" href="{{ route('admin.dashboard') }}">@lang('navs.frontend.user.administration')</a>
											</li>
				                            @endcan


		                                    @auth
											<li class="nav-item">
												<a class="nav-link" role="button" aria-haspopup="true" aria-expanded="false" href="{{ route('frontend.auth.logout') }}">@lang('navs.general.logout')</a>
											</li>

		                                    @endauth


										</ul>

										<a href="#"
											class="btn btn-icon-transparent btn-44 mt-4 mt-xl-0">
											<i class="uil uil-heart size-20"></i>
										</a>
										<a href="#"
											class="btn btn-icon-transparent btn-44 mt-4 mt-xl-0 position-relative" data-toggle="modal" data-target="#modalCart">
											<i class="uil uil-cart size-20"></i>
											<span class="btn-small-icon bg-primary color-white">7</span>
										</a>
										<a href="#"
											class="btn btn-icon-transparent btn-44 mt-4 mt-xl-0" data-toggle="modal" data-target="#modalSearch">
											<i class="uil uil-search size-20"></i>
										</a>
										<div class="pb-3 pb-xl-0"></div>
									</div>

								</nav>
							</div>
						</div>
					</div>
				</div>
            </div>
        </div>
		
