<li class="breadcrumb-menu">

    <div class="btn-group" role="group" aria-label="Button group">

        <form action="{{ route('admin.note.searchnote') }}" method="GET">
            <input class="form-control form-control-sm" type="text" name="search" placeholder=" @lang('labels.backend.access.note.search_general_notes')" required/>
        </form>

        <!--<a class="btn" href="#">Static Link</a>-->
    </div><!--btn-group-->

    <div class="btn-group" role="group" aria-label="Button group">
        <div class="dropdown">

            <div class="btn-toolbar float-left" role="toolbar" aria-label="@lang('labels.general.toolbar_btn_groups')">
                <a href="#" class="btn btn-lg btn-block btn-outline-success" data-toggle="modal" title="@lang('labels.general.create_new')" data-target="#addNote"><i class="fas fa-plus-circle"></i></a>
            </div>

            <a class="btn dropdown-toggle" href="#" role="button" id="breadcrumb-dropdown-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@lang('menus.backend.access.notes.main')</a>

            <div class="dropdown-menu" aria-labelledby="breadcrumb-dropdown-1">
                <a class="dropdown-item" href="{{ route('admin.note.index') }}">@lang('menus.backend.access.notes.all_general')</a>
                <a class="dropdown-item" href="{{ route('admin.note.indexpersonal') }}">@lang('menus.backend.access.notes.all_personal')</a>
            </div>
        </div><!--dropdown-->

        <!--<a class="btn" href="#">Static Link</a>-->
    </div><!--btn-group-->
</li>
