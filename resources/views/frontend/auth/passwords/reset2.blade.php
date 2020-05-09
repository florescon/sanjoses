@extends('frontend.layouts.app2')

@section('title', app_name() . ' | ' . __('labels.frontend.passwords.reset_password_box_title'))

@section('content')

<div class="container">
    <div class="container-box">
        <div class="heading mt-2 mb-4">
            <h2 class="title">@lang('labels.frontend.passwords.reset_password_box_title')</h2>
            {{-- <p>Please enter your email address below to receive a password reset link.</p> --}}
        </div><!-- End .heading -->

		@if(session('status'))
		    <div class="alert alert-success">
		        {{ session('status') }}
		    </div>
		@endif

        {{ html()->form('POST', route('frontend.auth.password.reset'))->class('form-horizontal')->open() }}
            {{ html()->hidden('token', $token) }}

     	    <div class="form-group required-field">
                <label for="email">{{ __('validation.attributes.frontend.email') }}</label>
                {{ html()->email('email')
                                        ->class('form-control')
                                        ->placeholder(__('validation.attributes.frontend.email'))
                                        ->attribute('maxlength', 191)
                                        ->required() }}
            </div><!-- End .form-group -->
            <div class="form-group required-field">
            	<label for="password">{{ __('validation.attributes.frontend.password') }}</label>	
            	{{ html()->password('password')
                                        ->class('form-control')
                                        ->placeholder(__('validation.attributes.frontend.password'))
                                        ->required() }}
            </div><!-- End .form-group -->
            <div class="form-group required-field">
            	<label for="password_confirmation">{{ __('validation.attributes.frontend.password_confirmation') }}</label>	
            	{{ html()->password('password_confirmation')
                                        ->class('form-control')
                                        ->placeholder(__('validation.attributes.frontend.password_confirmation'))
                                        ->required() }}
            </div><!-- End .form-group -->

            <div class="form-footer">
	            {{ form_submit(__('labels.frontend.passwords.reset_password_button')) }}
            </div><!-- End .form-footer -->
        {{ html()->form()->close() }}
    </div><!-- End .container-box -->
</div><!-- End .container -->

@endsection
