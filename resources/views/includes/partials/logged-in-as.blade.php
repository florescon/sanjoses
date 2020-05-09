@if(auth()->user() && session()->has("admin_user_id") && session()->has("temp_user_id"))
    <div class="alert alert-warning logged-in-as">
        @lang('labels.general.logged_in_as') {{ auth()->user()->name }}. <a href="{{ route("frontend.auth.logout-as") }}">@lang('labels.general.re_login_as') {{ session()->get("admin_user_name") }}</a>.
    </div><!--alert alert-warning logged-in-as-->
@endif
