<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ReportController extends Controller
{
    public function index(Request $req)
    {
        $getShiftRecord = DB::table('shift_record')
                            ->select([
                                'shift_record.*',
                                'users.name'
                            ])
                            ->join('users','shift_record.user_id','users.id')
                            ->orderBy('id','desc')
                            ->get();

        return view('modules.report.index', [
            'shift' => $getShiftRecord
        ]);
    }

    public function jurnal(Request $req)
    {
        $whereParam = [];
        if (isset($req->shift_record_id)) {
            $whereParam = [
                ['id',$req->shift_record_id]
            ];
        } else {
            $whereParam = [
                ['active',1]
            ];
        }

        $jurnalOpeningShift = DB::table('shift_record')
                                ->where($whereParam)
                                ->first();

        $shiftRecordId = isset($jurnalOpeningShift) ? $jurnalOpeningShift->id : 0;
        $staffId = isset($jurnalOpeningShift) ? $jurnalOpeningShift->user_id : 0;
        $staffName = $staffId != 0 ? DB::table('users')->where('id', $staffId)->first()->name : '';

        $getShiftTrx = DB::table('transaction')
                        ->selectRaw('"'.$staffName.'" as staff, grand_total, created_at, "Income" as type')
                        ->where('shift_record_id', $shiftRecordId);

        $getShiftSpending = DB::table('spending')
                            ->selectRaw('"'.$staffName.'" as staff, grand_total, created_at, "Spending" as type')
                            ->where('shift_record_id', $shiftRecordId)
                            ->union($getShiftTrx)
                            ->orderBy('created_at','asc')
                            ->get();

        $journal = [];
        $currentBalance = isset($jurnalOpeningShift) ? $jurnalOpeningShift->opening_balance : 0;
        for ($i=0; $i < count($getShiftSpending); $i++) {
            $journal[$i]['no'] = $i + 2;
            $journal[$i]['staff'] = $getShiftSpending[$i]->staff;
            $journal[$i]['grand_total'] = 'Rp. '.formatNumber($getShiftSpending[$i]->grand_total);
            $journal[$i]['created_at'] = formatDate($getShiftSpending[$i]->created_at);
            $journal[$i]['type'] = $getShiftSpending[$i]->type;

            if (strtolower($getShiftSpending[$i]->type) == 'income') {
                // +
                $currentBalance += $getShiftSpending[$i]->grand_total;
                $journal[$i]['balance'] = 'Rp. '.formatNumber($currentBalance);
            } else {
                // -
                $currentBalance -= $getShiftSpending[$i]->grand_total;
                $journal[$i]['balance'] = 'Rp. '.formatNumber($currentBalance);
            }
        }

        if (isset($jurnalOpeningShift)) {
            array_unshift($journal, [
                'no' => 1,
                'staff' => $staffName,
                'grand_total' => 'Rp. '.formatNumber($jurnalOpeningShift->opening_balance),
                'created_at' => formatDate($jurnalOpeningShift->created_at),
                'type' => 'Opening Balance',
                'balance' => 'Rp. '.formatNumber($jurnalOpeningShift->opening_balance),
            ]);
        }

        if (isset($jurnalOpeningShift) && $jurnalOpeningShift->closing_balance != null) {
            $journal[] = [
                'no' => count($journal) + 1,
                'staff' => $staffName,
                'grand_total' => 'Rp. '.formatNumber($jurnalOpeningShift->closing_balance),
                'created_at' => formatDate($jurnalOpeningShift->updated_at),
                'type' => 'Closing Balance',
                'balance' => 'Rp. '.formatNumber($jurnalOpeningShift->closing_balance),
            ];
        }

        return response()->json([
            'data' => $journal
        ]);
    }
}
