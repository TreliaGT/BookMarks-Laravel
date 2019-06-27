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
            'email' => 'admin@localhost.com',
            'password' => bcrypt('APassword!'),
        ]);

        DB::table('profiles')->insert([
            'user_id' => 1,
        ]);

        DB::table('users')->insert([
            'name' => 'UserAdmin',
            'email' => 'Useradmin@localhost.com',
            'password' => bcrypt('UAPassword!'),
        ]);

        DB::table('profiles')->insert([
            'user_id' => 2,
        ]);

        DB::table('users')->insert([
            'name' => 'SnowWhite',
            'email' => 'SnowWhite@localhost.com',
            'password' => bcrypt('SnowWhite'),
        ]);

        DB::table('profiles')->insert([
            'user_id' => 3,
            'first_name' => 'Snow',
            'last_name' => 'White',
            'avatar' => '123456.jpg',
        ]);

        DB::table('users')->insert([
            'name' => 'EvilQueen',
            'email' => 'EvilQueen@localhost.com',
            'password' => bcrypt('EvilQueen'),
        ]);

        DB::table('profiles')->insert([
            'user_id' => 4,
            'first_name' => 'Evil',
            'last_name' => 'Queen',
        ]);

    }
}
