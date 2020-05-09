<li class="breadcrumb-menu">
    @if(!empty($latest->final))
    <div class="btn-toolbar float-left" role="toolbar" aria-label="@lang('labels.general.toolbar_btn_groups')">
        <a href="#" class="btn btn-secondary ml-1" data-toggle="modal" title="@lang('labels.general.create_new')" data-target="#cashModal"><i class="fas fa-plus-circle"></i></a>
    </div>
    @elseif(!isset($latest))
    <div class="btn-toolbar float-left" role="toolbar" aria-label="@lang('labels.general.toolbar_btn_groups')">
        <a href="#" class="btn btn-secondary ml-1" data-toggle="modal" title="@lang('labels.general.create_new')" data-target="#cashModal"><i class="fas fa-plus-circle"></i> Mi primer corte</a>
    </div>
	@else
        @if(isset($latest))
        <div class="btn-toolbar float-left" role="toolbar">
        	<a href="#" data-toggle="modal" data-placement="top" class="btn btn-warning ml-1" data-id="{{ $latest->id }}" data-myquantity="{{ $latest->initial }}" data-target="#editSection"><i class="fas fa-edit"></i> ${{ $latest->initial }}</a>
    	</div>
        @endif
	@endif

    <div class="btn-group" role="group" aria-label="Button group">
        <div class="dropdown">
            <a class="btn dropdown-toggle" href="#" role="button" id="breadcrumb-dropdown-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@lang('menus.backend.access.cash.main')</a>

            <div class="dropdown-menu" aria-labelledby="breadcrumb-dropdown-1">
                <a class="dropdown-item" href="{{ route('admin.transaction.cash.indexall') }}">@lang('menus.backend.access.cash.all')</a>
            </div>
        </div><!--dropdown-->

        <!--<a class="btn" href="#">Static Link</a>-->
    </div><!--btn-group-->
</li>
