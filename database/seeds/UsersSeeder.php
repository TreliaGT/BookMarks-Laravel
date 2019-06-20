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
            'email' => 'admin@admin.com',
            'password' => bcrypt('APassword!'),
        ]);

        DB::table('profiles')->insert([
            'user_id' => 1,
        ]);

        DB::table('users')->insert([
            'name' => 'UserAdmin',
            'email' => 'Useradmin@admin.com',
            'password' => bcrypt('UAPassword!'),
        ]);

        DB::table('profiles')->insert([
            'user_id' => 2,
        ]);

    }
}
