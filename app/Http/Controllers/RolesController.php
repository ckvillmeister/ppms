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
        $settings = Settings::all();

        if(!(Auth::check()))
        {
            return redirect('/');
        }
        else{
            return view('roles\index', array('settings' => $settings));
        }
        
    }

    public function retrieveRoles(Request $request){
        $roles = DB::table('roles')
                        ->where('status', '=', $request->input('status'))
                        ->get();

        return view('roles\rolelist', array('roles' => $roles));
    }

    public function getForm(Request $request){
        $roleid = ($request->input('roleid')) ? $request->input('roleid') : 0;

        $roleinfo = DB::table('roles')
                        ->where('id', '=', $roleid)
                        ->get();

        return view('roles\roleform', array('roleinfo' => $roleinfo));
    }
    
}
