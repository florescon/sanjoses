@extends('frontend.layouts.app2')

@section('content')
            <div class="container">
                <div class="container-box">
                    <div class="row">
                        <div class="col-lg-9">

                            {{-- <div class="product-single-tabs scrolling-box">
                                <div class="sticky-header" role="tablist">
                                    <ul class="nav nav-tabs container">
                                        <li class="nav-item">
                                            <a class="nav-link" id="product-tab-desc" href="#product-desc-content" data-toggle="tab">Description</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link active" id="product-tab-size" href="#product-size-content" data-toggle="tab">Size Guide</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="product-tab-tags" href="#product-tags-content" data-toggle="tab">Tags</a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="tab-pane" id="product-desc-content" role="tabpanel" aria-labelledby="product-tab-desc">
                                    <div class="product-desc-content">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat.</p>
                                        <ul>
                                            <li><i class="icon-ok"></i>Any Product types that You want - Simple, Configurable</li>
                                            <li><i class="icon-ok"></i>Downloadable/Digital Products, Virtual Products</li>
                                            <li><i class="icon-ok"></i>Inventory Management with Backordered items</li>
                                        </ul>
                                        <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, <br>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                                    </div><!-- End .product-desc-content -->
                                </div><!-- End .tab-pane -->
        
                                <div class="tab-pane" id="product-size-content" role="tabpanel" aria-labelledby="product-tab-size">
                                    <div class="product-size-content">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <img src="assets/images/products/single/body-shape.png" alt="body shape">
                                            </div><!-- End .col-md-4 -->
        
                                            <div class="col-md-8">
                                                <table class="table table-size">
                                                    <thead>
                                                        <tr>
                                                            <th>SIZE</th>
                                                            <th>CHEST (in.)</th>
                                                            <th>WAIST (in.)</th>
                                                            <th>HIPS (in.)</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>XS</td>
                                                            <td>34-36</td>
                                                            <td>27-29</td>
                                                            <td>34.5-36.5</td>
                                                        </tr>
                                                        <tr>
                                                            <td>S</td>
                                                            <td>36-38</td>
                                                            <td>29-31</td>
                                                            <td>36.5-38.5</td>
                                                        </tr>
                                                        <tr>
                                                            <td>M</td>
                                                            <td>38-40</td>
                                                            <td>31-33</td>
                                                            <td>38.5-40.5</td>
                                                        </tr>
                                                        <tr>
                                                            <td>L</td>
                                                            <td>40-42</td>
                                                            <td>33-36</td>
                                                            <td>40.5-43.5</td>
                                                        </tr>
                                                        <tr>
                                                            <td>XL</td>
                                                            <td>42-45</td>
                                                            <td>36-40</td>
                                                            <td>43.5-47.5</td>
                                                        </tr>
                                                        <tr>
                                                            <td>XLL</td>
                                                            <td>45-48</td>
                                                            <td>40-44</td>
                                                            <td>47.5-51.5</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div><!-- End .row -->
                                    </div><!-- End .product-size-content -->
                                </div><!-- End .tab-pane -->
        
                                <div class="tab-pane" id="product-tags-content" role="tabpanel" aria-labelledby="product-tab-tags">
                                    <div class="product-tags-content">
                                        <form action="#">
                                            <h4>Add Your Tags:</h4>
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-sm" required>
                                                <input type="submit" class="btn btn-primary" value="Add Tags">
                                            </div><!-- End .form-group -->
                                        </form>
                                        <p class="note">Use spaces to separate tags. Use single quotes (') for phrases.</p>
                                    </div><!-- End .product-tags-content -->
                                </div><!-- End .tab-pane -->
        
                            </div> --}}<!-- End .product-single-tabs -->
                        </div><!-- End .col-lg-9 -->

                        <div class="sidebar-overlay"></div>
                        <div class="sidebar-toggle"><i class="icon-sliders"></i></div>
                        <aside class="sidebar-product col-lg-3 padding-left-lg mobile-sidebar">
                            <div class="sidebar-wrapper">
                                <div class="widget widget-banner">
                                    <div class="banner banner-image">
                                        <a href="#">
                                            <img src="{{ $logged_in_user->picture }}" alt="Banner Desc">
                                        </a>
                                    </div><!-- End .banner -->
                                </div><!-- End .widget -->

                                <small>
                                    <i class="fas fa-envelope"></i> {{ $logged_in_user->email }}<br/>
                                    <i class="fas fa-calendar-check"></i> @lang('strings.frontend.general.joined') {{ timezone()->convertToLocal($logged_in_user->created_at, 'F jS, Y') }}
                                </small>

                                <br>
                                <br>

	                            <a href="{{ route('frontend.user.account')}}" class="btn btn-info btn-sm mb-1">
	                                <i class="fas fa-user-circle"></i> @lang('navs.frontend.user.account')
	                            </a>

								@can('ver panel')
	                                <a href="{{ route('admin.dashboard')}}" class="btn btn-danger btn-sm mb-1">
	                                    <i class="fas fa-user-secret"></i> @lang('navs.frontend.user.administration')
	                                </a>
	                            @endcan

                            </div>
                        </aside><!-- End .col-md-3 -->
                    </div><!-- End .row -->

                </div><!-- End .container-box -->
            </div><!-- End .container -->
@endsection
