<?php

Breadcrumbs::for('admin.customer.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('labels.backend.access.users.management'), route('admin.customer.index'));
});

Breadcrumbs::for('admin.customer.create', function ($trail) {
    $trail->parent('admin.customer.index');
    $trail->push(__('labels.backend.access.users.create'), route('admin.customer.create'));
});

Breadcrumbs::for('admin.customer.show', function ($trail, $id) {
    $trail->parent('admin.customer.index');
    $trail->push(__('menus.backend.access.users.view'), route('admin.customer.show', $id));
});

Breadcrumbs::for('admin.customer.edit', function ($trail, $id) {
    $trail->parent('admin.customer.index');
    $trail->push(__('menus.backend.access.users.edit'), route('admin.customer.edit', $id));
});

Breadcrumbs::for('admin.customer.search', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('labels.backend.access.users.management'), route('admin.customer.search'));
});

