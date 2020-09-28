<?php

use Illuminate\Database\Seeder;

class AccessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('access')
            ->insert([
                [
                    'module_id' => '1',
                    'role_id' => '1'
                ],
                [
                    'module_id' => '2',
                    'role_id' => '1'
                ],
                [
                    'module_id' => '3',
                    'role_id' => '1'
                ],
                [
                    'module_id' => '4',
                    'role_id' => '1'
                ],
                [
                    'module_id' => '5',
                    'role_id' => '1'
                ]
            ]);
    }
}
