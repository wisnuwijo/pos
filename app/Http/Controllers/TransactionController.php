<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class TransactionController extends Controller
{
    public function index(Request $req)
    {
        $goods = DB::table('goods')
                    ->select([
                        'goods.*',
                        'supplier.name as supplierName',
                        'supplier.id as supplierId',
                        'goods_category.name as goodsCategoryName',
                    ])
                    ->leftJoin('supplier','goods.supplier_id','supplier.id')
                    ->leftJoin('goods_category','goods.goods_category_id','goods_category.id')
                    ->orderBy('goods.id','DESC')
                    ->get();

        $spending = DB::table('spending')
                    ->orderBy('id','desc')
                    ->get();

        $transaction = DB::table('transaction')
                        ->select(['transaction.*', 'payment_method.name as paymentMethodName'])
                        ->join('payment_method','transaction.payment_method_id','payment_method.id')
                        ->orderBy('transaction.id','desc')
                        ->get();
        $data = [
            'goods' => $goods,
            'spending' => $spending,
            'transaction' => $transaction
        ];

        return view('modules.transaction.index', $data);
    }

    public function detailTrx(Request $req, $id)
    {
        $transaction = DB::table('transaction')
                        ->select([
                            'transaction.*',
                            'voucher.voucher_name',
                            'payment_method.name as paymentMethod'
                        ])
                        ->leftJoin('voucher', 'transaction.voucher_id','voucher.id')
                        ->leftJoin('payment_method', 'transaction.payment_method_id','payment_method.id')
                        ->where([
                            ['transaction.id', $id]
                        ])
                        ->first();

        if (!isset($transaction)) {
            return abort(404);
        }

        $detailTransaction = DB::table('transaction_detail')
                                ->where('transaction_detail.transaction_id',$id)
                                ->get();

        $data = [
            'detail_transaction' => $detailTransaction,
            'transaction' => $transaction
        ];

        return view('modules.transaction.transactionDetail', $data);
    }

    public function addSupplier(Request $req)
    {
        $addSupplier = DB::table('supplier')
                        ->insert([
                            'name' => $req->name,
                            'address' => $req->address,
                            'created_at' => now()
                        ]);

        if ($addSupplier) {
            $getSuppllier = DB::table('supplier')->get();
            return response()->json([
                'data' => $getSuppllier
            ]);
        } else {
            return response()->json([
                'data' => []
            ], 500);
        }
    }

    public function addGoods(Request $req)
    {
        $getSupplier = DB::table('supplier')->get();
        $goodsCategory = DB::table('goods_category')->get();
        $data = [
            'supplier' => $getSupplier,
            'goods_category' => $goodsCategory
        ];

        return view('modules.transaction.goodsAdd', $data);
    }

    public function goodsCategory(Request $req)
    {
        $addCategory = DB::table('goods_category')
                        ->insert([
                            'name' => $req->name,
                            'created_at' => now()
                        ]);

        if ($addCategory) {
            $getCategory = DB::table('goods_category')->get();
            return response()->json([
                'data' => $getCategory
            ]);
        } else {
            return response()->json([
                'data' => []
            ], 500);
        }
    }

    public function storeGoods(Request $req)
    {
        // generate goods code
        $code = 'GDS-1';
        $getGoods = DB::table('goods')->get();
        if (count($getGoods) > 0) {
            $containNumber = [];
            foreach ($getGoods as $gg) {
                $getNumber = ltrim($gg->code,'GDS-');
                $containNumber[] = $getNumber;
            }

            $maxNumber = max($containNumber) + 1;
            $code = 'GDS-'.$maxNumber;
        }

        $insertGoods = DB::table('goods')
                        ->insert([
                            'code' => $code,
                            'goods_category_id' => $req->goods_category,
                            'supplier_id' => $req->supplier,
                            'name' => $req->name,
                            'selling_price' => $req->selling_price
                        ]);

        if ($insertGoods) {
            return redirect('/transaction')->with(['success' => 'Barang berhasil ditambah']);
        } else {
            return redirect('/transaction')->with(['error' => 'Barang gagal ditambahkan']);;
        }
    }

    public function editGoods(Request $req, $goodsId)
    {
        $getGoods = DB::table('goods')
                    ->select([
                        'goods.*',
                        'supplier.id as supplierId',
                        'supplier.name as supplierName'
                    ])
                    ->leftJoin('supplier','goods.supplier_id','supplier.id')
                    ->where('goods.id', $goodsId)
                    ->first();

        $getSupplier = DB::table('supplier')->get();
        $data = [
            'goods' => $getGoods,
            'supplier' => $getSupplier
        ];

        if (isset($getGoods)) {
            return view('modules.transaction.goodsEdit', $data);
        } else {
            return abort(404);
        }
    }

    public function updateGoods(Request $req, $goodsId)
    {
        $updateGoods = DB::table('goods')
                        ->where('id', $goodsId)
                        ->update([
                            'name' => $req->name,
                            'selling_price' => $req->selling_price,
                            'supplier_id' => $req->supplier,
                            'updated_at' => now()
                        ]);

        if ($updateGoods) {
            return redirect('/transaction')->with(['success' => 'Barang berhasil diubah']);
        } else {
            return redirect('/transaction')->with(['error' => 'Barang gagal diubah']);;
        }
    }

    public function deleteGoods(Request $req, $id)
    {
        $deleteGoods = DB::table('goods')->where('id', $id)->delete();

        if ($deleteGoods) {
            return redirect('/transaction')->with(['success' => 'Barang berhasil dihapus']);
        } else {
            return redirect('/transaction')->with(['error' => 'Barang gagal dihapus']);;
        }
    }

    public function transactionAdd(Request $req)
    {
        $goods = DB::table('goods')->where('goods_category_id',1)->get();
        $voucher = DB::table('voucher')->get();
        $paymentMethod = DB::table('payment_method')->get();

        $data = [
            'goods' => $goods,
            'voucher' => $voucher,
            'paymentMethod' => $paymentMethod
        ];

        return view('modules.transaction.transactionAdd', $data);
    }

    public function getPrintNote(Request $req)
    {
        $getPrintNote = DB::table('print')->first();
        $decodeJson = json_decode($getPrintNote->print_data);

        $data = [
            'note' => $decodeJson
        ];

        return response()->json($data);
    }

    public function savePrintNote(Request $req)
    {
        $printNote = $req->note;
        $save = DB::table('print')
                ->where('id', 1)
                ->update([
                    'print_data' => $printNote
                ]);

        return response()->json([
            'success' => true
        ]);
    }

    public function addTransaction(Request $req)
    {
        $name = $req->name;
        $date = $req->date;
        $grandTotal = $req->grand_total;
        $voucher = $req->voucher;
        $paymentMethodId = $req->payment_method;
        $paymentReceived = $req->payment_received;
        $paymentChange = $req->payment_change;
        $pickupMethod = $req->pickup_method;

        $goods = $req->goods;
        $qty = $req->qty;
        $discountType = $req->discount_type;
        $discount = $req->discount;
        $price = $req->price;

        $insertTrx = DB::table('transaction')
                        ->insert([
                            'customer_name' => $name,
                            'shift_record_id' => Auth::user()->shift_record_id,
                            'pickup_method' => $pickupMethod,
                            'payment_method_id' => $paymentMethodId,
                            'payment_received' => $paymentReceived,
                            'payment_change' => $paymentChange,
                            'grand_total' => $grandTotal,
                            'total_qty' => array_sum($qty),
                            'voucher_id' => $voucher,
                            'created_at' => now()
                        ]);

        $getLastTrx = DB::table('transaction')
                        ->orderBy('id','desc')
                        ->first();

        $trxId = isset($getLastTrx) ? $getLastTrx->id : 0;
        for ($i=0; $i < count($goods); $i++) {
            $goodsName = DB::table('goods')
                            ->where('id',$goods[$i])
                            ->first();

            $discPercent = 0;
            $discAmount = 0;
            if ($discountType[$i] == 'percent') {
                $discPercent = $discount[$i];
            } else {
                $discAmount = $discount[$i];
            }

            $insertTrxDetail = DB::table('transaction_detail')
                                ->insert([
                                    'transaction_id' => $trxId,
                                    'qty' => $qty[$i],
                                    'goods_id' => $goods[$i],
                                    'goods_name' => $goodsName->name,
                                    'goods_price' => $goodsName->selling_price,
                                    'goods_price_after_discount' => $price[$i],
                                    'goods_discount_percent' => $discPercent,
                                    'goods_discount_amount' => $discAmount,
                                    'created_at' => now()
                                ]);
        }

        // return redirect('/transaction')->with(['success' => 'Transaksi berhasil ditambah']);
        $getHeader = DB::table('transaction')
                        ->where('id',$trxId)
                        ->first();
        $getDetail = DB::table('transaction_detail')
                        ->where('transaction_id',$trxId)
                        ->get();
        return response()->json([
            'header' => $getHeader,
            'detail' => $getDetail
        ]);
    }

    public function deleteTransaction(Request $req, $id)
    {
        $getHeader = DB::table('transaction')->where('id', $id)->first();
        $getDetail = DB::table('transaction_detail')->where('transaction_id', $id)->get();

        $headerJson = json_encode($getHeader);
        $detailJson = json_encode($getDetail);

        $backup = DB::table('deleted_transaction')
                    ->insert([
                        'user_id' => Auth::user()->id,
                        'transaction' => $headerJson,
                        'transaction_detail' => $detailJson,
                        'created_at' => now()
                    ]);

        $deleteHeader = DB::table('transaction')->where('id', $id)->delete();
        $deleteDetail = DB::table('transaction_detail')->where('transaction_id', $id)->delete();
        if ($deleteHeader && $deleteDetail) {
            return redirect('/transaction')->with(['success' => 'Transaksi berhasil dihapus']);
        } else {
            return redirect('/transaction')->with(['error' => 'Transaksi gagal dihapus']);;
        }
    }

    public function detailVoucher($id)
    {
        $data = json_encode(DB::table('voucher')->where('id',$id)->first());
        return response($data);
    }

    public function addVoucher(Request $req)
    {
        $voucherName = $req->voucher_name;
        $voucherDiscountPercent = $req->voucher_discount_percent;
        $voucherDiscountAmount = $req->voucher_discount_amount;

        $insertVoucher = DB::table('voucher')
                            ->insert([
                                'voucher_name' => $voucherName,
                                'voucher_discount_percent' => $voucherDiscountPercent,
                                'voucher_discount_amount' => $voucherDiscountAmount
                            ]);

        if ($insertVoucher) {
            $voucher = DB::table('voucher')->get();
            return response()->json(['data' => $voucher]);
        } else {
            return response()->json([], 500);
        }
    }

    public function getPrice($id)
    {
        $goods = DB::table('goods')
                    ->select([
                        'goods.*',
                        'goods_category.name as category_name',
                        'goods_category.id as category_id'
                    ])
                    ->leftJoin('goods_category','goods.goods_category_id','goods_category.id')
                    ->where('goods.id', $id)
                    ->first();

        return response()->json(
            isset($goods)
                ? ['data' => $goods]
                : ['data' => []]);
    }

    public function addPaymentMethod(Request $req)
    {
        $paymentMethodName = $req->payment_method_name;

        $insertPaymentMethod = DB::table('payment_method')
                                ->insert([
                                    'name' => $paymentMethodName,
                                    'created_at' => now()
                                ]);

        if ($insertPaymentMethod) {
            $paymentMethod = DB::table('payment_method')->get();
            return response()->json(['data' => $paymentMethod]);
        } else {
            return response()->json([], 500);
        }
    }

    public function addSpending(Request $req)
    {
        $goods = DB::table('goods')->where('goods_category_id', 2)->get();
        $voucher = DB::table('voucher')->get();
        $paymentMethod = DB::table('payment_method')->get();
        $supplier = DB::table('supplier')->get();

        $data = [
            'goods' => $goods,
            'voucher' => $voucher,
            'supplier' => $supplier,
            'paymentMethod' => $paymentMethod
        ];

        return view('modules.transaction.spendingAdd', $data);
    }

    public function storeSpending(Request $req)
    {
        $detailSupplier = DB::table('supplier')
                            ->where('id', $req->supplier)
                            ->first();

        // get spending ID
        $spending = DB::table('spending')->orderBy('id','desc')->first();
        $spendingId = isset($spending) ? $spending->id + 1 : 1;

        $insertSpending = DB::table('spending')
                            ->insert([
                                'id' => $spendingId,
                                'shift_record_id' => Auth::user()->shift_record_id,
                                'supplier_id' => $req->supplier,
                                'supplier_name' => isset($detailSupplier) ? $detailSupplier->name : '',
                                'grand_total' => $req->grand_total,
                                'note' => $req->note,
                                'created_at' => now()
                            ]);

        $goods = $req->goods;
        $category = $req->category;
        $qty = $req->qty;
        $price = $req->price;

        for ($i=0; $i < count($goods); $i++) {
            $getGoodsName = DB::table('goods')
                            ->select([
                                'goods.*',
                                'goods_category.name as category_name'
                            ])
                            ->leftJoin('goods_category','goods.goods_category_id','goods_category.id')
                            ->where('goods.id', $goods[$i])
                            ->first();

            $insertDetail = DB::table('spending_detail')
                            ->insert([
                                'spending_id' => $spendingId,
                                'goods_id' => $goods[$i],
                                'goods_category' => isset($getGoodsName) ? $getGoodsName->category_name : '',
                                'goods_name' => isset($getGoodsName) ? $getGoodsName->name : '',
                                'qty' => $qty[$i],
                                'price' => $price[$i],
                                'created_at' => now()
                            ]);
        }

        return redirect('/transaction')->with(['success' => 'Pengeluaran berhasil disimpan']);
    }

    public function detailSpending(Request $req, $id)
    {
        $spending = DB::table('spending')
                    ->where('id', $id)
                    ->first();

        if (!isset($spending)) {
            return abort(404);
        }

        $detailSpending = DB::table('spending_detail')
                        ->where('spending_detail.spending_id',$id)
                        ->get();

        $data = [
            'spending' => $spending,
            'detail_spending' => $detailSpending
        ];

        return view('modules.transaction.spendingDetail', $data);
    }

    public function deleteSpending($id)
    {
        $getHeader = DB::table('spending')->where('id', $id)->first();
        $getDetail = DB::table('spending_detail')->where('spending_id', $id)->get();

        $headerJson = json_encode($getHeader);
        $detailJson = json_encode($getDetail);

        $backup = DB::table('deleted_spending')
                    ->insert([
                        'user_id' => Auth::user()->id,
                        'spending' => $headerJson,
                        'spending_detail' => $detailJson,
                        'created_at' => now()
                    ]);

        $deleteHeader = DB::table('spending')->where('id', $id)->delete();
        $deleteDetail = DB::table('spending_detail')->where('spending_id', $id)->delete();
        if ($deleteHeader && $deleteDetail) {
            return redirect('/transaction')->with(['success' => 'Pengeluaran berhasil dihapus']);
        } else {
            return redirect('/transaction')->with(['error' => 'Pengeluaran gagal dihapus']);;
        }
    }

    public function journal(Request $req)
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

        // $getShiftTrx = DB::table('transaction')
        //                 ->selectRaw('"'.$staffName.'" as staff, grand_total, created_at, "Income" as type')
        //                 ->where('shift_record_id', $shiftRecordId);

        $getShiftTrx = DB::table('transaction')
                        ->selectRaw('"'.$staffName.'" as staff, payment_method.name as payment_method, transaction.grand_total, transaction.created_at, "Income" as type')
                        ->join('payment_method', 'transaction.payment_method_id','payment_method.id')
                        ->where('transaction.shift_record_id', $shiftRecordId);

        // $getShiftSpending = DB::table('spending')
        //                     ->selectRaw('"'.$staffName.'" as staff, grand_total, created_at, "Spending" as type')
        //                     ->where('shift_record_id', $shiftRecordId)
        //                     ->union($getShiftTrx)
        //                     ->orderBy('created_at','asc')
        //                     ->get();
        $getShiftSpending = DB::table('spending')
                            ->selectRaw('"'.$staffName.'" as staff, "" as payment_method, grand_total, created_at, "Spending" as type')
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
            $journal[$i]['payment_method'] = $getShiftSpending[$i]->payment_method;

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
                'payment_method' => ''
            ]);
        }

        if (isset($jurnalOpeningShift) && $jurnalOpeningShift->closing_balance != null) {
            $journal[] = [
                'no' => count($journal) + 1,
                'staff' => $staffName,
                'grand_total' => 'Rp. '.formatNumber($jurnalOpeningShift->closing_balance),
                'created_at' => formatDate($jurnalOpeningShift->created_at),
                'type' => 'Closing Balance',
                'balance' => 'Rp. '.formatNumber($jurnalOpeningShift->closing_balance),
                'payment_method' => ''
            ];
        }

        return response()->json([
            'data' => $journal
        ]);
    }

    public function transactionJournal(Request $req)
    {
        return view('modules.transaction.journal');
    }
}
