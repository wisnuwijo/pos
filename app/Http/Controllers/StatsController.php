<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class StatsController extends Controller
{
    public function income(Request $req)
    {
        $firstDate = $req->from ?? date('Y-m-01');
        $currentDate = $req->to ?? date('Y-m-d');

        $from = $req->from ?? date('Y-m-01');
        $to = $req->to ?? date('Y-m-d');

        // Set timezone
        date_default_timezone_set('UTC');

        $getTrx = DB::table('transaction')
                    ->whereBetween('created_at', [
                        date('Y-m-d 00:00:00', strtotime($from)),
                        date('Y-m-d 23:59:00', strtotime($to))
                    ])
                    ->get();

        $income = [];
        $totalIncome = [];
        if (count($getTrx) > 0) {
            foreach ($getTrx as $gx) {
                $dateIndex = date('Y-m-d', strtotime($gx->created_at));
                $income[$dateIndex]['detail'][] = $gx->grand_total;
                $income[$dateIndex]['total'] = array_sum($income[$dateIndex]['detail']);

                $totalIncome[] = $gx->grand_total;
            }
        }

        $finalIncome = [];
        $date = [];
        $index = 0;
        while (strtotime($from) <= strtotime($to)) {
            $j = date('d', strtotime($from));
            $k = date('Y-m-d', strtotime($from));

            $date[$j] = $k;

            if (isset($income[$k])) {
                $finalIncome[$index] = $income[$k];
            } else {
                $finalIncome[$index]['detail'] = [];
                $finalIncome[$index]['total'] = 0;
            }

            $finalIncome[$index]['date'] = $j;
            $finalIncome[$index]['full_date'] = $k;
            $from = date ("Y-m-d", strtotime("+1 day", strtotime($from)));

            $index++;
        }

        // pie chart
        $getTrxPie = DB::table('transaction_detail')
                    ->selectRaw('SUM(qty) AS goods_ordered, goods_name, SUM(goods_price_after_discount) AS total_price')
                    ->whereBetween('created_at', [
                        date('Y-m-d 00:00:00', strtotime($firstDate)),
                        date('Y-m-d 23:59:00', strtotime($to))
                    ])
                    ->groupBy('goods_id')
                    ->get();

        $totalItem = DB::table('transaction_detail')
                    ->selectRaw('SUM(qty) AS goods_ordered')
                    ->whereBetween('created_at', [
                        date('Y-m-d 00:00:00', strtotime($firstDate)),
                        date('Y-m-d 23:59:00', strtotime($to))
                    ])
                    ->get();

        $totalPurchasedItem = count($totalItem) > 0 ? $totalItem[0]->goods_ordered : 0;

        return response()->json([
            'success' => true,
            'data' => [
                'total_income' => 'Rp. '.formatNumber(array_sum($totalIncome)),
                'total_item' => $totalPurchasedItem ?? 0,
                'barchart' => $finalIncome,
                'piechart' => $getTrxPie
            ]
        ]);
    }

    public function outcome(Request $req)
    {
        $from = $req->from ?? date('Y-m-01');
        $iteratedFrom = $req->from ?? date('Y-m-01');
        $to = $req->to ?? date('Y-m-d');

        // Set timezone
        date_default_timezone_set('UTC');

        $getTrx = DB::table('spending')
                    ->whereBetween('created_at', [
                        date('Y-m-d 00:00:00', strtotime($from)),
                        date('Y-m-d 23:59:00', strtotime($to))
                    ])
                    ->get();

        $outcome = [];
        $totalOutcome = [];
        if (count($getTrx) > 0) {
            foreach ($getTrx as $gx) {
                $dateIndex = date('Y-m-d', strtotime($gx->created_at));
                $outcome[$dateIndex]['detail'][] = $gx->grand_total;
                $outcome[$dateIndex]['total'] = array_sum($outcome[$dateIndex]['detail']);

                $totalOutcome[] = $gx->grand_total;
            }
        }

        $totalItem = DB::table('spending_detail')
                    ->selectRaw('SUM(qty) AS spending_qty')
                    ->whereBetween('created_at', [
                        date('Y-m-d 00:00:00', strtotime($from)),
                        date('Y-m-d 23:59:00', strtotime($to))
                    ])
                    ->get();

        $totalSpendingQty = count($totalItem) > 0
                        ? $totalItem[0]->spending_qty
                        : 0;

        $finalOutcome = [];
        $date = [];
        $index = 0;
        while (strtotime($iteratedFrom) <= strtotime($to)) {
            $j = date('d', strtotime($iteratedFrom));
            $k = date('Y-m-d', strtotime($iteratedFrom));

            $date[$j] = $k;

            if (isset($outcome[$k])) {
                $finalOutcome[$index] = $outcome[$k];
            } else {
                $finalOutcome[$index]['detail'] = [];
                $finalOutcome[$index]['total'] = 0;
            }

            $finalOutcome[$index]['date'] = $j;
            $finalOutcome[$index]['full_date'] = $k;
            $iteratedFrom = date ("Y-m-d", strtotime("+1 day", strtotime($iteratedFrom)));

            $index++;
        }

        // pie chart
        $getTrxPie = DB::table('spending_detail')
                    ->selectRaw('SUM(qty) AS spending_qty, goods_name, SUM(price) AS total_price')
                    ->whereBetween('created_at', [
                        date('Y-m-d 00:00:00', strtotime($from)),
                        date('Y-m-d 23:59:00', strtotime($to))
                    ])
                    ->groupBy('goods_id')
                    ->get();

        return response()->json([
            'success' => true,
            'data' => [
                'total_outcome' => 'Rp. '.formatNumber(array_sum($totalOutcome)),
                'total_item' => $totalSpendingQty ?? 0,
                'barchart' => $finalOutcome,
                'piechart' => $getTrxPie
            ]
        ]);
    }
}
