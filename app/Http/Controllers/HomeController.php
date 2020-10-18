<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $totalSales = DB::table('transaction')
                        ->where('created_at','LIKE',date('Y-m-d').'%')
                        ->get();

        $totalSpendingNumber = DB::table('spending')
                                ->where('created_at','LIKE',date('Y-m-d').'%')
                                ->get();

        $date = date('Y-m-d');
        $totalIncomeQuery = 'SELECT SUM(grand_total) as total FROM transaction WHERE created_at LIKE "'.$date.'%"';
        $totalIncome = DB::select($totalIncomeQuery);

        $totalSpendQuery = 'SELECT SUM(grand_total) as total FROM spending WHERE created_at LIKE "'.$date.'%"';
        $totalSpend = DB::select($totalSpendQuery);

        $data = [
            'total_sales' => count($totalSales),
            'total_spend' => $totalSpend,
            'total_income' => $totalIncome,
            'total_spending_number' => count($totalSpendingNumber)
        ];

        return view('modules.dashboard.blank', $data);
    }

    public function setOpeningBalance(Request $req)
    {
        return view('modules.general.setOpeningBalance');
    }

    public function saveOpeningBalance(Request $req)
    {
        $deactivateAllShiftRecord = DB::table('shift_record')
                                    ->where('active',1)
                                    ->update([
                                        'active' => 0
                                    ]);

        $insert = DB::table('shift_record')
                    ->insert([
                        'active' => 1,
                        'user_id' => Auth::user()->id,
                        'shift_id' => Auth::user()->shift_id,
                        'start' => now(),
                        'opening_balance' => $req->opening_balance,
                        'created_at' => now(),
                    ]);

        $getActiveShift = DB::table('shift_record')
                            ->where('active',1)
                            ->first();

        $updateUser = DB::table('users')
                        ->where('id', Auth::user()->id)
                        ->update([
                            'shift_record_id' => $getActiveShift->id
                        ]);

        if ($insert) {
            return redirect('/')->with(['success' => 'Kas awal tersimpan']);
        } else {
            return redirect('/')->with(['error' => 'Kas awal gagal tersimpan']);;
        }
    }

    public function calculateJournal()
    {
        $jurnalOpeningShift = DB::table('shift_record')
                                ->where([
                                    ['active',1]
                                ])
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

        $currentBalance = isset($jurnalOpeningShift) ? $jurnalOpeningShift->opening_balance : 0;
        $finalBalance = 0;
        for ($i=0; $i < count($getShiftSpending); $i++) {
            if (strtolower($getShiftSpending[$i]->type) == 'income') {
                // +
                $currentBalance += $getShiftSpending[$i]->grand_total;
                $finalBalance = $currentBalance;
            } else {
                // -
                $currentBalance -= $getShiftSpending[$i]->grand_total;
                $finalBalance = $currentBalance;
            }
        }

        return $finalBalance;
    }

    public function setClosingBalance()
    {
        $data = [
            'journal' => $this->calculateJournal()
        ];

        return view('modules.general.setClosingBalance', $data);
    }

    public function saveClosingBalance(Request $req)
    {
        $update = DB::table('shift_record')
                    ->where('active',1)
                    ->update([
                        'finish' => now(),
                        'closing_balance' => $req->closing_balance,
                        'updated_at' => now()
                    ]);

        $updateUser = DB::table('users')
                        ->where('id', Auth::user()->id)
                        ->update([
                            'shift_record_id' => null
                        ]);

        $deactivateAllShiftRecord = DB::table('shift_record')
                                    ->where('active',1)
                                    ->update([
                                        'active' => 0
                                    ]);

        if ($update) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false], 500);
        }
    }
}
