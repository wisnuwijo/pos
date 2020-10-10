<?php

use Illuminate\Database\Seeder;

class GoodsCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('goods_category')
            ->insert([
                [
                    'name' => 'Finished Goods'
                ],
                [
                    'name' => 'Raw Material'
                ]
            ]);
    }
}
