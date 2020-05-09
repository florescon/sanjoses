<?php

use Illuminate\Database\Seeder;

/**
 * Class AuthTableSeeder.
 */
class AuthTableSeeder extends Seeder
{
    use DisableForeignKeys, TruncateTable;

    /**
     * Run the database seeds.
     */
    public function run()
    {
        $this->disableForeignKeys();

        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        $this->truncateMultiple([
            config('permission.table_names.model_has_permissions'),
            config('permission.table_names.model_has_roles'),
            config('permission.table_names.role_has_permissions'),
            config('permission.table_names.permissions'),
            config('permission.table_names.roles'),
            config('access.table_names.users'),
            config('access.table_names.password_histories'),
            'password_resets',
            'social_accounts',
        ]);

        $this->call(UserTableSeeder::class);
        $this->call(PermissionRoleTableSeeder::class);
        $this->call(UserRoleTableSeeder::class);
        $this->call(PaymentMethodTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        // $this->call(ServiceTableSeeder::class);
        $this->call(IncomeTableSeeder::class);
        $this->call(ExpenseTableSeeder::class);
        $this->call(SmallBoxTableSeeder::class);
        $this->call(NoteTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(ClothTableSeeder::class);
        $this->call(ColorTableSeeder::class);
        $this->call(GenderTableSeeder::class);
        $this->call(LineTableSeeder::class);
        $this->call(SizeTableSeeder::class);
        $this->call(SleeveTableSeeder::class);
        $this->call(UnitTableSeeder::class);
        $this->call(StatusTableSeeder::class);

        $this->enableForeignKeys();
    }
}
