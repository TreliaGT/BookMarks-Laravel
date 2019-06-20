<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'password' => bcrypt('APassword!'),
        ]);

        DB::table('profiles')->insert([
            'email' => 'admin@admin.com',
            'user_id' => 1,
        ]);

        DB::table('users')->insert([
            'name' => 'UserAdmin',
            'password' => bcrypt('UAPassword!'),
        ]);

        DB::table('profiles')->insert([
            'email' => 'Useradmin@admin.com',
            'user_id' => 2,
        ]);

    }
}
