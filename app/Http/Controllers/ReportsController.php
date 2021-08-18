<?php

namespace App\Http\Controllers;

use App\Models\Reports;
use App\Models\Settings;
use App\Models\Departments;
use App\Models\ItemCategory;
use App\Enums\Lists;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Settings::all();
        $departments = Departments::all();

        if(!(Auth::check()))
        {
            return redirect('/');
        }
        else{
            return view('reports\index', array('settings' => $settings,
                                                'departments' => $departments));
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reports  $reports
     * @return \Illuminate\Http\Response
     */
    public function show(Reports $reports)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reports  $reports
     * @return \Illuminate\Http\Response
     */
    public function edit(Reports $reports)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reports  $reports
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reports $reports)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reports  $reports
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reports $reports)
    {
        //
    }

    public function retrieveDeptPPMP(Request $request){
        $settings = Settings::all();
        $dept = $request->input('dept');
        $year = $settings[1]->setting_description;

        $items = DB::table('procurement_items')
            ->join('procurement_info', 'procurement_info.id', '=', 'procurement_items.procurement_id')
            ->join('items', 'items.id', '=', 'procurement_items.itemid')
            ->select('procurement_items.*', 'items.uom', 'items.category')
            ->where('procurement_info.department', '=', $dept)
            ->where('procurement_info.year', '=', $year)
            ->where('procurement_items.status', '<>', 0)
            ->orderBy('items.category', 'asc')
            ->orderBy('procurement_items.itemname', 'asc')
            ->get();

        $months = Lists::$months;
        $categories = ItemCategory::all();
        $depts = Departments::all();
        
        $deptinfo = DB::table('departments')
            ->where('id', '=', Auth::user()->department)
            ->get();

        $head = $this->gethead($depts, 'Trinidad Municipal College');
        $gso = $this->gethead($depts, 'General Services Office');
        $mbo = $this->gethead($depts, 'Municipal Budget Office');
        $mayor = $this->gethead($depts, 'Office of the Municipal Mayor');

        return view('reports\ppmp', array('months' => $months,
                                            'items' => $items,
                                            'categories' => $categories,
                                            'settings' => $settings,
                                            'deptinfo' => $deptinfo,
                                            'signatories' => array('head' => $head, 'gso' => $gso, 'mbo' => $mbo, 'mayor' => $mayor)));
    }

    public function retrieveAPP(Request $request){
        return view('reports\app');
    }

    public function getHead($depts, $office){
        foreach($depts as $dept){
            if ($dept->description == $office){
                return $dept->head;
            }
        }
    }
}
