<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')
            ->insert([
                [
                    'role_id' => 1,
                    'name' => 'Owner',
                    'email' => 'owner@gmail.com',
                    'username' => 'owner',
                    'password' => bcrypt('12345678'),
                    'secret' => '12345678',
                    'created_at' => now()
                ],
                [
                    'role_id' => 2,
                    'name' => 'Staff',
                    'email' => 'staff@gmail.com',
                    'username' => 'staff',
                    'password' => bcrypt('12345678'),
                    'secret' => '12345678',
                    'created_at' => now()
                ]
            ]);
    }
}
