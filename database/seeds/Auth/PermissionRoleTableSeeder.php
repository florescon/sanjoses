<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

/**
 * Class PermissionRoleTableSeeder.
 */
class PermissionRoleTableSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seed.
     */
    public function run()
    {
        $this->disableForeignKeys();

        // Create Roles
        $admin = Role::create(['name' => config('access.users.admin_role')]);
        $executive = Role::create(['name' => 'ejecutivo']);
        $user = Role::create(['name' => config('access.users.default_role')]);

        // Create Permissions
        $permissions = ['ver panel', 'metodos de pago', 'productos', 'servicios', 'generar venta', 'ver ventas', 'ingresos', 'categorias de ingresos', 'egresos', 'categorias de egresos', 'notas generales', 'caja chica', 'configuraciones generales', 'clientes', 'colores', 'mangas', 'telas', 'lineas', 'tallas', 'unidades de medida', 'materia prima', 'explosion de materiales'];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // ALWAYS GIVE ADMIN ROLE ALL PERMISSIONS
        $admin->givePermissionTo(Permission::all());

        // Assign Permissions to other Roles
        $executive->givePermissionTo('ver panel');

        $this->enableForeignKeys();
    }
}
