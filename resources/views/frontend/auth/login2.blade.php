@extends('frontend.layouts.app2')

@section('title', app_name() . ' | ' . __('labels.frontend.auth.login_box_title'))

@section('content')

<div class="container">
    <div class="container-box">
        <div class="heading mt-2 mb-4">
            <h2 class="title">@lang('labels.frontend.auth.login_box_title')</h2>
            {{-- <p>Please enter your email address below to receive a password reset link.</p> --}}
        </div><!-- End .heading -->

         {{ html()->form('POST', route('frontend.auth.login.post'))->open() }}
            <div class="form-group required-field">
                <label for="reset-email">{{ html()->label(__('validation.attributes.frontend.email'))->for('email') }}</label>
                {{ html()->email('email')
                            ->class('form-control')
                            ->placeholder(__('validation.attributes.frontend.email'))
                            ->attribute('maxlength', 191)
                            ->required() }}
            </div><!-- End .form-group -->
            <div class="form-group required-field">
            	<label for="reset-email">{{ html()->label(__('validation.attributes.frontend.password'))->for('password') }}</label>	
            	{{ html()->password('password')
                            ->class('form-control')
                            ->placeholder(__('validation.attributes.frontend.password'))
                            ->required() }}
            </div><!-- End .form-group -->

            <div class="row">
                <div class="col">
                    <div class="form-group text-left">
                        <a href="{{ route('frontend.auth.password.reset') }}">@lang('labels.frontend.passwords.forgot_password')</a>
                    </div><!--form-group-->
                </div><!--col-->
            </div><!--row-->

            <div class="form-footer">
                {{ form_submit(__('labels.frontend.auth.login_button')) }}
            </div><!-- End .form-footer -->
        {{ html()->form()->close() }}
    </div><!-- End .container-box -->
</div><!-- End .container -->

@endsection
