<?php

Breadcrumbs::for('admin.revision.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('labels.backend.access.revision.management'), route('admin.revision.index'));
});

Breadcrumbs::for('admin.revisionlog.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('labels.backend.access.revision.management'), route('admin.revisionlog.index'));
});
