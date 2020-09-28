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
                    'shift.id as shiftId',
                    'role.name as roleName',
                    'role.id as roleId'
                ])
                ->leftJoin('shift','users.shift_id','shift.id')
                ->leftJoin('role','users.role_id','role.id')
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
            'shift' => DB::table('shift')->get(),
            'role' => DB::table('role')->get()
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

    public function checkUsername(Request $req)
    {
        $username = $req->username;
        $exception = $req->exception;

        if ($exception != null && $exception != '') {
            $checkUsername = DB::table('users')
                                ->where('username', $username)
                                ->first();

            if ($exception == $username) {
                $checkUsername = null;
            }
        } else {
            $checkUsername = DB::table('users')
                                ->where('username', $username)
                                ->first();
        }

        if (!isset($checkUsername)) {
            return response()->json([
                'status' => true
            ]);
        } else {
            return response()->json([
                'status' => false
            ], 500);
        }

    }

    public function addUser(Request $req)
    {
        $shiftName = $req->shift_name;
        $name = $req->name;
        $username = $req->username;
        $role = $req->role;
        $shift = $req->shift;
        $password = $req->password;

        $insertUser = DB::table('users')
                        ->insert([
                            'role_id' => $role,
                            'shift_id' => $shift,
                            'name' => $name,
                            'username' => $username,
                            'password' => bcrypt($password),
                            'secret' => $password
                        ]);

        if ($insertUser) {
            return redirect('/user')->with(['success' => 'Pengguna berhasil ditambahkan']);
        } else {
            return redirect('/user')->with(['error' => 'Pengguna gagal ditambah']);;
        }
    }

    public function deleteUser(Request $req, $userId)
    {
        $deleteUser = DB::table('users')->where('id', $userId)->delete();
        if ($deleteUser) {
            return redirect('/user')->with(['success' => 'Pengguna berhasil dihapus']);
        } else {
            return redirect('/user')->with(['error' => 'Pengguna gagal dihapus']);;
        }
    }

    public function edit($userId)
    {
        $getUser = DB::table('users')->where('id', $userId)->first();
        if (isset($getUser)) {
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
                'currentUser' => $getUser,
                'shift' => DB::table('shift')->get(),
                'role' => DB::table('role')->get()
            ];

            return view('modules.user.edit', $data);
        } else {
            return abort(404);
        }
    }

    public function editUser(Request $req, $userId)
    {
        $updateUser = DB::table('users')
                        ->where('id', $userId)
                        ->update([
                            'name' => $req->name,
                            'username' => $req->username,
                            'password' => bcrypt($req->password),
                            'secret' => $req->password,
                            'role_id' => $req->role,
                            'shift_id' => $req->shift,
                            'updated_at' => now(),
                        ]);

        if ($updateUser) {
            return redirect('/user')->with(['success' => 'Pengguna berhasil diubah']);
        } else {
            return redirect('/user')->with(['error' => 'Pengguna gagal diubah']);;
        }
    }
}
