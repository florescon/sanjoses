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
Breadcrumbs::for('admin.materialhistory.show', function ($trail, $id) {
    $trail->parent('admin.materialhistory.index');
    $trail->push(__('labels.backend.access.material.show_history'), route('admin.materialhistory.show', $id));
});
