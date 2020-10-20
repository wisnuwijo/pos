<?php

use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_method')
            ->insert([
                [
                    'name' => 'Cash'
                ],
                [
                    'name' => 'Gopay'
                ],
                [
                    'name' => 'Ovo'
                ],
                [
                    'name' => 'LinkAja'
                ],
                [
                    'name' => 'Dana'
                ]
            ]);
    }
}
