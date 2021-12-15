<?php

namespace App\Http\Controllers;

use App\Models\Reports;
use App\Models\Settings;
use App\Models\Departments;
use App\Models\ObjectExpenditure;
use App\Models\Categories;
use App\Models\ObjectAIPCode;
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
                return view('reports.index', array('settings' => $settings,
                                                'departments' => $departments));
            }
            else{
                return view('forbidden.index', array('settings' => $settings));
            }
        }
    }

    public function retrieveDeptPPMP(Request $request){
        $settings = Settings::all();
        $dept = $request->input('dept');
        $year = $request->input('year');
        $items = [];

        if (is_numeric($dept)){
            $items = DB::table('procurement_items')
            ->join('procurement_info', 'procurement_info.id', '=', 'procurement_items.procurement_id')
            ->join('object_expenditures', 'object_expenditures.id', '=', 'procurement_items.object')
            ->select('procurement_items.*', 'object_expenditures.obj_exp_name', 'procurement_info.year', DB::raw('SUM(procurement_items.quantity) AS total_qty'), 'procurement_items.price AS unit_price')
            ->where('procurement_info.department', '=', $dept)
            ->where('procurement_info.year', '=', $year)
            ->where('procurement_items.status', '<>', 0)
            ->groupBy('procurement_items.itemname')
            ->orderBy('procurement_items.object', 'asc')
            ->orderBy('procurement_items.itemname', 'asc')
            ->get();
        }
        else{
            $items = DB::table('procurement_items')
            ->join('procurement_info', 'procurement_info.id', '=', 'procurement_items.procurement_id')
            ->join('object_expenditures', 'object_expenditures.id', '=', 'procurement_items.object')
            ->join('departments', 'departments.id', '=', 'procurement_info.department')
            //->select('procurement_items.*', 'object_expenditures.obj_exp_name', 'units.description', 'procurement_info.year', DB::raw('SUM(procurement_items.quantity) AS total_qty'), DB::raw('(SELECT AVG(pi.price) FROM procurement_items pi INNER JOIN procurement_info pif ON pif.id = pi.procurement_id WHERE pi.itemname = procurement_items.itemname AND pif.year = procurement_info.year GROUP BY pi.itemname) AS unit_price'))
            ->select('procurement_items.*', 'object_expenditures.obj_exp_name', 'procurement_info.year', DB::raw('SUM(procurement_items.quantity) AS total_qty'), 'procurement_items.price AS unit_price')
            ->where('departments.office_name', '=', $dept)
            ->where('procurement_info.year', '=', $year)
            ->where('procurement_items.status', '<>', 0)
            ->groupBy('procurement_items.itemname')
            ->orderBy('procurement_items.object', 'asc')
            ->orderBy('procurement_items.itemname', 'asc')
            ->get();
        }

        foreach ($items as $item){
            $aip = ObjectAIPCode::where('object', $item->object)->where('year', $year)->first();
            $item->aipcode = $aip->aipcode;
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
        
        return view('reports.ppmp', array('months' => $months,
                                            'items' => $items,
                                            'objectexpenditures' => $objectexpenditures,
                                            'settings' => $settings,
                                            'deptinfo' => $deptinfo,
                                            'signatories' => array('head' => $head, 'subhead' => $subhead, 'gso' => $gso, 'mbo' => $mbo, 'mayor' => $mayor)));
    }

    public function retrieveAPP(Request $request){
        $settings = Settings::all();
        $year = $settings[1]->setting_description;
        
        if ($request->path() == 'APPDILG'){
            $items = DB::table('procurement_items AS pitems')
                            ->join('procurement_info AS pinfo', 'pinfo.id', '=', 'pitems.procurement_id')
                            ->join('object_expenditures AS objects', 'objects.id', '=', 'pitems.object')
                            ->join('departments AS departments', 'departments.id', '=', 'pinfo.department')
                            ->select('pitems.*', 'objects.obj_exp_name', 'pinfo.year', DB::raw('SUM(pitems.quantity) AS total_qty'), DB::raw('(SELECT AVG(pi.price) FROM procurement_items pi INNER JOIN procurement_info pif ON pif.id = pi.procurement_id WHERE pi.itemname = pitems.itemname AND pif.year = pinfo.year GROUP BY pi.itemname) AS avg_price'))
                            ->where('pinfo.year', '=', $year)
                            ->where('pitems.status', '<>', 0)
                            ->groupBy('pitems.itemname')
                            ->orderBy('pitems.object', 'asc')
                            ->orderBy('pitems.itemname', 'asc')
                            ->get();
            return view('reports.app_dilg', array('settings' => $settings, 'items' => $items));
        }
        elseif ($request->path() == 'APPDBM'){
            $items = DB::table('procurement_items AS pitems')
                            ->join('procurement_info AS pinfo', 'pinfo.id', '=', 'pitems.procurement_id')
                            ->join('object_expenditures AS objects', 'objects.id', '=', 'pitems.object')
                            ->join('departments AS departments', 'departments.id', '=', 'pinfo.department')
                            ->select('pitems.*', 'objects.class_exp_id', 'objects.obj_exp_name', 'pinfo.year', DB::raw('SUM(pitems.quantity) AS total_qty'), DB::raw('(SELECT AVG(pi.price) FROM procurement_items pi INNER JOIN procurement_info pif ON pif.id = pi.procurement_id WHERE pi.itemname = pitems.itemname AND pif.year = pinfo.year GROUP BY pi.itemname) AS avg_price'))
                            ->where('pinfo.year', '=', $year)
                            ->where('pitems.status', '<>', 0)
                            ->groupBy('pitems.itemname')
                            ->orderBy('pitems.object', 'asc')
                            ->orderBy('pitems.itemname', 'asc')
                            ->get();
            return view('reports.app_dbm', array('settings' => $settings, 'items' => $items));
        }
        elseif ($request->path() == 'APPCSE'){
            $items = DB::table('procurement_items AS pitems')
                            ->join('procurement_info AS pinfo', 'pinfo.id', '=', 'pitems.procurement_id')
                            ->join('object_expenditures AS objects', 'objects.id', '=', 'pitems.object')
                            ->join('departments AS departments', 'departments.id', '=', 'pinfo.department')
                            ->join('items AS items', 'items.itemname', '=', 'pitems.itemname')
                            ->join('categories AS categories', 'categories.id', '=', 'items.category')
                            ->select('pitems.*', 'objects.obj_exp_name', 'items.category', 'categories.category', 'pinfo.year', DB::raw('SUM(pitems.quantity) AS total_qty'), DB::raw('(SELECT AVG(pi.price) FROM procurement_items pi INNER JOIN procurement_info pif ON pif.id = pi.procurement_id WHERE pi.itemname = pitems.itemname AND pif.year = pinfo.year GROUP BY pi.itemname) AS avg_price'))
                            ->where('pinfo.year', '=', $year)
                            ->where('pitems.status', '<>', 0)
                            ->groupBy('pitems.itemname')
                            ->orderBy('categories.category', 'asc')
                            ->orderBy('pitems.itemname', 'asc')
                            ->get();
            return view('reports.app_cse', array('settings' => $settings, 'items' => $items));
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
