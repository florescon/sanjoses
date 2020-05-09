<?php

Breadcrumbs::for('admin.product.product.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('labels.backend.access.product.management'), route('admin.product.product.index'));
});
Breadcrumbs::for('admin.product.product.show', function ($trail, $id) {
    $trail->parent('admin.product.product.index');
    $trail->push(__('labels.backend.access.product.view'), route('admin.product.product.show', $id));
});
Breadcrumbs::for('admin.product.product.edit', function ($trail, $id) {
    $trail->parent('admin.product.product.index');
    $trail->push(__('labels.backend.access.product.edit'), route('admin.product.product.edit', $id));
});

Breadcrumbs::for('admin.product.color.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('labels.backend.access.color.management'), route('admin.product.color.index'));
});

Breadcrumbs::for('admin.product.sleeve.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('labels.backend.access.sleeve.management'), route('admin.product.sleeve.index'));
});

Breadcrumbs::for('admin.product.cloth.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('labels.backend.access.cloth.management'), route('admin.product.cloth.index'));
});

Breadcrumbs::for('admin.product.line.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('labels.backend.access.line.management'), route('admin.product.line.index'));
});

Breadcrumbs::for('admin.product.size.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('labels.backend.access.size.management'), route('admin.product.size.index'));
});

Breadcrumbs::for('admin.product.unit.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('labels.backend.access.unit.management'), route('admin.product.unit.index'));
});

Breadcrumbs::for('admin.product.bom.create', function ($trail, $id) {
    $trail->parent('admin.product.product.index');
    $trail->push(__('labels.backend.access.bom.management'), route('admin.product.bom.create', $id));
});

Breadcrumbs::for('admin.product.productlist.index', function ($trail) {
    $trail->parent('admin.product.product.index');
    $trail->push(__('labels.backend.access.product.list'), route('admin.product.productlist.index'));
});

Breadcrumbs::for('admin.product.producthistory.index', function ($trail) {
    $trail->parent('admin.product.product.index');
    $trail->push(__('labels.backend.access.product.history'), route('admin.product.producthistory.index'));
});
