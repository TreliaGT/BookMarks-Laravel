<?php

use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            'name' => 'Admin Access',
            'guard_name' =>'web',
        ]);

        DB::table('permissions')->insert([
            'name' => 'User Access',
            'guard_name' =>'web',
        ]);

        DB::table('roles')->insert([
            'name' => 'Admin',
            'guard_name' =>'web',
        ]);
        DB::table('roles')->insert([
            'name' => 'User',
            'guard_name' =>'web',
        ]);

        DB::table('role_has_permissions')->insert([
        'permission_id' => 1,
        'role_id' => 1,
        ]);

        DB::table('role_has_permissions')->insert([
        'permission_id' => 2,
        'role_id' => 2,
        ]);

        DB::table('model_has_roles')->insert([
            'role_id' => 1,
            'model_type' => 'App\User',
            'model_id' => 1,
        ]);
    }
}
