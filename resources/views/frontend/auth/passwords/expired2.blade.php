@extends('frontend.layouts.app2')

@section('title', app_name() . ' | ' . __('labels.frontend.passwords.expired_password_box_title'))

@section('content')

<div class="container">
    <div class="container-box">
        <div class="heading mt-2 mb-4">
            <h2 class="title">@lang('labels.frontend.passwords.expired_password_box_title')</h2>
            {{-- <p>Please enter your email address below to receive a password reset link.</p> --}}
        </div><!-- End .heading -->

        {{ html()->form('PATCH', route('frontend.auth.password.expired.update'))->class('form-horizontal')->open() }}
            <div class="form-group required-field">
                <label for="old_password">{{ __('validation.attributes.frontend.old_password') }}</label>
	            {{ html()->password('old_password')
	                ->class('form-control')
	                ->placeholder(__('validation.attributes.frontend.old_password'))
	                ->required() }}
            </div><!-- End .form-group -->

            <div class="form-group required-field">
            	<label for="password">{{ __('validation.attributes.frontend.password') }} </label>	
            	{{ html()->password('password')
                            ->class('form-control')
                            ->placeholder(__('validation.attributes.frontend.password'))
                            ->required() }}
            </div><!-- End .form-group -->

            <div class="form-group required-field">
            	<label for="password_confirmation">{{ __('validation.attributes.frontend.password_confirmation') }} </label>	
	            {{ html()->password('password_confirmation')
	                ->class('form-control')
	                ->placeholder(__('validation.attributes.frontend.password_confirmation'))
	                ->required() }}
            </div><!-- End .form-group -->

            <div class="form-footer">
                {{ form_submit(__('labels.frontend.passwords.update_password_button')) }}
            </div><!-- End .form-footer -->

        {{ html()->form()->close() }}
    </div><!-- End .container-box -->
</div><!-- End .container -->


@endsection
