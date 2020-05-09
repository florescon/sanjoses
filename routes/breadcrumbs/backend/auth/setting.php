<?php

Breadcrumbs::for('admin.setting.general.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('labels.backend.access.setting.management'), route('admin.setting.general.index'));
});

Breadcrumbs::for('admin.setting.method.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('labels.backend.access.method.management'), route('admin.setting.method.index'));
});

Breadcrumbs::for('admin.setting.method.show', function ($trail, $id) {
    $trail->parent('admin.setting.method.index');
    $trail->push(__('labels.backend.access.method.history'), route('admin.setting.method.show', $id));
});

Breadcrumbs::for('admin.setting.color.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('labels.backend.access.color.management'), route('admin.setting.color.index'));
});

Breadcrumbs::for('admin.setting.status.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('labels.backend.access.status.management'), route('admin.setting.status.index'));
});

Breadcrumbs::for('admin.setting.status.trash', function ($trail) {
    $trail->parent('admin.setting.status.index');
    $trail->push(__('labels.backend.access.status.management_deleted'), route('admin.setting.status.trash'));
});
