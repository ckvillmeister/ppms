<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Settings;
use App\Models\Roles;
use App\Enums\Lists;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RolesController extends Controller
{
    public function index()
    {
        if(!(Auth::check()))
        {
            return redirect('/');
        }
        else{
            $settings = Settings::all();

            if ($this::isAuthorized(Auth::user()->role, 'sidebarRoles')){
                return view('roles.index', array('settings' => $settings));
            }
            else{
                return view('forbidden.index', array('settings' => $settings));
            }
        }
    }

    public function managePermissions(){
        if(!(Auth::check()))
        {
            return redirect('/');
        }
        else{
            $settings = Settings::all();
            
            if ($this::isAuthorized(Auth::user()->role, 'pagePermission')){
                $permissions = DB::table('permissions')
                                ->where('status', '=', 1)
                                ->get();

                return view('roles.manage_permissions', array('settings' => $settings,
                                                                'permissions' => $permissions));
            }
            else{
                return view('forbidden.index', array('settings' => $settings));
            }
        }
    }

    public function create(Request $request)
    {
        $id = $request->input('id');

        if ($id){
            $data = ['role' => $request->input('role'),
                        'updatedby' => Auth::user()->id,
                        'dateupdated' => date('Y-m-d H:i:s'),
                        'status' => 1];
                        
            $result = Roles::where('id', $id)
                            ->update($data);

            return array('result' => 'Success',
                            'color' => 'green',
                            'message' => 'Role successfully updated!');
        }
        else{
            $data = ['role' => $request->input('role'),
                        'createdby' => Auth::user()->id,
                        'datecreated' => date('Y-m-d H:i:s'),
                        'status' => 1];
        
            $result = Roles::create($data);

            return array('result' => 'Success',
                            'color' => 'green',
                            'message' => 'Role measurement successfully added!');
        }
        
    }

    public function retrieveRoles(Request $request){
        $roles = DB::table('roles')
                        ->where('status', '=', $request->input('status'))
                        ->get();

        return view('roles.rolelist', array('roles' => $roles));
    }

    public function getForm(Request $request){
        $id = ($request->input('id')) ? $request->input('id') : 0;

        $roleinfo = DB::table('roles')
                        ->where('id', '=', $id)
                        ->get();

        return view('roles.roleform', array('roleinfo' => $roleinfo));
    }

    public function toggleStatus(Request $request){
        $id = $request->input('id');
        $status = $request->input('status');
        $message = '';

        $data = [
            'updatedby' => Auth::user()->id,
            'dateupdated' => date('Y-m-d H:i:s'),
            'status' => $status
        ];
        
        $result = Roles::where('id', $id)
                            ->update($data);
        
        if ($status){
            $message = 'Role successfully re-activated!';
        }
        else{
            $message = 'Role measurement successfully removed!';
        }
        return array('result' => 'Success',
                        'color' => 'green',
                        'message' => $message);
    }

    public function saveRolePermissions(Request $request){
        $id = $request->input('id');
        $permissions = $request->input('permissions');

        foreach($permissions as $permission){
            $permissioninfo = DB::table('role_permissions')
                ->where('role_id', '=', $id )
                ->where('permission_id', '=', $permission)
                ->get();

            if (count($permissioninfo) <=0 ){
                DB::table('role_permissions')->insert([
                    'role_id' => $id,
                    'permission_id' => $permission,
                    'createdby' => Auth::user()->id,
                    'datecreated' => date('Y-m-d H:i:s'),
                    'status' => 1
                ]); 
            }
            else{
                DB::table('role_permissions')
                    ->where('role_id', '=', $id)
                    ->where('permission_id', '=', $permission)
                    ->update(['status' => 1]);
            }
        }
        
        return array('result' => 'Success',
                        'color' => 'green',
                        'message' => 'Role permissions successfully saved!');
    }
    
}
