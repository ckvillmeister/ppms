<?php

namespace App\Http\Controllers;

use App\Models\Reports;
use App\Models\Settings;
use App\Models\Departments;
use App\Models\ObjectExpenditure;
use App\Models\Categories;
use App\Enums\Lists;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReportsController extends Controller
{
    public function index()
    {
        if(!(Auth::check()))
        {
            return redirect('/');
        }
        else{
            $settings = Settings::all();
            $departments = DB::table('departments')
                                ->where('status', '=', 1)
                                ->get();

            $unique_depts = DB::table('departments')
                                ->where('sub_office', '<>', '')
                                ->orWhereNull('sub_office')
                                ->groupBy('office_name')
                                ->get();

            foreach($unique_depts as $u_depts){
                $dept = (array) $u_depts;
                $dept['sub_office'] = '';
                $dept['sub_office_in_charge'] = '';
                $dept['id'] = $dept['office_name'];
                $departments[count($departments)] = (object) $dept;
            }

            $depts = collect($departments);
            $depts = $depts->sortBy('office_name');
            $departments = (object) $depts;
            
            if ($this::isAuthorized(Auth::user()->role, 'sidebarReports')){
                return view('reports\index', array('settings' => $settings,
                                                'departments' => $departments));
            }
            else{
                return view('forbidden\index', array('settings' => $settings));
            }
        }
    }

    public function retrieveDeptPPMP(Request $request){
        $settings = Settings::all();
        $dept = $request->input('dept');
        $year = $settings[1]->setting_description;
        $items = [];

        if (is_numeric($dept)){
            $items = DB::table('procurement_items')
            ->join('procurement_info', 'procurement_info.id', '=', 'procurement_items.procurement_id')
            ->join('items', 'items.id', '=', 'procurement_items.itemid')
            ->join('object_expenditures', 'object_expenditures.id', '=', 'items.object_of_expenditure')
            ->join('units', 'units.id', '=', 'items.uom')
            ->select('procurement_items.*', 'object_expenditures.obj_exp_name', 'units.description', 'procurement_items.quantity AS total_qty')
            ->where('procurement_info.department', '=', $dept)
            ->where('procurement_info.year', '=', $year)
            ->where('procurement_items.status', '<>', 0)
            ->orderBy('items.category', 'asc')
            ->orderBy('procurement_items.itemname', 'asc')
            ->get();
        }
        else{
            $items = DB::table('procurement_items')
            ->join('procurement_info', 'procurement_info.id', '=', 'procurement_items.procurement_id')
            ->join('items', 'items.id', '=', 'procurement_items.itemid')
            ->join('object_expenditures', 'object_expenditures.id', '=', 'items.object_of_expenditure')
            ->join('units', 'units.id', '=', 'items.uom')
            ->join('departments', 'departments.id', '=', 'procurement_info.department')
            ->select('procurement_items.*', 'object_expenditures.obj_exp_name', 'units.description', DB::raw('SUM(procurement_items.quantity) AS total_qty'))
            ->where('departments.office_name', '=', $dept)
            ->where('procurement_info.year', '=', $year)
            ->where('procurement_items.status', '<>', 0)
            ->groupBy('items.itemname')
            ->orderBy('items.object_of_expenditure', 'asc')
            ->orderBy('procurement_items.itemname', 'asc')
            ->get();
        }

        $months = Lists::$months;
        $objectexpenditures = ObjectExpenditure::all();
        $depts = Departments::all();
        $deptinfo;

        if (is_numeric($dept)){
            $deptinfo = DB::table('departments')
                ->where('id', '=', $dept)
                ->get();
        }
        else{
            $deptinfo = DB::table('departments')
                ->where('office_name', '=', $dept)
                ->groupBy('office_name')
                ->get();

            $deptinfo[0]->sub_office = '';
            $deptinfo[0]->sub_office_in_charge = '';
            
        }
        $head = $this->gethead($depts, $deptinfo[0]->description);
        $subhead = $this->getSubHead($depts, $deptinfo[0]->sub_office, (is_numeric($dept)) ? false : true);
        $gso = $this->gethead($depts, 'General Services Office');
        $mbo = $this->gethead($depts, 'Municipal Budget Office');
        $mayor = $this->gethead($depts, 'Office of the Municipal Mayor');
        
        return view('reports\ppmp', array('months' => $months,
                                            'items' => $items,
                                            'objectexpenditures' => $objectexpenditures,
                                            'settings' => $settings,
                                            'deptinfo' => $deptinfo,
                                            'signatories' => array('head' => $head, 'subhead' => $subhead, 'gso' => $gso, 'mbo' => $mbo, 'mayor' => $mayor)));
    }

    public function retrieveAPP(Request $request){
        $settings = Settings::all();
        $year = $settings[1]->setting_description;
        $items = DB::table('procurement_items')
            ->join('procurement_info', 'procurement_info.id', '=', 'procurement_items.procurement_id')
            ->join('items', 'items.id', '=', 'procurement_items.itemid')
            ->join('object_expenditures', 'object_expenditures.id', '=', 'items.object_of_expenditure')
            ->join('units', 'units.id', '=', 'items.uom')
            ->join('departments', 'departments.id', '=', 'procurement_info.department')
            ->select('procurement_items.*', 'object_expenditures.obj_exp_name', 'units.description', DB::raw('SUM(procurement_items.quantity) AS total_qty'), DB::raw('AVG(procurement_items.price) AS avg_price'))
            ->where('procurement_info.year', '=', $year)
            ->where('procurement_items.status', '<>', 0)
            ->groupBy('items.itemname')
            ->orderBy('items.object_of_expenditure', 'asc')
            ->orderBy('procurement_items.itemname', 'asc')
            ->get();

        if ($request->path() == 'APPDILG'){
            return view('reports\app_dilg', array('settings' => $settings, 'items' => $items));
        }
        elseif ($request->path() == 'APPDBM'){
            return view('reports\app_dbm', array('settings' => $settings, 'items' => $items));
        }
        elseif ($request->path() == 'APPCSE'){
            return view('reports\app_cse', array('settings' => $settings, 'items' => $items));
        }
    }

    public function getHead($depts, $office){
        foreach($depts as $dept){
            if ($dept->description == $office){
                return $dept;
            }
        }
    }

    public function getSubHead($depts, $sub_office, $parent_office = false){
        foreach($depts as $dept){
            if ($dept->sub_office == $sub_office){
                if ($parent_office){
                    $dept = (array) $dept;
                    $dept['sub_office'] = '';
                    $dept['sub_office_in_charge'] = '';
                    return (object) $dept;
                }
                else{
                    return $dept;
                }
                
            }
        }
    }
}
