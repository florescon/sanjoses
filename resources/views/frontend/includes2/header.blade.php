        <header class="header">
            <div class="header-top">
                <div class="container">
                    <div class="header-left header-dropdowns">

                        @if(config('locale.status') && count(config('locale.languages')) > 1)
                            <div class="header-dropdown">
                                <a href="#"><img src="{{ asset('/porto/assets/images/flags/'.strtoupper(app()->getLocale()).'.png') }}" alt="England flag">@lang('menus.language-picker.language') ({{ strtoupper(app()->getLocale()) }})</a>
                                <div class="header-menu">

                                    @include('includes.partials.lang2')

                                </div><!-- End .header-menu -->
                            </div><!-- End .header-dropown -->
                        @endif

                        <div class="dropdown compare-dropdown">

                            <div class="dropdown-menu" >
                                <div class="dropdownmenu-wrapper">
                                    <ul class="compare-products">
                                        <li class="product">
                                            <a href="#" class="btn-remove" title="Remove Product"><i class="icon-cancel"></i></a>
                                            <h4 class="product-title"><a href="product.html">Lady White Top</a></h4>
                                        </li>
                                        <li class="product">
                                            <a href="#" class="btn-remove" title="Remove Product"><i class="icon-cancel"></i></a>
                                            <h4 class="product-title"><a href="product.html">Blue Women Shirt</a></h4>
                                        </li>
                                    </ul>

                                    <div class="compare-actions">
                                        <a href="#" class="action-link">Clear All</a>
                                        <a href="#" class="btn btn-primary">Compare</a>
                                    </div>
                                </div><!-- End .dropdownmenu-wrapper -->
                            </div><!-- End .dropdown-menu -->
                        </div><!-- End .dropdown -->
                    </div><!-- End .header-left -->

                    <div class="header-right">
                        @auth
                            <p class="welcome-msg">@lang('labels.general.welcome')! </p>
                        @endauth
    
                        <div class="header-dropdown dropdown-expanded">
                            <a href="#">@lang('labels.general.links')</a>
                            <div class="header-menu">
                                <ul>
                                    @can('ver panel')
                                    <li ><a href="{{ route('admin.dashboard') }}">@lang('navs.frontend.user.administration')</a></li>
                                    @endcan
                                    <li><a href="{{ route('frontend.contact') }}">@lang('navs.frontend.contact')</a></li>

                                    @guest
                                    <li><a href="{{ route('frontend.auth.login') }}">@lang('navs.frontend.login')</a></li>
                                    @else 
                                    <li><a href="{{ route('frontend.user.dashboard') }}">@lang('navs.frontend.dashboard') </a></li>
                                    <li><a href="{{ route('frontend.user.account') }}">@lang('navs.frontend.user.account') </a></li>
                                    @endguest
                                    @auth
                                    <li><a href="{{ route('frontend.auth.logout') }}">@lang('navs.general.logout')</a></li>
                                    @endauth
                                </ul>
                            </div><!-- End .header-menu -->
                        </div><!-- End .header-dropown -->
                    </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div><!-- End .header-top -->

            <div class="header-middle">
                <div class="container">
                    <div class="header-left">
                        <a href="{{ url('/') }}" class="logo">
                            <img src="{{ asset('/porto/assets/images/logo22.png') }}" width="100px;" alt="San Jose Uniformes">
                        </a>
                    </div><!-- End .header-left -->

                    <div class="header-center">
                        <div class="header-search">
                            <a href="#" class="search-toggle" role="button"><i class="icon-magnifier"></i></a>
                            <form action="#" method="get">
                                <div class="header-search-wrapper">
                                    <input type="search" class="form-control" name="q" id="q" placeholder="@lang('labels.general.search')" required>
                                    <button class="btn" type="submit"><i class="icon-magnifier"></i></button>
                                </div><!-- End .header-search-wrapper -->
                            </form>
                        </div><!-- End .header-search -->
                    </div><!-- End .headeer-center -->

                    <div class="header-right">
                        <button class="mobile-menu-toggler" type="button">
                            <i class="icon-menu"></i>
                        </button>
                        <div class="header-contact">
                            <span>@lang('labels.general.call_us')</span>
                            <a href="tel:#"><strong>47 42 30 00</strong></a>
                        </div><!-- End .header-contact -->

                        <div class="dropdown cart-dropdown">
                            <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                                <span class="cart-count"></span>
                            </a>

                        </div><!-- End .dropdown -->
                    </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div><!-- End .header-middle -->

            <div class="header-bottom sticky-header">
                <div class="container">
                    <nav class="main-nav">
                        <ul class="menu sf-arrows">
                            <li class="active"><a href="{{ url('/') }}">@lang('labels.general.home')</a></li>
                            @can('ver panel')
                            <li class="float-right"><a href="{{ route('admin.dashboard')}}">@lang('navs.frontend.user.administration')</a></li>
                            @endcan
                        </ul>
                    </nav>
                </div><!-- End .header-bottom -->
            </div><!-- End .header-bottom -->
        </header><!-- End .header -->
