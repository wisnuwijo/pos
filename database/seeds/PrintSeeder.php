<?php

use Illuminate\Database\Seeder;

class PrintSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('print')
            ->insert([
                [
                    'print_data' => '{"title":"SLEEPLESS COFFEE","subtitle":"Jl. Kolonel Sugiono, Susukan, Ungaran Timur, Kab. Semarang","closing1":"Thank You","closing2":"follow our instagram","closing3":"sleeplesscoffeestay"}'
                ],
                [
                    'created_at' => now()
                ]
            ]);
    }
}
