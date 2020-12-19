<?php

Breadcrumbs::for('admin.finalorder.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('labels.backend.access.finalorder.management'), route('admin.finalorder.index'));
});
Breadcrumbs::for('admin.finalorder.create', function ($trail) {
    $trail->parent('admin.finalorder.index');
    $trail->push(__('labels.backend.access.finalorder.create'), route('admin.finalorder.create'));
});
