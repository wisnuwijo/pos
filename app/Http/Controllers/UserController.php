<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class UserController extends Controller
{
    public function index(Request $req)
    {
        $user = DB::table('users')
                ->select([
                    'users.*',
                    'shift.name as shiftName',
                    'shift.id as shiftId'
                ])
                ->leftJoin('shift','users.shift_id','shift.id')
                ->get();

        $data = [
            'user' => $user
        ];

        return view('modules.user.index', $data);
    }

    public function add(Request $req)
    {
        $user = DB::table('users')
                ->select([
                    'users.*',
                    'shift.name as shiftName',
                    'shift.id as shiftId'
                ])
                ->leftJoin('shift','users.shift_id','shift.id')
                ->get();

        $data = [
            'user' => $user,
            'shift' => DB::table('shift')->get()
        ];

        return view('modules.user.add', $data);
    }

    public function addShift(Request $req)
    {
        $shiftName = $req->shift_name;
        $start = $req->start;
        $end = $req->end;

        $insertShift = DB::table('shift')
                       ->insert([
                           'name' => $shiftName,
                           'start' => $start,
                           'end' => $end
                       ]);

        if ($insertShift) {
            $getShift = DB::table('shift')->get();
            $response = [
                'success' => true,
                'data' => $getShift
            ];

            return response()->json($response);
        } else {
            return response()->json([
                'success' => false,
                'data' => []
            ], 500);
        }
    }
}
