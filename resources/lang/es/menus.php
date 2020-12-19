<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Menus Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used in menu items throughout the system.
    | Regardless where it is placed, a menu item can be listed here so it is easily
    | found in a intuitive way.
    |
    */

    'backend' => [
        'access' => [
            'title' => 'Administración de acceso',

            'roles' => [
                'all' => 'Todos los Roles',
                'create' => 'Nuevo Rol',
                'edit' => 'Modificar Rol',
                'management' => 'Administración de Roles',
                'main' => 'Roles',
            ],

            'users' => [
                'all' => 'Todos los Usuarios',
                'change-password' => 'Cambiar la contraseña',
                'create' => 'Nuevo Usuario',
                'deactivated' => 'Usuarios Desactivados',
                'deleted' => 'Usuarios Eliminados',
                'edit' => 'Modificar Usuario',
                'main' => 'Usuario',
                'view' => 'Ver Usuario',
            ],

            'notes' => [
                'main' => 'Notas',
                'all' => 'Todas las notas',
                'all_general' => 'Notas generales',
                'all_personal' => 'Notas personales',
            ],

            'cash' => [
                'main' => 'Cortes de caja',
                'all' => 'Todos los cortes',
            ],
        ],

        'log-viewer' => [
            'main' => 'Gestor de Logs',
            'dashboard' => 'Principal',
            'logs' => 'Logs',
        ],

        'sidebar' => [
            'dashboard' => 'Principal',
            'general' => 'General',
            'status' => 'Estatus de orden',
            'history' => 'Historia',
            'system' => 'Sistema',
            'regulation' => 'Reglamento',
            'classroom_type' => 'Tipos de clase',
            'sections' => 'Secciones',
            'classroom' => 'Clases',
            'classroom_student' => 'Asignar clase',
            'subscriptions_montlhy' => 'Inscripciones y mensualidades',
            'subscriptions' => 'Inscripciones',
            'payments_monthly' => 'Mensualidades',
            'payments_methods' => 'Métodos de pago',
            'colors' => 'Colores',
            'sleeves' => 'Mangas',
            'cloths' => 'Telas',
            'lines' => 'Lineas',
            'sizes' => 'Tallas',
            'units' => 'Unidades de medida',
            'cms' => 'CMS',
            'cms_support' => 'Soporte',
            'cms_pages' => 'Páginas',
            'cms_gallery' => 'Galería',
            'cms_staff' => 'Equipo de trabajo',
            'cms_schedule' => 'Horario',
            'inventory' => 'Inventario',
            'sells' => 'Ventas',
            'products' => 'Productos',
            'list_products' => 'Lista de productos padre',
            'list_products_stock' => 'Lista de productos',
            'history_product' => 'Entradas de productos',
            'historyout_product' => 'Salidas de productos',
            'consumption_products' => 'Consumos de producto',
            'services' => 'Servicios',
            'customers' => 'Clientes',
            'schools' => 'Instituciones',
            'tags' => 'Etiquetas',
            'transactions' => 'Transacciones',
            'incomes' => 'Ingresos',
            'expenses' => 'Egresos',
            'cash_out' => 'Corte de caja',
            'small_box' => 'Caja chica',
            'settings' => 'Configuraciones',
            'general' => 'Generales',
            'material' => 'Materia prima',
            'list_material' => 'Lista de materia prima',
            'history_material' => 'Entradas de materia prima',
            'historyout_material' => 'Salidas de materia prima',
            'orders' => 'Órdenes',
            'final_orders' => 'Órdenes de entrega final',
            'warehouse_review' => 'Almacén revisión intermedia',
            'warehouse_review_registry' => 'Registros Almacén revisión intermedia',
        ],
    ],

    'language-picker' => [
        'language' => 'Idioma',
        /*
         * Add the new language to this array.
         * The key should have the same language code as the folder name.
         * The string should be: 'Language-name-in-your-own-language (Language-name-in-English)'.
         * Be sure to add the new language in alphabetical order.
         */
        'langs' => [
            'ar' => 'العربية (Arabic)',
            'zh' => '(Chinese Simplified)',
            'zh-TW' => '(Chinese Traditional)',
            'da' => 'Danés (Danish)',
            'de' => 'Alemán (German)',
            'el' => '(Greek)',
            'en' => 'Inglés (English)',
            'es' => 'Español (Spanish)',
            'fa' => 'Persa (Persian)',
            'fr' => 'Francés (French)',
            'he' => 'Hebreo (Hebrew)',
            'id' => 'Indonesio (Indonesian)',
            'it' => 'Italiano (Italian)',
            'ja' => '(Japanese)',
            'nl' => 'Holandés (Dutch)',
            'no' => 'Noruego (Norwegian)',
            'pt_BR' => 'Portugués Brasileño',
            'ru' => 'Russian (Russian)',
            'sv' => 'Sueco (Swedish)',
            'th' => '(Thai)',
            'tr' => '(Turkish)',
            'uk' => '(Ukrainian)',
        ],
    ],
];
