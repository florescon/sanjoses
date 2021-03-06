@extends('backend.layouts.app')

@section('title', __('labels.backend.access.users.management') . ' | ' . __('labels.backend.access.users.edit'))

@section('breadcrumb-links')
    @include('backend.customer.includes.breadcrumb-links')
@endsection

@section('content')
{{ html()->modelForm($user, 'PATCH', route('admin.customer.update', $user->id))->class('form-horizontal')->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        @lang('labels.backend.access.users.management')
                        <small class="text-muted">@lang('labels.backend.access.users.edit')</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr>

            <div class="row mt-4 mb-4">
                <div class="col">
                    <div class="form-group row">
                    {{ html()->label(__('validation.attributes.backend.access.users.first_name'))->class('col-md-2 form-control-label')->for('first_name') }}

                        <div class="col-md-10">
                            {{ html()->text('first_name')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.access.users.first_name'))
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.access.users.last_name'))->class('col-md-2 form-control-label')->for('last_name') }}

                        <div class="col-md-10">
                            {{ html()->text('last_name')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.access.users.last_name'))
                                ->attribute('maxlength', 191)
                                }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.access.users.email'))->class('col-md-2 form-control-label')->for('email') }}

                        <div class="col-md-10">
                            {{ html()->email('email')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.access.users.email'))
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.access.users.phone'))->class('col-md-2 form-control-label')->for('phone') }}

                        <div class="col-md-10">
                            {{ html()->text('phone', optional($user->customer)->phone)
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.access.users.phone'))
                                ->attribute('maxlength', 191)
                                 }}
                        </div><!--col-->
                    </div><!--form-group-->
 

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.access.users.rfc'))->class('col-md-2 form-control-label')->for('rfc') }}

                        <div class="col-md-10">
                            {{ html()->text('rfc', optional($user->customer)->rfc)
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.access.users.rfc'))
                                ->attribute('maxlength', 191)
                                 }}
                        </div><!--col-->
                    </div><!--form-group-->


                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.access.users.address'))->class('col-md-2 form-control-label')->for('address') }}

                        <div class="col-md-10">
                            {{ html()->text('address', optional($user->customer)->address)
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.access.users.address'))
                                ->attribute('maxlength', 191)
                                 }}
                        </div><!--col-->
                    </div><!--form-group-->

                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.customer.index'), __('buttons.general.cancel')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(__('buttons.general.crud.update')) }}
                </div><!--row-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
{{ html()->closeModelForm() }}
@endsection
