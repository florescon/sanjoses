<?php

Breadcrumbs::for('admin.documentation.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('labels.backend.access.note.management'), route('admin.documentation.index'));
});

Breadcrumbs::for('admin.documentation.start', function ($trail) {
    $trail->parent('admin.documentation.index');
    $trail->push(__('labels.backend.access.note.management'), route('admin.documentation.start'));
});

Breadcrumbs::for('admin.documentation.documentation', function ($trail) {
    $trail->parent('admin.documentation.index');
    $trail->push(__('labels.backend.access.note.management'), route('admin.documentation.documentation'));
});

Breadcrumbs::for('admin.documentation.faqs', function ($trail) {
    $trail->parent('admin.documentation.index');
    $trail->push(__('labels.backend.access.note.management'), route('admin.documentation.faqs'));
});

Breadcrumbs::for('admin.documentation.license', function ($trail) {
    $trail->parent('admin.documentation.index');
    $trail->push(__('labels.backend.access.note.management'), route('admin.documentation.license'));
});
