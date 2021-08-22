<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SettingsController extends Controller
{
    public function index()
    {
        if(!(Auth::check()))
        {
            return redirect('/');
        }
        else{
            $settings = Settings::all();

            if ($this::isAuthorized(Auth::user()->role, 'sidebarSystemSettings')){
                return view('settings\index', array('settings' => $settings));
            }
            else{
                return view('forbidden\index', array('settings' => $settings));
            }
        }
    }

    public function saveSettings(Request $request){
        DB::table('settings')
                ->where('setting_name', '=', 'Application Name')
                ->update([
                    'setting_description' => $request->input('system_name')
                ]);
        
        DB::table('settings')
                ->where('setting_name', '=', 'Procurement Year')
                ->update([
                    'setting_description' => $request->input('proc_year')
                ]);
        
        return array('result' => 'Success',
                'color' => 'green',
                'message' => 'New settings applied!');
    }
}
