<?php

Breadcrumbs::for('admin.order.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('labels.backend.access.order.management'), route('admin.order.index'));
});
Breadcrumbs::for('admin.order.process-', function ($trail) {
    $trail->parent('admin.order.index');
    $trail->push(__('labels.backend.access.order.orders_in_process'), route('admin.order.process-'));
});
Breadcrumbs::for('admin.order.create', function ($trail) {
    $trail->parent('admin.order.index');
    $trail->push(__('labels.backend.access.order.create'), route('admin.order.create'));
});
Breadcrumbs::for('admin.order.show', function ($trail, $id) {
    $trail->parent('admin.order.index');
    $trail->push(__('labels.backend.access.order.view'), route('admin.order.show', $id));
});
Breadcrumbs::for('admin.order.reintegrate', function ($trail, $id) {
    $trail->parent('admin.order.show', $id);
    $trail->push(__('labels.backend.access.order.reintegrate_stock'), route('admin.order.reintegrate', $id));
});
Breadcrumbs::for('admin.order.addtostaff', function ($trail, $id, $staff) {
    $trail->parent('admin.order.show', $id);
    $trail->push(__('labels.backend.access.order.add_staff'), route('admin.order.addtostaff', [$id, $staff]));
});
Breadcrumbs::for('admin.order.addtorevisionstock', function ($trail, $id, $staff) {
    $trail->parent('admin.order.show', $id);
    $trail->push(__('labels.backend.access.order.intermediate_review_warehouse'), route('admin.order.addtorevisionstock', [$id, $staff]));
});
Breadcrumbs::for('admin.order.search', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('labels.backend.access.product.management'), route('admin.order.search'));
});

