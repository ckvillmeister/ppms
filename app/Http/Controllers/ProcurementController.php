<?php

namespace App\Http\Controllers;

use App\Models\Procurement;
use App\Models\Settings;
use App\Models\Items;
use App\Models\ClassExpenditure;
use App\Models\ObjectExpenditure;
use App\Models\Departments;
use App\Models\Units;
use App\Models\Categories;
use App\Enums\Lists;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProcurementController extends Controller
{
    public function index(Request $request)
    {
        if(!(Auth::check()))
        {
            return redirect('/');
        }
        else{
            $months = Lists::$months;
            $modes = Lists::$modes;
            $settings = Settings::all();
            $uom = Units::all();
            $categories = Categories::all();
            $departments = Departments::all();
            $classexpenditures = ClassExpenditure::where('status', 1)->get();
            
            if ($request->path() == 'myprocurement'){
                if ($this::isAuthorized(Auth::user()->role, 'sidebarMyProcurement')){
                    return view('myprocurement.index', array('settings' => $settings, 
                                                    'months' => $months,
                                                    'modes' => $modes,
                                                    'categories' => $categories,
                                                    'classexpenditures' => $classexpenditures,
                                                    'uom' => $uom));
                }
                else{
                    return view('forbidden.index', array('settings' => $settings));
                }
            }
            elseif ($request->path() == 'manageprocurement'){
                if ($this::isAuthorized(Auth::user()->role, 'sidebarManageProcurement')){
                return view('manageprocurement.index', array('settings' => $settings,
                                                    'departments' => $departments,
                                                    'modes' => $modes,
                                                    'months' => $months,
                                                    'uom' => $uom,
                                                    'categories' => $categories,
                                                    'classexpenditures' => $classexpenditures));
                }
                else{
                    return view('forbidden.index', array('settings' => $settings));
                }
            }
            
        }
    }

    public function create(Request $request)
    {
        $settings = Settings::all();
        $year = $settings[1]->setting_description;
        $proc_status = $settings[2]->setting_description;
        $deptid = ($request->input('deptid')) ? $request->input('deptid') : Auth::user()->department;

        if ($proc_status == 0){
            return array('result' => 'Warning',
                    'color' => 'red',
                    'message' => 'Procurement planning for year '.$year.' is already close!');
        }

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
        else{
            if ($procurement[0]->status == 2){
                return array('result' => 'Warning',
                        'color' => 'red',
                        'message' => 'This procurement was already approved! Therefore it cannot be modified.');
            }
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

    public function toggleProcurementItem(Request $request){
        $settings = Settings::all();
        $year = $settings[1]->setting_description;
        $proc_status = $settings[2]->setting_description;
        $deptid = ($request->input('deptid')) ? $request->input('deptid') : Auth::user()->department;

        if ($proc_status == 0){
            return 3;
        }
        
        $procurement = DB::table('procurement_info')
                ->where('department', '=', $deptid)
                ->where('year', '=', $year)
                ->first();
        
        if ($procurement->status == 2){
            return 2;
        }
        
        DB::table('procurement_items')
                ->where('id', '=', $request->input('itemid'))
                ->update([
                    'status' => $request->input('status')
                ]);

        return 1;
    }

    public function retrieveProcurementList(Request $request){
        $settings = Settings::all();
        $deptid = ($request->input('deptid')) ? ($request->input('deptid')) :Auth::user()->department;
        $year = ($request->input('year')) ? ($request->input('year')) : $settings[1]->setting_description;

        $new_items = [];
        $ctr = 0;

        $items = DB::table('procurement_items')
            ->join('procurement_info', 'procurement_info.id', '=', 'procurement_items.procurement_id')
            ->join('items', 'items.id', '=', 'procurement_items.itemid')
            ->join('units', 'units.id', '=', 'items.uom')
            ->join('item_price', 'item_price.itemid', '=', 'items.id')
            ->select('procurement_items.*', 'units.uom', 'units.description')
            ->where('procurement_info.department', '=', $deptid)
            ->where('procurement_info.year', '=', $year)
            ->where('item_price.year', '=', $year)
            ->where('procurement_items.status', '<>', 0)
            ->get();

        foreach($items as $item){
            $new_item = (array) $item;
            $new_item['is_allowed_to_remove'] = ($settings[2]->setting_description) ? 1 : ((in_array(Auth::user()->role, [1, 2])) ? 1 : 0);
            $new_items[$ctr] = (object) $new_item;
            $ctr++;
        }

        return json_encode($new_items);
    }

    public function retrieveProcurements(Request $request){
        $settings = Settings::all();
        $dept = $request->input('dept');
        $year = $settings[1]->setting_description;

        $items = DB::table('procurement_items')
            ->join('procurement_info', 'procurement_info.id', '=', 'procurement_items.procurement_id')
            ->join('items', 'items.id', '=', 'procurement_items.itemid')
            ->join('item_price', 'item_price.itemid', '=', 'items.id')
            ->select('procurement_items.*', 'items.uom', 'items.object_of_expenditure')
            ->where('procurement_info.department', '=', $dept)
            ->where('procurement_info.year', '=', $year)
            ->where('procurement_items.status', '<>', 0)
            ->orderBy('items.object_of_expenditure', 'asc')
            ->orderBy('procurement_items.itemname', 'asc')
            ->get();

        $months = Lists::$months;
        return view('procurement.procurement_list', array('months' => $months,
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

    public function replicateProcurement(Request $request){
        $settings = Settings::all();
        $deptid = ($request->input('deptid')) ? $request->input('deptid') : Auth::user()->department;
        $year = $request->input('year');
        $procurement_year = $settings[1]->setting_description;

        $items = DB::table('procurement_items')
            ->join('procurement_info', 'procurement_info.id', '=', 'procurement_items.procurement_id')
            ->join('items', 'items.id', '=', 'procurement_items.itemid')
            ->join('units', 'units.id', '=', 'items.uom')
            ->select('procurement_items.*')
            ->where('procurement_info.department', '=', $deptid)
            ->where('procurement_info.year', '=', $year)
            ->where('procurement_items.status', '<>', 0)
            ->get();

        if(count($items)){
            $procid = 0;
            $procurement = DB::table('procurement_info')
                    ->where('department', '=', $deptid)
                    ->where('year', '=', $procurement_year)
                    ->first();
                    
            if ($procurement){
                $procid = $procurement->id;
            }
            else{
                $procid = DB::table('procurement_info')->insertGetId([
                    'department' => $deptid,
                    'year' => $procurement_year,
                    'createdby' => Auth::user()->id,
                    'datecreated' => date('Y-m-d H:i:s'),
                    'status' => 1
                ]);
            }

            foreach($items as $item){
                $checkItem = DB::table('procurement_items AS pitem')
                    ->join('procurement_info AS pinfo', 'pinfo.id', '=', 'pitem.procurement_id')
                    ->select('pinfo.*', 'pitem.*', 'pitem.id AS proc_item_id')
                    ->where('pitem.itemid', '=', $item->itemid)
                    ->where('pinfo.year', '=', $procurement_year)
                    ->first();
    
                if($checkItem){
                    $quantity = $checkItem->quantity + $item->quantity;
                    DB::table('procurement_items')
                        ->where('id', '=', $checkItem->proc_item_id)
                        ->update([
                            'quantity' => $quantity,
                            'status' => 1
                        ]);
                }
                else{
                    DB::table('procurement_items')->insert([
                        'procurement_id' => $procid,
                        'itemid' => $item->itemid,
                        'itemname' => $item->itemname,
                        'quantity' => $item->quantity,
                        'price' => $item->price,
                        'mode' => $item->mode,
                        'january' => $item->january,
                        'february' => $item->february,
                        'march' => $item->march,
                        'april' => $item->april,
                        'may' => $item->may,
                        'june' => $item->june,
                        'july' => $item->july,
                        'august' => $item->august,
                        'september' => $item->september,
                        'october' => $item->october,
                        'november' => $item->november,
                        'december' => $item->december,
                        'addedby' => Auth::user()->id,
                        'dateadded' => date('Y-m-d H:i:s'),
                        'status' => 1
                    ]); 
                }
            }
        }
        else{
            return 2;
        }

        return 1;
        
    }

    public function approveprocurement(Request $request){
        $deptid = $request->input('deptid');
        $year = $request->input('year');
        $status = $request->input('status');

        DB::table('procurement_info')
                        ->where('department', '=', $deptid)
                        ->where('year', '=', $year)
                        ->update([
                            'status' => $status
                        ]);

        return $status;
    }

    public function getProcurementInfo(Request $request){
        $deptid = $request->input('deptid');
        $year = $request->input('year');

        $info = DB::table('procurement_info')
                        ->where('department', '=', $deptid)
                        ->where('year', '=', $year)
                        ->first();

        return json_encode($info);
    }
    
}
