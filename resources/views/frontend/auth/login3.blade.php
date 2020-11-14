@extends('frontend.layouts.app3')

@section('title', app_name() . ' | ' . __('labels.frontend.auth.login_box_title'))

@section('content')


<div class="section over-hide padding-top-120 padding-top-mob-nav section-background-24 background-img-top">	
	<div class="section-1400 padding-top-bottom-120">
		<div class="container-fluid">
			<div class="row justify-content-center">
				<div class="col-lg-7 col-xl-5">
					<div class="section py-4 py-md-5 px-3 px-sm-4 px-lg-5 over-hide border-4 section-shadow-blue bg-white section-background-24 background-img-top form">
				         {{ html()->form('POST', route('frontend.auth.login.post'))->open() }}
							<h4 class="mb-4 text-sm-center">
								Iniciar sesión.
							</h4>
							<div class="form-group">

				                {{ html()->email('email')
		                            ->class('form-style big gray-version no-shadow form-style-with-icon section-shadow-blue')
		                            ->placeholder(__('validation.attributes.frontend.email'))
		                            ->attribute('maxlength', 191)
		                            ->required() }}
								<i class="input-icon big uil uil-user"></i>

							</div>	
							<div class="form-group mt-3">

				            	{{ html()->password('password')
				                            ->class('form-style big gray-version no-shadow form-style-with-icon section-shadow-blue')
				                            ->placeholder(__('validation.attributes.frontend.password'))
				                            ->required() }}
								<i class="input-icon big uil uil-lock-alt"></i>

							</div>
							<div class="row mt-3">
								<div class="col pr-0">	
									<div class="form-group">
										<input type="checkbox" id="checkbox" checked>
										<label class="checkbox mb-0 font-weight-500 size-15" for="checkbox">Mantener conectado</label>
									</div>
								</div>
								<div class="col-auto align-self-center text-right pl-0">	
									{{-- <a href="{{ route('frontend.auth.password.reset') }}" class="link link-gray-primary size-15 font-weight-500 animsition-link" data-hover="@lang('labels.frontend.passwords.forgot_password')">@lang('labels.frontend.passwords.forgot_password')</a>  --}}
								</div>
							</div>
							<div class="row mt-4">	
								<div class="col-12 text-sm-center">
					               {{ form_submit(__('labels.frontend.auth.login_button'))->class('btn btn-dark-primary') }}
								</div>
							</div>
							<p class="mt-4 mb-0 text-sm-center size-16">
								{{-- Not registered? <a href="register-1.html" class="link link-dark-primary-2 link-normal animsition-link">Create an account</a>  --}}
							</p>
				        {{ html()->form()->close() }}
					</div>	
				</div>		
			</div>
		</div>
	</div>
</div>


@endsection
