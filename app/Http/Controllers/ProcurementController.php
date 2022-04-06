<?php

namespace App\Http\Controllers;

use App\Models\Procurement;
use App\Models\Settings;
use App\Models\Items;
use App\Models\ClassExpenditure;
use App\Models\ObjectExpenditure;
use App\Models\Departments;
use App\Models\DepartmentBudget;
use App\Models\Units;
use App\Models\Categories;
use App\Models\ProcurementSchedule;
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
            $settings = Settings::where('status', 1)->get();
            $uom = Units::where('status', 1)->get();
            $categories = Categories::where('status', 1)->get();
            $departments = Departments::where('status', 1)->orderBy('office_name', 'ASC')->orderBy('sub_office', 'ASC')->get();
            $classexpenditures = ClassExpenditure::where('status', 1)->get();
            
            if ($this::isAuthorized(Auth::user()->role, 'sidebarPPMP')){
                return view('ppmp.index', array('settings' => $settings,
                                                'departments' => $departments,
                                                'modes' => $modes,
                                                'months' => $months,
                                                'uom' => $uom,
                                                'categories' => $categories,
                                                'classexpenditures' => $classexpenditures,
                                                'can_approve' => $this::hasAccess(Auth::user()->role, 'pageApprovePPMP')));
            }
            else{
                return view('forbidden.index', array('settings' => $settings));
            }
            
        }
    }

    public function itemList(Request $request){
        $status = $request->input('status');
        $items = Items::where('status', $status)->get();
        return view('ppmp.itemlist', ['items' => $items]);
    }

    public function itemListForUpdate(Request $request){
        $status = $request->input('status');
        $items = Items::where('status', $status)->get();
        return view('ppmp.itemlistforupdate', ['items' => $items]);
    }

    public function replaceItem(Request $request){
        $dept = $request->input('dept');
        $year = $request->input('year');
        $ppmpitemid = $request->input('ppmpitemid');
        $itemid = $request->input('itemid');
        $itemname = $request->input('itemname');

        $checkItem = DB::table('procurement_items AS pitems')
                        ->join('procurement_info AS pinfo', 'pinfo.id', '=', 'pitems.procurement_id')
                        ->where('pinfo.department', '=', $dept)
                        ->where('pinfo.year', '=', $year)
                        ->where('pitems.itemid', '=', $itemid)
                        ->get();

        if (count($checkItem) > 0){
            DB::table('procurement_items')->where('id', '=', $ppmpitemid)->update(['status' => 0]);
        }
        else{
            DB::table('procurement_items')->where('id', '=', $ppmpitemid)->update(['itemid' => $itemid, 'itemname' => $itemname]);
        }
    }
    
    public function create(Request $request)
    {
        $settings = Settings::all();
        $proc_status = $settings[2]->setting_description;

        $dept = ($request->input('dept')) ? $request->input('dept') : 0;
        $year = ($request->input('year')) ? $request->input('year') : 0;
        $itemname = ($request->input('itemname')) ? trim($request->input('itemname')) : '';
        $object = ($request->input('object')) ? trim($request->input('object')) : '';
        $unit = ($request->input('unit')) ?  trim($request->input('unit')) : 0;
        $quantity = ($request->input('qty')) ? $request->input('qty') : 0;
        $price = ($request->input('price')) ? str_replace(',','', $request->input('price')) : 0;
        $mode = ($request->input('mode')) ?  trim($request->input('mode')) : '';
        $jan = ($request->input('January')) ? $request->input('January') : 0;
        $feb = ($request->input('February')) ? $request->input('February') : 0;
        $mar = ($request->input('March')) ? $request->input('March') : 0;
        $apr = ($request->input('April')) ? $request->input('April') : 0;
        $may = ($request->input('May')) ? $request->input('May') : 0;
        $jun = ($request->input('June')) ? $request->input('June') : 0;
        $jul = ($request->input('July')) ? $request->input('July') : 0;
        $aug = ($request->input('August')) ? $request->input('August') : 0;
        $sep = ($request->input('September')) ? $request->input('September') : 0;
        $oct = ($request->input('October')) ? $request->input('October') : 0;
        $nov = ($request->input('November')) ? $request->input('November') : 0;
        $dec = ($request->input('December')) ? $request->input('December') : 0;

        //Start: Check if procurement status is closed
        if ($proc_status == 0){
            return array('result' => 'Warning',
                    'color' => 'red',
                    'message' => 'Procurement planning for year '.$year.' is already close!');
        }
        //End: Check if procurement status is closed

        
        $procurementid = '';
        $procurement = DB::table('procurement_info')
                ->where('department', '=', $dept)
                ->where('year', '=', $year)
                ->first();

        //Check if a department has already a procurement for this year
        if ($procurement){
            $procurementid = $procurement->id;

            //Check if procurement is already approved
            if ($procurement->status == 2){
                return array('result' => 'Warning',
                        'color' => 'red',
                        'message' => 'This procurement was already approved! Therefore it cannot be modified.');
            }
        }//IF not approved
        else{
            $procurementid = DB::table('procurement_info')->insertGetID([
                'department' => $dept,
                'year' => $year,
                'createdby' => Auth::user()->id,
                'datecreated' => date('Y-m-d H:i:s'),
                'status' => 1
            ]);
        }

        
        $itemtotal = $quantity * $price;
        $budget = DepartmentBudget::where('object', $object)->where('year', $year)->first();
        $allocated = DB::table('procurement_items AS pitems')
                            ->join('procurement_info AS pinfo', 'pinfo.id', '=', 'pitems.procurement_id')
                            ->select('pitems.*')
                            ->where('pinfo.department', '=', $dept)
                            ->where('pinfo.year', '=', $year)
                            ->where('pitems.object', '=', $object)
                            ->where('pitems.status', '=', 1)
                            ->get();
        
        //Check item amount exceeds the approved amount  
        if ($budget){
           
            if ($itemtotal > $budget->amount){
                return array('result' => 'Warning',
                        'color' => 'red',
                        'message' => 'Item total amount is larger than the approved amount for this object of expenditure!');
            }
        }

        //Check item amount exceeds the approved amount  
        if (count($allocated) > 0){
            $total = 0.0;

            foreach($allocated as $alloc){
                $total += ($alloc->quantity * $alloc->price);
            }

            if (($itemtotal + $total) > $budget->amount){
                return array('result' => 'Warning',
                        'color' => 'red',
                        'message' => 'Item total amount is larger than the approved amount for this object of expenditure!');
            }
        }
        
        $chkProcurementItem = DB::table('procurement_items')
                        ->where('procurement_id', '=', $procurementid)
                        ->where('itemname', '=', $itemname)
                        ->first();

        if ($chkProcurementItem){
            DB::table('procurement_items')
                ->where('procurement_id', '=', $procurementid)
                ->where('itemname', '=', $itemname)
                ->update([
                'object' => $object,    
                'unit' => $unit,    
                'quantity' => $quantity,
                'price' => $price,
                'mode' => $mode,
                'january' => $jan,
                'february' => $feb,
                'march' => $mar,
                'april' => $apr,
                'may' => $may,
                'june' => $jun,
                'july' => $jul,
                'august' => $aug,
                'september' => $sep,
                'october' => $oct,
                'november' => $nov,
                'december' => $dec,
                'status' => 1
                ]);
        }
        else{
            DB::table('procurement_items')->insert([
                'procurement_id' => $procurementid,
                'itemname' => $itemname,
                'object' => $object,
                'unit' => $unit,
                'quantity' => $quantity,
                'price' => $price,
                'mode' => $mode,
                'january' => $jan,
                'february' => $feb,
                'march' => $mar,
                'april' => $apr,
                'may' => $may,
                'june' => $jun,
                'july' => $jul,
                'august' => $aug,
                'september' => $sep,
                'october' => $oct,
                'november' => $nov,
                'december' => $dec,
                'addedby' => Auth::user()->id,
                'dateadded' => date('Y-m-d H:i:s'),
                'status' => 1
            ]); 
        }

        $checkIfItemExist = Items::where('itemname', $itemname)->get();

        if (!(count($checkIfItemExist) > 0)){
            Items::insert(['itemname' => $itemname, 
                            'category' => 1, 
                            'createdby' => Auth::user()->id,
                            'datecreated' => date('Y-m-d H:i:s'),
                            'status' => 1]);
        }

        $checkIfUnitExist = Units::where('description', $unit)->get();

        if (!(count($checkIfUnitExist) > 0)){
            Items::insert(['uom' => $unit, 
                            'description' => $unit, 
                            'createdby' => Auth::user()->id,
                            'datecreated' => date('Y-m-d H:i:s'),
                            'status' => 1]);
        }

        return array('result' => 1,
                        'color' => 'green',
                        'message' => 'Procurement list successfully saved!');
    }

    public function update($attribute, Request $request){
        $id = ($request->input('id')) ? $request->input('id') : 0;
        $attr = ($request->input('attr')) ? $request->input('attr') : 0;
        $value = ($request->input('value')) ? str_replace(',','', $request->input('value')) : 0;
        
        DB::table('procurement_items')
                    ->where('id', '=', $id)
                    ->update([$attr => $value]);
        
        $ppmpitem = DB::table('procurement_items')
                        ->where('id', '=', $id)
                        ->first();
        $total = $ppmpitem->quantity * $ppmpitem->price;
        return number_format($total, 2);
        
    }

    public function toggleProcurementItemStatus(Request $request){
        $settings = Settings::all();
        $year = $settings[1]->setting_description;
        $proc_status = $settings[2]->setting_description;
        $deptid = ($request->input('deptid')) ? $request->input('deptid') : 0;

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
                ->where('id', '=', $request->input('id'))
                ->update([
                    'status' => $request->input('status')
                ]);

        return 1;
    }

    public function toggleProcurementItemMonth(Request $request){
        $settings = Settings::all();
        $year = $settings[1]->setting_description;
        $proc_status = $settings[2]->setting_description;
        $deptid = ($request->input('deptid')) ? $request->input('deptid') : 0;
        $id = $request->input('id');
        $month = strtolower($request->input('month'));
        $status = ($request->input('status') == "true") ? 1 : 0;

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
                ->where('id', '=', $id)
                ->update([
                    $month => $status
                ]);

        return 1;
    }

    public function retrieveBudgetedObjects(Request $request){
        $settings = Settings::all();
        $deptid = ($request->input('deptid')) ? ($request->input('deptid')) : 0;
        $year = ($request->input('year')) ? ($request->input('year')) : $settings[1]->setting_description;
        $objects = DepartmentBudget::with('object')->where('department', $deptid)->where('year', $year)->where('amount', '<>', 0)->where('status', '<>', 0)->orderBy('object', 'ASC')->get();
    
        return view('ppmp.budgetedobjs', array('objects' => $objects));
    }

    public function getNewProcurementForm(Request $request){
        $objectid = ($request->input('objectid')) ? ($request->input('objectid')) : 0;
        $items = Items::where('status', 1)->get();
        $units = Units::where('status', 1)->get();
        $modes = Lists::$modes;
        $months = Lists::$months;
        return view('ppmp.newprocurement', [
            'items' => $items,
            'units' => $units,
            'modes' => $modes,
            'objectid' => $objectid,
            'months' => $months
        ]);
    }

    public function retrieveProcurementList(Request $request){
        $settings = Settings::all();
        $deptid = ($request->input('deptid')) ? ($request->input('deptid')) : 0;
        $year = ($request->input('year')) ? ($request->input('year')) : $settings[1]->setting_description;

        
        $items = DB::table('procurement_items')
            ->join('procurement_info', 'procurement_info.id', '=', 'procurement_items.procurement_id')
            ->select('procurement_items.*')
            ->where('procurement_info.department', '=', $deptid)
            ->where('procurement_info.year', '=', $year)
            ->where('procurement_items.status', '<>', 0)
            ->get();

        $objects = DepartmentBudget::with(['object', 'aipcode'])->where('department', $deptid)->where('year', $year)->where('amount', '<>', 0)->orderBy('object', 'ASC')->get();
        return view('ppmp.procurementlist', array('items' => $items, 'objects' => $objects, 'months' => Lists::$months, 'mode' => Lists::$modes));
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
        $deptid = ($request->input('deptid')) ? $request->input('deptid') : 0;
        $year = $request->input('year');
        $procurement_year = $settings[1]->setting_description;

        $items = DB::table('procurement_items')
            ->join('procurement_info', 'procurement_info.id', '=', 'procurement_items.procurement_id')
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
                    ->where('pinfo.department', '=', $deptid)
                    ->where('pitem.itemname', '=', $item->itemname)
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
                        'itemname' => $item->itemname,
                        'unit' => $item->unit,
                        'object' => $item->object,
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
    
    public function getItems(){
        $control = '<input list="items" name="item" id="txt-field" class="form form-control form-control-sm">';
        $control .= '<datalist id="items">';
        $items = Items::where('status', 1)->get();

        foreach ($items as $item){
            $control .= '<option value="'.$item->itemname.'">';
        }
        $control .= '</datalist>';

        return $control;
    }

    public function getUnits(){
        $control = '<input list="units" name="unit" id="txt-field" class="form form-control form-control-sm">';
        $control .= '<datalist id="units">';
        $units = Units::where('status', 1)->get();

        foreach ($units as $unit){
            $control .= '<option value="'.$unit->description.'">';
        }
        $control .= '</datalist>';

        return $control;
    }

    public function export(Request $request){
        $dept = $request->input('deptid');
        $year = $request->input('year');

        
    }

    public function setProcurementSchedule(Request $request){
        $id = ($request->input('id')) ? $request->input('id') : 0;
        $advertisement = ($request->input('advertisement')) ? $request->input('advertisement') : 0;
        $bidding = ($request->input('bidding')) ? $request->input('bidding') : 0;
        $award = ($request->input('award')) ? $request->input('award') : 0;
        $contract_signing = ($request->input('contract_signing')) ? $request->input('contract_signing') : 0;

        $sched = ProcurementSchedule::where('item', $id)->first();

        if ($sched){
            ProcurementSchedule::where('item', $id)->update(['advertisement' => $advertisement, 'bidding' => $bidding, 'award' => $award, 'contract_signing' => $contract_signing]);
        }
        else{
            ProcurementSchedule::insert(['item' => $id, 'advertisement' => $advertisement, 'bidding' => $bidding, 'award' => $award, 'contract_signing' => $contract_signing]);
        }

        return 1;
    }

    public function editProcurementItem(Request $request){
        $form = ($request->input('form')) ? $request->input('form') : 0;
        $id = ($request->input('id')) ? $request->input('id') : 0;

        if ($form){
            $items = Items::where('status', 1)->get();
            $units = Units::where('status', 1)->get();
            $modes = Lists::$modes;
            $months = Lists::$months;
            $item_info = DB::table('procurement_items')->where('id', '=', $id)->first();
            return view('ppmp.editprocurement', [
                'id' => $id, 
                'info' => $item_info,
                'items' => $items,
                'units' => $units,
                'modes' => $modes,
                'months' => $months
            ]);
        }
        else{
            $id = ($request->input('id')) ? $request->input('id') : 0;
            $itemname = ($request->input('itemname')) ? trim($request->input('itemname')) : '';
            $unit = ($request->input('unit')) ?  trim($request->input('unit')) : 0;
            $quantity = ($request->input('qty')) ? $request->input('qty') : 0;
            $price = ($request->input('price')) ? str_replace(',','', $request->input('price')) : 0;
            $mode = ($request->input('mode')) ?  trim($request->input('mode')) : '';
            $jan = ($request->input('January')) ? $request->input('January') : 0;
            $feb = ($request->input('February')) ? $request->input('February') : 0;
            $mar = ($request->input('March')) ? $request->input('March') : 0;
            $apr = ($request->input('April')) ? $request->input('April') : 0;
            $may = ($request->input('May')) ? $request->input('May') : 0;
            $jun = ($request->input('June')) ? $request->input('June') : 0;
            $jul = ($request->input('July')) ? $request->input('July') : 0;
            $aug = ($request->input('August')) ? $request->input('August') : 0;
            $sep = ($request->input('September')) ? $request->input('September') : 0;
            $oct = ($request->input('October')) ? $request->input('October') : 0;
            $nov = ($request->input('November')) ? $request->input('November') : 0;
            $dec = ($request->input('December')) ? $request->input('December') : 0;

            DB::table('procurement_items')
                ->where('id', '=', $id)
                ->update([  
                    'itemname' => $itemname,
                    'unit' => $unit,    
                    'quantity' => $quantity,
                    'price' => $price,
                    'mode' => $mode,
                    'january' => $jan,
                    'february' => $feb,
                    'march' => $mar,
                    'april' => $apr,
                    'may' => $may,
                    'june' => $jun,
                    'july' => $jul,
                    'august' => $aug,
                    'september' => $sep,
                    'october' => $oct,
                    'november' => $nov,
                    'december' => $dec,
                    'status' => 1
                ]);
            return 1;
        }
        

    }
    
}
