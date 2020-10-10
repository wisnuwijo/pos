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

    public function setClosingBalance()
    {
        return view('modules.general.setClosingBalance');
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
