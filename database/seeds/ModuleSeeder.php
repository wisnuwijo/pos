<?php

use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('module')
            ->insert([
                [
                    'name' => 'Dashboard',
                    'url' => '/'
                ],
                [
                    'name' => 'Pengguna',
                    'url' => 'user'
                ],
                [
                    'name' => 'Transaksi',
                    'url' => 'transaction'
                ],
                [
                    'name' => 'Laporan',
                    'url' => 'report'
                ],
                [
                    'name' => 'Pengaturan',
                    'url' => 'setting'
                ],
            ]);
    }
}
