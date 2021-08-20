<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Controllers\AuthenticationController as Authentication; 
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public static function isAuthorized($roleid, $permissionCode){
        $result = DB::table('role_permissions')
                        ->join('permissions', 'permissions.id', '=', 'role_permissions.permission_id')
                        ->select('role_permissions.*')
                        ->where('role_permissions.role_id', '=', $roleid)
                        ->where('permissions.permission_code', '=', $permissionCode)
                        ->get();

        if (count($result) >= 1){
            return 1;
        }

        return 0;
    }

    public static function hasAccess($roleid, $permissionID){
        $result = DB::table('role_permissions')
                        ->where('role_id', '=', $roleid)
                        ->where('.permission_id', '=', $permissionID)
                        ->get();

        if (count($result) >= 1){
            return 1;
        }

        return 0;
    }
}
