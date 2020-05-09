<?php

use App\Models\Auth\User;
use Illuminate\Database\Seeder;

/**
 * Class UserRoleTableSeeder.
 */
class UserRoleTableSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seed.
     */
    public function run()
    {
        $this->disableForeignKeys();

        User::find(1)->assignRole(config('access.users.admin_role'));
        User::find(2)->assignRole('ejecutivo');
        User::find(3)->assignRole(config('access.users.default_role'));

        if (app()->environment() !== 'production') {
            $range = range(4, 13);
            foreach ($range as $rang) {
                User::find($rang)->assignRole(config('access.users.default_role'));
            }
        }

        $this->enableForeignKeys();
    }
}
