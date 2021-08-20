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
            $departments = Departments::all();
            
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

        $items = DB::table('procurement_items')
            ->join('procurement_info', 'procurement_info.id', '=', 'procurement_items.procurement_id')
            ->join('items', 'items.id', '=', 'procurement_items.itemid')
            ->join('object_expenditures', 'object_expenditures.id', '=', 'items.object_of_expenditure')
            ->join('units', 'units.id', '=', 'items.uom')
            ->select('procurement_items.*', 'object_expenditures.obj_exp_name', 'units.description')
            ->where('procurement_info.department', '=', $dept)
            ->where('procurement_info.year', '=', $year)
            ->where('procurement_items.status', '<>', 0)
            ->orderBy('items.category', 'asc')
            ->orderBy('procurement_items.itemname', 'asc')
            ->get();

        $months = Lists::$months;
        $objectexpenditures = ObjectExpenditure::all();
        $depts = Departments::all();
        
        $deptinfo = DB::table('departments')
            ->where('id', '=', $dept)
            ->get();
        
        $head = $this->gethead($depts, $deptinfo[0]->description);
        $subhead = $this->getSubHead($depts, $deptinfo[0]->sub_office);
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
        return view('reports\app');
    }

    public function getHead($depts, $office){
        foreach($depts as $dept){
            if ($dept->description == $office){
                return $dept;
            }
        }
    }

    public function getSubHead($depts, $sub_office){
        foreach($depts as $dept){
            if ($dept->sub_office == $sub_office){
                return $dept;
            }
        }
    }
}
