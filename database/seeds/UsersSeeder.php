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

        DB::table('users')->insert([
            'name' => 'Guest',
            'password' => bcrypt('Password!'),
        ]);
    }
}
