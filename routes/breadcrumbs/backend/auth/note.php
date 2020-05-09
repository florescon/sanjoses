<?php

Breadcrumbs::for('admin.note.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('labels.backend.access.note.management'), route('admin.note.index'));
});

Breadcrumbs::for('admin.note.indexgeneral', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('labels.backend.access.note.management_general'), route('admin.note.indexgeneral'));
});

Breadcrumbs::for('admin.note.indexpersonal', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('labels.backend.access.note.management_personal'), route('admin.note.indexpersonal'));
});

Breadcrumbs::for('admin.note.search', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('labels.backend.access.note.management'), route('admin.note.search'));
});
