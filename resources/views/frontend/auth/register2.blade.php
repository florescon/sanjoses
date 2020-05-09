@extends('frontend.layouts.app2')

@section('title', app_name() . ' | ' . __('labels.frontend.auth.register_box_title'))

@section('content')
            <div class="container">
                <div class="container-box">
                    <div class="row mt-2">
                        <div class="col-lg-12 order-lg-last dashboard-content">
                            <h2>@lang('labels.frontend.auth.register_box_title')</h2>
                            
	                        {{ html()->form('POST', route('frontend.auth.register.post'))->open() }}
	                        @csrf
                                <div class="row">
                                    <div class="col-sm-11">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group required-field">
                                                    <label for="acc-name">{{ __('validation.attributes.frontend.first_name') }}</label>
                                                    {{ html()->text('first_name')
				                                        ->class('form-control')
				                                        ->placeholder(__('validation.attributes.frontend.first_name'))
				                                        ->attribute('maxlength', 191)
				                                        ->required()}}
                                                </div><!-- End .form-group -->
                                            </div><!-- End .col-md-4 -->

                                            <div class="col-md-4">
                                                <div class="form-group required-field">
                                                    <label for="acc-mname">{{ __('validation.attributes.frontend.last_name') }}</label>
				                                    {{ html()->text('last_name')
				                                        ->class('form-control')
				                                        ->placeholder(__('validation.attributes.frontend.last_name'))
				                                        ->attribute('maxlength', 191)
				                                        ->required() }}
                                                </div><!-- End .form-group -->
                                            </div><!-- End .col-md-4 -->

                                            <div class="col-md-4">
                                                <div class="form-group required-field">
                                                    <label for="acc-lastname">{{ __('validation.attributes.frontend.email') }}</label>
				                                    {{ html()->email('email')
				                                        ->class('form-control')
				                                        ->placeholder(__('validation.attributes.frontend.email'))
				                                        ->attribute('maxlength', 191)
				                                        ->required() }}
                                                </div><!-- End .form-group -->
                                            </div><!-- End .col-md-4 -->
                                        </div><!-- End .row -->
                                    </div><!-- End .col-sm-11 -->
                                </div><!-- End .row -->


                                <div class="row">
                                    <div class="col-sm-11">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group required-field">
                                                    <label for="acc-name">{{ __('validation.attributes.frontend.password') }}</label>
				                                    {{ html()->password('password')
				                                        ->class('form-control')
				                                        ->placeholder(__('validation.attributes.frontend.password'))
				                                        ->required() }}
                                                </div><!-- End .form-group -->
                                            </div><!-- End .col-md-4 -->

                                            <div class="col-md-6">
                                                <div class="form-group required-field">
                                                    <label for="acc-mname">{{ __('validation.attributes.frontend.password_confirmation') }}</label>
				                                    {{ html()->password('password_confirmation')
				                                        ->class('form-control')
				                                        ->placeholder(__('validation.attributes.frontend.password_confirmation'))
				                                        ->required() }}
                                                </div><!-- End .form-group -->
                                            </div><!-- End .col-md-4 -->

                                        </div><!-- End .row -->
                                    </div><!-- End .col-sm-11 -->
                                </div><!-- End .row -->

                                <div class="mb-2"></div><!-- margin -->


                                <div class="required text-right">* Required Field</div>
                                <div class="form-footer">
                                    <a href="#"><i class="icon-angle-double-left"></i>Back</a>

                                    <div class="form-footer-right">
                                     {{ form_submit(__('labels.frontend.auth.register_button')) }}
                                   </div>
                                </div><!-- End .form-footer -->
		                    {{ html()->form()->close() }}
                        </div><!-- End .col-lg-9 -->

                    </div><!-- End .row -->
                </div><!-- End .container-box -->
            </div><!-- End .container -->


@endsection
