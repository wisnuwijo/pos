<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
// use Maatwebsite\Excel\Concerns\FromCollection;
use DB;

class SalesExport implements FromView
{
    
    public function view(): View
    {
        $getAllSales = DB::table('transaction')
                        ->select(['transaction.*', 'payment_method.name as payment_method_name'])
                        ->leftJoin('payment_method', 'transaction.payment_method_id','payment_method.id')
                        ->orderBy('transaction.id','desc')
                        ->get();

        $sales = [];
        if (count($getAllSales) > 0) {
            foreach ($getAllSales as $gas) {
                $detail = DB::table('transaction_detail')
                          ->where('transaction_id', $gas->id)
                          ->get();

                $sales[] = [
                    'customer_name' => $gas->customer_name,
                    'created_at' => $gas->created_at,
                    'grand_total' => $gas->grand_total,
                    'payment_method_name' => $gas->payment_method_name,
                    'pickup_method' => $gas->pickup_method,
                    'detail' => $detail
                ];
            }
        }

        $data = [
            'sales' => $sales
        ];

        return view('modules.transaction.excel', $data);
    }
}
