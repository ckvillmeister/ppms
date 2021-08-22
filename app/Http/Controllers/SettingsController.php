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

    public function toggleProcurementStatus(Request $request){
        $status = ($request->input('status') == true) ? 1 : 0;

        DB::table('settings')
                ->where('setting_name', '=', 'Procurement Status')
                ->update([
                    'setting_description' => $status
                ]);

    }

    public function backupDatabase(){
        $date = date('m-d-Y');
		$filename = 'backup_db_'.$date.'.sql';
		$res = exec('c:\xampp\mysql\bin\mysqldump -uroot -hlocalhost --database budget_system_db > '.$filename, $a, $b);
		$file = $filename;
		if(file_exists($file)) {
            header('Content-Description: File Transfer');
			header('Content-Type: application/octet-stream');
			header("Cache-Control: no-cache, must-revalidate");
			header("Expires: 0");
			header('Content-Disposition: attachment; filename="'.basename($file).'"');
			header('Content-Length: ' . filesize($file));
			header('Pragma: public');
            flush();
			readfile($file);
		}
		
        return array('result' => 'Success',
                'color' => 'green',
                'message' => 'Back-up Successful!');
	}
}
