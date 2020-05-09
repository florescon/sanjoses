@extends('frontend.layouts.app2')

@section('content')

<div class="container">
    <div class="container-box">
        <div class="row mt-2">

            <aside class="sidebar col-lg-3">
                <div class="widget widget-dashboard">
                    <h3 class="widget-title">@lang('navs.frontend.user.account')</h3>
                        <ul class="list nav nav-tabs" role="tablist">
                            <li><a class="active" id="profile-tab" data-toggle="tab" href="#profile-content" role="tab" aria-controls="profile-content" aria-selected="true">@lang('navs.frontend.user.profile') &nbsp; </a></li>
                            <li><a id="information-tab" data-toggle="tab" href="#information-content" role="tab" aria-controls="information-content" aria-selected="false">@lang('labels.frontend.user.profile.update_information') &nbsp; </a></li>
                            <li><a id="password-tab" data-toggle="tab" href="#password-content" role="tab" aria-controls="password-content" aria-selected="false">@lang('navs.frontend.user.change_password') &nbsp; </a></li>
                        </ul>
                </div><!-- End .widget -->
            </aside><!-- End .col-lg-3 -->

            <div class="col-lg-9 order-lg-last dashboard-content">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="profile-content" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="profile-content">
                            <ul class="history-list">
                                <li>
                                    <div class="thumb">
                                        <img src="{{ $logged_in_user->picture }}" alt="office">
                                    </div>
                                    <div class="featured-box">
                                        <div class="box-content">
                                            <h4 class="">@lang('navs.frontend.user.account')</h4>
                                            <address>
                                                <strong>@lang('labels.frontend.user.profile.name'): </strong>{{ $logged_in_user->name }}<br>
                                                <strong>@lang('labels.frontend.user.profile.email'): </strong>{{ $logged_in_user->email }}<br>
                                                <strong>@lang('labels.frontend.user.profile.created_at'): </strong>{{ timezone()->convertToLocal($logged_in_user->created_at) }} ({{ $logged_in_user->created_at->diffForHumans() }})<br>
                                                <strong>@lang('labels.frontend.user.profile.last_updated'): </strong>{{ timezone()->convertToLocal($logged_in_user->updated_at) }} ({{ $logged_in_user->updated_at->diffForHumans() }})
                                            </address>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="information-content" role="tabpanel" aria-labelledby="information-tab">
                        <div class="information-content">

                            {{ html()->modelForm($logged_in_user, 'POST', route('frontend.user.profile.update'))->class('form-horizontal')->attribute('enctype', 'multipart/form-data')->open() }}
                                @method('PATCH')

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            {{ html()->label(__('validation.attributes.frontend.avatar'))->for('avatar') }}

                                            <div>
                                                <input type="radio" name="avatar_type" value="gravatar" {{ $logged_in_user->avatar_type == 'gravatar' ? 'checked' : '' }} /> Gravatar
                                                <input type="radio" name="avatar_type" value="storage" {{ $logged_in_user->avatar_type == 'storage' ? 'checked' : '' }} /> @lang('labels.general.upload')

                                                @foreach($logged_in_user->providers as $provider)
                                                    @if(strlen($provider->avatar))
                                                        <input type="radio" name="avatar_type" value="{{ $provider->provider }}" {{ $logged_in_user->avatar_type == $provider->provider ? 'checked' : '' }} /> {{ ucfirst($provider->provider) }}
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div><!--form-group-->

                                        <div class="form-group hidden" id="avatar_location">
                                            {{ html()->file('avatar_location')->class('form-control') }}
                                        </div><!--form-group-->
                                    </div><!--col-->
                                </div><!--row-->

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            {{ html()->label(__('validation.attributes.frontend.first_name'))->for('first_name') }}

                                            {{ html()->text('first_name')
                                                ->class('form-control')
                                                ->placeholder(__('validation.attributes.frontend.first_name'))
                                                ->attribute('maxlength', 191)
                                                ->required() }}
                                        </div><!--form-group-->
                                    </div><!--col-->
                                </div><!--row-->

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            {{ html()->label(__('validation.attributes.frontend.last_name'))->for('last_name') }}

                                            {{ html()->text('last_name')
                                                ->class('form-control')
                                                ->placeholder(__('validation.attributes.frontend.last_name'))
                                                ->attribute('maxlength', 191)
                                                ->required() }}
                                        </div><!--form-group-->
                                    </div><!--col-->
                                </div><!--row-->

                                @if ($logged_in_user->canChangeEmail())
                                    <div class="row">
                                        <div class="col">
                                            <div class="alert alert-info">
                                                <i class="fas fa-info-circle"></i> @lang('strings.frontend.user.change_email_notice')
                                            </div>

                                            <div class="form-group">
                                                {{ html()->label(__('validation.attributes.frontend.email'))->for('email') }}

                                                {{ html()->email('email')
                                                    ->class('form-control')
                                                    ->placeholder(__('validation.attributes.frontend.email'))
                                                    ->attribute('maxlength', 191)
                                                    ->required() }}
                                            </div><!--form-group-->
                                        </div><!--col-->
                                    </div><!--row-->
                                @endif

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group mb-0 clearfix">
                                            {{ form_submit(__('labels.general.buttons.update')) }}
                                        </div><!--form-group-->
                                    </div><!--col-->
                                </div><!--row-->
                            {{ html()->closeModelForm() }}

                            @push('after-scripts')
                                <script>
                                    $(function() {
                                        var avatar_location = $("#avatar_location");

                                        if ($('input[name=avatar_type]:checked').val() === 'storage') {
                                            avatar_location.show();
                                        } else {
                                            avatar_location.hide();
                                        }

                                        $('input[name=avatar_type]').change(function() {
                                            if ($(this).val() === 'storage') {
                                                avatar_location.show();
                                            } else {
                                                avatar_location.hide();
                                            }
                                        });
                                    });
                                </script>
                            @endpush


                        </div>
                    </div>

                    <div class="tab-pane fade" id="password-content" role="tabpanel" aria-labelledby="password-tab">
                        <div class="password-content">


                            {{ html()->form('PATCH', route('frontend.auth.password.update'))->class('form-horizontal')->open() }}
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            {{ html()->label(__('validation.attributes.frontend.old_password'))->for('old_password') }}

                                            {{ html()->password('old_password')
                                                ->class('form-control')
                                                ->placeholder(__('validation.attributes.frontend.old_password'))
                                                ->required() }}
                                        </div><!--form-group-->
                                    </div><!--col-->
                                </div><!--row-->

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            {{ html()->label(__('validation.attributes.frontend.password'))->for('password') }}

                                            {{ html()->password('password')
                                                ->class('form-control')
                                                ->placeholder(__('validation.attributes.frontend.password'))
                                                ->required() }}
                                        </div><!--form-group-->
                                    </div><!--col-->
                                </div><!--row-->

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            {{ html()->label(__('validation.attributes.frontend.password_confirmation'))->for('password_confirmation') }}

                                            {{ html()->password('password_confirmation')
                                                ->class('form-control')
                                                ->placeholder(__('validation.attributes.frontend.password_confirmation'))
                                                ->required() }}
                                        </div><!--form-group-->
                                    </div><!--col-->
                                </div><!--row-->

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group mb-0 clearfix">
                                            {{ form_submit(__('labels.general.buttons.update') . ' ' . __('validation.attributes.frontend.password')) }}
                                        </div><!--form-group-->
                                    </div><!--col-->
                                </div><!--row-->
                            {{ html()->form()->close() }}

                        </div>
                    </div>
                </div>
            </div><!-- End .col-lg-9 -->

        </div><!-- End .row -->
    </div><!-- End .container-box -->
</div><!-- End .container -->

@endsection
