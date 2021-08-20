<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Departments;
use App\Models\Roles;
use App\Models\Settings;
use App\Enums\Lists;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        if(!(Auth::check()))
        {
            return redirect('/');
        }
        else{
            $settings = Settings::all();

            if ($this::isAuthorized(Auth::user()->role, 'sidebarAccounts')){
                return view('accounts\index', array('settings' => $settings));
            }
            else{
                return view('forbidden\index', array('settings' => $settings));
            }
        }
    }

    public function create(Request $request)
    {
        $id = $request->input('id');
        //dd([$request->input('role'),$request->input('department') ]);
        if ($id){
            $data = ['firstname' => $request->input('firstname'),
                        'middlename' => $request->input('middlename'),
                        'lastname' => $request->input('lastname'),
                        'extension' => $request->input('extension'),
                        'username' => $request->input('username'),
                        'department' => $request->input('department'),
                        'role' => $request->input('role'),
                        'updatedby' => Auth::user()->id,
                        'dateupdated' => date('Y-m-d H:i:s'),
                        'status' => 1];
                        
            $result = User::where('id', $id)
                            ->update($data);

            return array('result' => 'Success',
                            'color' => 'green',
                            'message' => 'User account successfully updated!');
        }
        else{
            $data = ['firstname' => $request->input('firstname'),
                        'middlename' => $request->input('middlename'),
                        'lastname' => $request->input('lastname'),
                        'extension' => $request->input('extension'),
                        'username' => $request->input('username'),
                        'password' => \Hash::make($request->input('password')),
                        'department' => $request->input('department'),
                        'role' => $request->input('role'),
                        'createdby' => Auth::user()->id,
                        'datecreated' => date('Y-m-d H:i:s'),
                        'status' => 1];
        
            $result = User::create($data);

            return array('result' => 'Success',
                            'color' => 'green',
                            'message' => 'User account successfully added!');
        }
        
    }

    public function retrieveAccounts(Request $request){
        $accounts = DB::table('users')
                        ->join('departments', 'departments.id', '=', 'users.department')
                        ->join('roles', 'roles.id', '=', 'users.role')
                        ->select('users.*', 'departments.office_name', 'departments.description', 'departments.sub_office', 'roles.role')
                        ->where('users.status', '=', $request->input('status'))
                        ->get();

        return view('accounts\accountlist', array('accounts' => $accounts));
    }

    public function getForm(Request $request){
        $id = ($request->input('id')) ? $request->input('id') : 0;

        $accountinfo = DB::table('users')
                        ->where('id', '=', $id)
                        ->get();
        $roles = DB::table('roles')
                        ->where('status', '=', 1)
                        ->get(); 
        $departments = DB::table('departments')
                        ->where('status', '=', 1)
                        ->get();               

        return view('accounts\accountform', array('accountinfo' => $accountinfo,
                                                    'roles' => $roles,
                                                    'departments' => $departments,
                                                    'extensions' => Lists::$extensions));
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
        
        $result = User::where('id', $id)
                            ->update($data);
        
        if ($status){
            $message = 'User account successfully re-activated!';
        }
        else{
            $message = 'User account successfully deleted!';
        }
        return array('result' => 'Success',
                        'color' => 'green',
                        'message' => $message);
    }

    public function resetPassword(Request $request){
        $data = ['password' => \Hash::make($request->input('newpassword'))];
                        
        $result = User::where('id', $request->input('resetpassid'))
                        ->update($data);

        return array('result' => 'Success',
                        'color' => 'green',
                        'message' => 'Password reset successfully!');
    }
}
