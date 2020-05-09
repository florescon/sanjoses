<?php

Breadcrumbs::for('admin.inventory.service.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('labels.backend.access.service.management'), route('admin.inventory.service.index'));
});

Breadcrumbs::for('admin.inventory.sell.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('labels.backend.access.sell.management'), route('admin.inventory.sell.index'));
});
Breadcrumbs::for('admin.inventory.sell.create', function ($trail) {
    $trail->parent('admin.inventory.sell.index');
    $trail->push(__('labels.backend.access.sell.create'), route('admin.inventory.sell.create'));
});
Breadcrumbs::for('admin.inventory.sell.show', function ($trail, $id) {
    $trail->parent('admin.inventory.sell.index');
    $trail->push(__('labels.backend.access.sell.view'), route('admin.inventory.sell.show', $id));
});
Breadcrumbs::for('admin.inventory.sell.search', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('labels.backend.access.product.management'), route('admin.inventory.sell.search'));
});

