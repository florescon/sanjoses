<?php

Breadcrumbs::for('admin.material.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('labels.backend.access.material.management'), route('admin.material.index'));
});

Breadcrumbs::for('admin.material.edit', function ($trail, $id) {
    $trail->parent('admin.material.index');
    $trail->push(__('labels.backend.access.material.edit'), route('admin.material.edit', $id));
});

Breadcrumbs::for('admin.materialhistory.index', function ($trail) {
    $trail->parent('admin.material.index');
    $trail->push(__('labels.backend.access.material.history_management'), route('admin.materialhistory.index'));
});
