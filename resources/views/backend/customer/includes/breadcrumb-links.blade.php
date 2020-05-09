<li class="breadcrumb-menu">
    <div class="btn-group" role="group" aria-label="Button group">

        {{-- <form action="{{ route('admin.customer.search') }}" method="GET">
            <input class="form-control form-control-sm" type="text" name="search" placeholder="buscar" required/>
        </form> --}}

        <div class="dropdown">
            <a class="btn dropdown-toggle" href="#" role="button" id="breadcrumb-dropdown-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@lang('menus.backend.access.users.main')</a>

            <div class="dropdown-menu" aria-labelledby="breadcrumb-dropdown-1">
                <a class="dropdown-item" href="{{ route('admin.customer.index') }}">@lang('menus.backend.access.users.all')</a>
                <a class="dropdown-item" href="{{ route('admin.customer.create') }}">@lang('menus.backend.access.users.create')</a>
                <a class="dropdown-item" href="{{ route('admin.auth.user.deactivated') }}">@lang('menus.backend.access.users.deactivated')</a>
                <a class="dropdown-item" href="{{ route('admin.auth.user.deleted') }}">@lang('menus.backend.access.users.deleted')</a>
            </div>
        </div><!--dropdown-->

        <!--<a class="btn" href="#">Static Link</a>-->
    </div><!--btn-group-->
</li>
