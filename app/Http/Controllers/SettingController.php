<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SettingController extends Controller
{
    public function index(Request $req)
    {
        $getModule = DB::table('module')
                    ->get();

        $getRole = DB::table('role')->get();

        $data = [
            'module' => $getModule,
            'role' => $getRole
        ];

        return view('modules.setting.index', $data);
    }

    public function grantAccess(Request $req)
    {
        $roleId = $req->role_id;
        $moduleId = $req->module_id;

        $verifyAccess = DB::table('access')
                        ->where([
                            ['module_id', $moduleId],
                            ['role_id', $roleId]
                        ])
                        ->first();

        $manageAccess = false;
        if (isset($verifyAccess)) {
            // revoke access
            $manageAccess = DB::table('access')
                            ->where([
                                ['role_id', $roleId,],
                                ['module_id', $moduleId]
                            ])
                            ->delete();
        } else {
            $manageAccess = DB::table('access')
                            ->insert([
                                'role_id' => $roleId,
                                'module_id' => $moduleId,
                                'created_at' => now()
                            ]);
        }

        if ($manageAccess) {
            return response()->json([
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => false
            ], 500);
        }
    }
}
