<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use App\Models\Settings;
use App\Models\Departments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        if(!(Auth::check()))
        {
            return redirect('/');
        }
        else{
            $settings = Settings::all();
            $year = 0;

            foreach($settings as $setting){
                if ($setting->setting_name == 'Procurement Year'){
                    $year = $setting->setting_description;
                }
            }

            if ($this::isAuthorized(Auth::user()->role, 'sidebarDashboard')){
                $new_departments = [];
                $depts = array();
                $colors = array();
                $procured_items = array();
                $ctr = 0;
                $departments = DB::table('procurement_info')
                                ->join('departments', 'departments.id', '=', 'procurement_info.department')
                                ->select('departments.*')
                                ->where('procurement_info.status', '=', 1)
                                ->where('departments.status', '=', 1)
                                ->where('procurement_info.year', '=', $year)
                                ->orderBy('departments.office_name', 'asc')
                                ->get();

                foreach($departments as $department){
                    $department = (array) $department;
                    $department['color'] = $this->randomHex();
                    $depts[$ctr] = ($department['sub_office']) ? $department['description'].'-'.$department['sub_office'] : $department['description'];
                    $colors[$ctr] = $this->randomHex();
                    $procured_items[$ctr] = $this->getTotalAmountPerDept($department['id'], $settings[1]->setting_description);
                    $new_departments[$ctr] = (object) $department;
                    $ctr++;
                }

                $users = DB::table('users')
                                ->where('status', '=', 1)
                                ->get();

                return view('dashboard.index', array('settings' => $settings,
                                                        'departments' => $new_departments,
                                                        'all_departments' => Departments::where('status', 1)->get(),
                                                        'colors' => $colors,
                                                        'procured_items' => $procured_items,
                                                        'depts' => $depts,
                                                        'users' => $users,
                                                        'total_procured' => $this->getTotalProcuredPerYear($settings[1]->setting_description)));
            }
            else{
                return view('forbidden.index', array('settings' => $settings));
            }
        }
    }

    function getTotalAmountPerDept($id, $year){
        
        $total = 0.0;
        $procured_info = DB::table('procurement_items')
                            ->join('procurement_info', 'procurement_info.id', '=', 'procurement_items.procurement_id')
                            ->select('procurement_items.price', 'procurement_items.quantity')
                            ->where('procurement_info.department', '=', $id)
                            ->where('procurement_info.year', '=', $year)
                            ->where('procurement_items.status', '=', 1)
                            ->get();

        foreach($procured_info as $proc){
            $total += ($proc->price * $proc->quantity);
        }

        return $total;
    }

    function getTotalProcuredPerYear($year){
        $total = 0.0;
        $procured_info = DB::table('procurement_items')
                            ->join('procurement_info', 'procurement_info.id', '=', 'procurement_items.procurement_id')
                            ->select('procurement_items.price', 'procurement_items.quantity', DB::raw('SUM(procurement_items.quantity) AS total_qty'), DB::raw('AVG(procurement_items.price) AS avg_price'))
                            ->where('procurement_info.year', '=', $year)
                            ->where('procurement_items.status', '=', 1)
                            ->groupBy('procurement_items.itemname')
                            ->get();

        foreach($procured_info as $proc){
            $total += ($proc->avg_price * $proc->total_qty);
        }

        return $total;
    }

    function randomHex() {
        $chars = 'ABCDEF0123456789';
        $color = '#';
        for ( $i = 0; $i < 6; $i++ ) {
           $color .= $chars[rand(0, strlen($chars) - 1)];
        }
        return $color;
     }
     
}
