@extends('frontend.layouts.app2')

@section('title', app_name() . ' | ' . __('labels.frontend.contact.box_title'))

@section('content')

            <div class="mb-3"></div><!-- margin -->

            <div class="container">
                
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3715.9789861847735!2d-101.94036608553087!3d21.351324082064966!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x842bd3cb86f94867%3A0x27a1c662fae46eec!2sMargarito%20Gonz%C3%A1lez%20Rubio%20822%2C%20El%20Refugio%2C%2047470%20Lagos%20de%20Moreno%2C%20Jal.!5e0!3m2!1sen!2smx!4v1589257899515!5m2!1sen!2smx" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

                <div class="container-box">
                    <div class="row mt-2">
                        <div class="col-md-8">
                            <h2 class="light-title">@lang('labels.frontend.contact.box_title')</h2>

                            {{ html()->form('POST', route('frontend.contact.send'))->open() }}

                                <div class="form-group required-field">
                                    {{ html()->label(__('validation.attributes.frontend.name'))->for('name') }}
                                    {{ html()->text('name', optional(auth()->user())->name)
                                        ->class('form-control')
                                        ->placeholder(__('validation.attributes.frontend.name'))
                                        ->attribute('maxlength', 191)
                                        ->required()
                                        ->autofocus() }}
                                </div><!-- End .form-group -->

                                <div class="form-group required-field">
                                    {{ html()->label(__('validation.attributes.frontend.email'))->for('email') }}

                                    {{ html()->email('email', optional(auth()->user())->email)
                                        ->class('form-control')
                                        ->placeholder(__('validation.attributes.frontend.email'))
                                        ->attribute('maxlength', 191)
                                        ->required() }}
                                </div><!-- End .form-group -->

                                <div class="form-group">
                                    {{ html()->label(__('validation.attributes.frontend.phone'))->for('phone') }}

                                    {{ html()->text('phone')
                                        ->class('form-control')
                                        ->placeholder(__('validation.attributes.frontend.phone'))
                                        ->attribute('maxlength', 191)
                                        ->required() }}
                                </div><!-- End .form-group -->

                                <div class="form-group required-field">
                                    {{ html()->label(__('validation.attributes.frontend.message'))->for('message') }}
                                    {{ html()->textarea('message')
                                        ->class('form-control')
                                        ->placeholder(__('validation.attributes.frontend.message'))
                                        ->attribute('rows', 3)
                                        ->required() }}
                                </div><!-- End .form-group -->

                                <div class="form-footer">
                                    {{ form_submit(__('labels.frontend.contact.button')) }}
                                </div><!-- End .form-footer -->

                            {{ html()->form()->close() }}

                        </div><!-- End .col-md-8 -->

                        <div class="col-md-4">
                            <h2 class="light-title">@lang('labels.frontend.contact.contact') <strong>@lang('labels.frontend.contact.details')</strong></h2>

                            <div class="contact-info">
                                <div>
                                    <i class="icon-phone"></i>
                                    <p><a href="tel:">47 42 30 00</a></p>
                                </div>
                                <div>
                                    <i class="icon-mail-alt"></i>
                                    <p><a href="mailto:#">ventas@sj-uniformes.com</a></p>
                                </div>
                            </div><!-- End .contact-info -->
                        </div><!-- End .col-md-4 -->
                    </div><!-- End .row -->
                </div><!-- End .container-box -->
            </div><!-- End .container -->



@endsection

@push('after-scripts')
    @if(config('access.captcha.contact'))
        @captchaScripts
    @endif

    <!-- Google Map-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDc3LRykbLB-y8MuomRUIY0qH5S6xgBLX4"></script>
    <script src="{{ asset('/porto/assets/js/map.js') }}"></script>

@endpush