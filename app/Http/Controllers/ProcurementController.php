<?php

namespace App\Http\Controllers;

use App\Models\Procurement;
use App\Models\Settings;
use App\Models\Items;
use App\Enums\Lists;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProcurementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Settings::all();

        if(!(Auth::check()))
        {
            return redirect('/');
        }
        else{
            $months = Lists::$months;
            $modes = Lists::$modes;
            $categories = Lists::$categories;
            $uom = Lists::$uom;
            return view('procurement\index', array('settings' => $settings, 
                                                    'months' => $months,
                                                    'modes' => $modes,
                                                    'categories' => $categories,
                                                    'uom' => $uom));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $settings = Settings::all();
        $year = $settings[1]->setting_description;
        $current_user_dept = Auth::user()->department;

        $procurement = DB::table('procurement_info')
                ->where('department', '=', $current_user_dept)
                ->where('year', '=', $year)
                ->get();

        if (count($procurement) <=0 ){
            DB::table('procurement_info')->insert([
                'department' => $current_user_dept,
                'year' => $year,
                'createdby' => Auth::user()->id,
                'datecreated' => date('Y-m-d H:i:s'),
                'status' => 1
            ]);
        }

        $procurement = DB::table('procurement_info')
                ->where('department', '=', $current_user_dept)
                ->where('year', '=', $year)
                ->get();
        $list = $request->input('list');

        foreach($list as $item){
            $itemInfo = DB::table('procurement_items')
                ->where('procurement_id', '=', $procurement[0]->id)
                ->where('itemid', '=', $item[0])
                ->get();

            if (count($itemInfo) <=0 ){
                DB::table('procurement_items')->insert([
                    'procurement_id' => $procurement[0]->id,
                    'itemid' => $item[0],
                    'itemname' => $item[1],
                    'quantity' => $item[2],
                    'price' => $item[3],
                    'mode' => $item[4],
                    'january' => $item[5],
                    'february' => $item[6],
                    'march' => $item[7],
                    'april' => $item[8],
                    'may' => $item[9],
                    'june' => $item[10],
                    'july' => $item[11],
                    'august' => $item[12],
                    'september' => $item[13],
                    'october' => $item[14],
                    'november' => $item[15],
                    'december' => $item[16],
                    'addedby' => Auth::user()->id,
                    'dateadded' => date('Y-m-d H:i:s'),
                    'status' => 1
                ]); 
            }
            else{
                DB::table('procurement_items')
                    ->where('procurement_id', '=', $procurement[0]->id)
                    ->where('itemid', '=', $item[0])
                    ->update([
                    'itemname' => $item[1],
                    'quantity' => $item[2],
                    'price' => $item[3],
                    'mode' => $item[4],
                    'january' => $item[5],
                    'february' => $item[6],
                    'march' => $item[7],
                    'april' => $item[8],
                    'may' => $item[9],
                    'june' => $item[10],
                    'july' => $item[11],
                    'august' => $item[12],
                    'september' => $item[13],
                    'october' => $item[14],
                    'november' => $item[15],
                    'december' => $item[16],
                    'status' => 1
                    ]);
            }
                        
        }

        return array('result' => 'Success',
                        'color' => 'green',
                        'message' => 'Procurement list successfully saved!');
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
     * @param  \App\Models\Procurement  $procurement
     * @return \Illuminate\Http\Response
     */
    public function show(Procurement $procurement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Procurement  $procurement
     * @return \Illuminate\Http\Response
     */
    public function edit(Procurement $procurement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Procurement  $procurement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Procurement $procurement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Procurement  $procurement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Procurement $procurement)
    {
        //
    }

    public function retrieveProcurementList(Request $request){
        $settings = Settings::all();
        $current_user_dept = Auth::user()->department;
        $year = ($request->input('year')) ? ($request->input('year')) : $settings[1]->setting_description;

        $items = DB::table('procurement_items')
            ->join('procurement_info', 'procurement_info.id', '=', 'procurement_items.procurement_id')
            ->join('items', 'items.id', '=', 'procurement_items.itemid')
            ->select('procurement_items.*', 'items.uom')
            ->where('procurement_info.department', '=', $current_user_dept)
            ->where('procurement_info.year', '=', $year)
            ->where('procurement_items.status', '<>', 0)
            ->get();

        return json_encode($items);
    }

    public function toggleProcurementItem(Request $request){
        $settings = Settings::all();
        $year = $settings[1]->setting_description;
        $current_user_dept = Auth::user()->department;

        $procurement = DB::table('procurement_info')
                ->where('department', '=', $current_user_dept)
                ->where('year', '=', $year)
                ->get();

        DB::table('procurement_items')
                ->where('procurement_id', '=', $procurement[0]->id)
                ->where('itemid', '=', $request->input('itemid'))
                ->update([
                    'status' => $request->input('status')
                ]);
        
    }
}
