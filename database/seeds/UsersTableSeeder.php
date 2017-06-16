<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pt32_users')->insert([
            'username' => 'member',
            'email' => 'member@gmail.com',
            'password' => bcrypt('member'),
            'level' => 3,
            'created_at' => new DateTime(),
        ]);
    }
}
