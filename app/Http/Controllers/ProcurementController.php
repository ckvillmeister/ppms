<?php

namespace App\Http\Controllers;

use App\Models\Procurement;
use App\Models\Settings;
use App\Models\Items;
use App\Models\ObjectExpenditure;
use App\Models\Departments;
use App\Enums\Lists;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProcurementController extends Controller
{
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
            $uom = Lists::$uom;
            $objexpenditures = ObjectExpenditure::all();
            return view('myprocurement\index', array('settings' => $settings, 
                                                    'months' => $months,
                                                    'modes' => $modes,
                                                    'objexpenditures' => $objexpenditures,
                                                    'uom' => $uom));
        }
    }

    public function manageprocurement()
    {
        

        if(!(Auth::check()))
        {
            return redirect('/');
        }
        else{
            $settings = Settings::all();
            $departments = Departments::all();
            $objexpenditures = ObjectExpenditure::all();
            $months = Lists::$months;
            $modes = Lists::$modes;
            $uom = Lists::$uom;
            $items = DB::table('items')
                            ->join('object_expenditures', 'object_expenditures.id', '=', 'items.object_of_expenditure')
                            ->select('items.*', 'object_expenditures.category_name')
                            ->where('items.status', '=', 1)
                            ->get();
            return view('manageprocurement\index', array('settings' => $settings,
                                                    'departments' => $departments,
                                                    'modes' => $modes,
                                                    'months' => $months,
                                                    'items' => $items,
                                                    'uom' => $uom,
                                                    'objexpenditures' => $objexpenditures,));
        }
    }

    public function create(Request $request)
    {
        $settings = Settings::all();
        $year = $settings[1]->setting_description;
        $deptid = ($request->input('deptid')) ? $request->input('deptid') : Auth::user()->department;

        $procurement = DB::table('procurement_info')
                ->where('department', '=', $deptid)
                ->where('year', '=', $year)
                ->get();

        if (count($procurement) <=0 ){
            DB::table('procurement_info')->insert([
                'department' => $deptid,
                'year' => $year,
                'createdby' => Auth::user()->id,
                'datecreated' => date('Y-m-d H:i:s'),
                'status' => 1
            ]);
        }

        $procurement = DB::table('procurement_info')
                ->where('department', '=', $deptid)
                ->where('year', '=', $year)
                ->get();
        $list = $request->input('list');

        foreach($list as $item){
            $itemInfo = DB::table('procurement_items')
                ->where('procurement_id', '=', $procurement[0]->id)
                ->where('itemid', '=', $item[0])
                ->get();

            $unitprice = str_replace(',','', $item[3]);

            if (count($itemInfo) <=0 ){
                DB::table('procurement_items')->insert([
                    'procurement_id' => $procurement[0]->id,
                    'itemid' => $item[0],
                    'itemname' => $item[1],
                    'quantity' => $item[2],
                    'price' => $unitprice,
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
                    'price' => $unitprice,
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

    public function retrieveProcurementList(Request $request){
        $settings = Settings::all();
        $deptid = ($request->input('deptid')) ? ($request->input('deptid')) :Auth::user()->department;
        $year = ($request->input('year')) ? ($request->input('year')) : $settings[1]->setting_description;

        $items = DB::table('procurement_items')
            ->join('procurement_info', 'procurement_info.id', '=', 'procurement_items.procurement_id')
            ->join('items', 'items.id', '=', 'procurement_items.itemid')
            ->select('procurement_items.*', 'items.uom')
            ->where('procurement_info.department', '=', $deptid)
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

    public function retrieveProcurements(Request $request){
        $settings = Settings::all();
        $dept = $request->input('dept');
        $year = $settings[1]->setting_description;

        $items = DB::table('procurement_items')
            ->join('procurement_info', 'procurement_info.id', '=', 'procurement_items.procurement_id')
            ->join('items', 'items.id', '=', 'procurement_items.itemid')
            ->select('procurement_items.*', 'items.uom', 'items.object_of_expenditure')
            ->where('procurement_info.department', '=', $dept)
            ->where('procurement_info.year', '=', $year)
            ->where('procurement_items.status', '<>', 0)
            ->orderBy('items.object_of_expenditure', 'asc')
            ->orderBy('procurement_items.itemname', 'asc')
            ->get();

        $months = Lists::$months;
        return view('procurement\procurement_list', array('months' => $months,
                                                                    'items' => $items));
    }

    public function removeItemFromProcList(Request $request){
        $list = $request->input('itemlist');

        foreach($list as $item){
            DB::table('procurement_items')
                ->where('id', '=', $item[0])
                ->update([
                    'status' => 0
                ]);
        }
        
        return array('result' => 'Success',
                        'color' => 'green',
                        'message' => 'Selected item/s successfully removed!');
    }

    public function updateProcItems(Request $request){
        $list = $request->input('list');

        foreach($list as $item){
            $unitprice = str_replace(',','', $item[3]);
            
            DB::table('procurement_items')
                ->where('id', '=', $item[0])
                ->update([
                    'itemname' => $item[1],
                    'quantity' => $item[2],
                    'price' => $unitprice,
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
                    'december' => $item[16]
                ]);
        }
        
        return array('result' => 'Success',
                        'color' => 'green',
                        'message' => 'Procurement list successfully updated!');
    }
}
