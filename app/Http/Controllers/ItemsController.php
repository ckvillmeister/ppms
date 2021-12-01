<?php

namespace App\Http\Controllers;

use App\Models\Items;
use App\Models\Settings;
use App\Models\Units;
use App\Models\ItemPrice;
use App\Models\ClassExpenditure;
use App\Models\ObjectExpenditure;
use App\Models\Categories;
use App\Enums\Lists;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class ItemsController extends Controller
{
 
    public function index()
    {
        if(!(Auth::check()))
        {
            return redirect('/');
        }
        else{
            $settings = Settings::all();

            if ($this::isAuthorized(Auth::user()->role, 'sidebarItems')){
                return view('items.index', array('settings' => $settings));
            }
            else{
                return view('forbidden.index', array('settings' => $settings));
            }
        }
        
    }

    public function retrieveItems(Request $request){
        $status = ($request->input('status')) ? $request->input('status') : 1;
        $year = date('Y');

        $items = DB::table('items')
                        ->join('units', 'units.id', '=', 'items.uom')
                        ->join('object_expenditures', 'object_expenditures.id', '=', 'items.object_of_expenditure')
                        ->join('categories', 'categories.id', '=', 'items.category')
                        ->join('item_price', 'item_price.itemid', '=', 'items.id')
                        ->select('items.*', 'item_price.*', 'units.description', 'object_expenditures.obj_exp_name', 'categories.category')
                        ->where('items.status', '=', $status)
                        ->where('item_price.year', '=', $year)
                        ->get();
        
        if ($request->path() == 'myprocurementRetrieveItems'){
            return view('myprocurement.itemlist', array('items' => $items));
        }
        elseif ($request->path() == 'manageprocurementRetrieveItems'){
            return view('manageprocurement.itemlist', array('items' => $items));
        }
        elseif ($request->path() == 'manageprocurementRetrieveItemsUpdate'){
            return view('manageprocurement.itemlistforupdate', array('items' => $items));
        }
        elseif ($request->path() == 'itemsRetrieveItems'){
            $items = DB::table('items')
                        ->join('units', 'units.id', '=', 'items.uom')
                        ->join('object_expenditures', 'object_expenditures.id', '=', 'items.object_of_expenditure')
                        ->join('categories', 'categories.id', '=', 'items.category')
                        ->join('item_price', 'item_price.itemid', '=', 'items.id')
                        ->select('items.*', 'item_price.*', 'units.description', 'object_expenditures.obj_exp_name', 'categories.category')
                        ->where('items.status', '=', $request->input('status'))
                        ->where('item_price.year', '=', $year)
                        ->get();
            return view('items.itemlist', array('items' => $items));
        }
    }

    public function getForm(Request $request){
        $id = ($request->input('id')) ? $request->input('id') : 0;
        $year = date('Y');

        $uom = Units::where('status', 1)->get();
        $categories = Categories::where('status', 1)->get();
        $classexpenditures = ClassExpenditure::where('status', 1)->get();
        
        $iteminfo = Items::with(['object_of_expenditure', 'item_price'])->where('items.id', $id)->get();
        $objinfo = (count($iteminfo) > 0) ? ObjectExpenditure::where('id', $iteminfo[0]->object_of_expenditure)->first() : '';
        $classinfo = [];
        $objects = [];

        if ($objinfo){
            foreach($classexpenditures as $class){
                if ($class->id == $objinfo->class_exp_id){
                    $classinfo = $class;
                }
            }

            $objects = ObjectExpenditure::where('class_exp_id', $classinfo->id)->get();
        }

        return view('items.itemform', array('iteminfo' => $iteminfo,
                                                'categories' => $categories,
                                                'classexpenditures' => $classexpenditures,
                                                'classinfo' => $classinfo,
                                                'objects' => $objects,
                                                'uom' => $uom));
    }

    public function create(Request $request)
    {
        $id = $request->input('id');

        if ($id){
            $data = ['itemname' => $request->input('itemname'),
                        'uom' => $request->input('uom'),
                        'object_of_expenditure' => $request->input('objexp'),
                        'updatedby' => Auth::user()->id,
                        'dateupdated' => date('Y-m-d H:i:s'),
                        'status' => 1];
                        
            $result = Items::where('id', $id)->update($data);

            $data = ['itemid' => $id,
                        'price' => $request->input('itemprice'),
                        'year' => date('Y'),
                        'updatedby' => Auth::user()->id,
                        'dateupdated' => date('Y-m-d H:i:s'),
                        'status' => 1];
            
            ItemPrice::where('id', $id)->update($data);

            return array('result' => 'Success',
                            'color' => 'green',
                            'message' => 'Office updated successfully!');
        }
        else{
            $data = ['itemname' => $request->input('itemname'),
                            'uom' => $request->input('uom'),
                            'object_of_expenditure' => $request->input('objexp'),
                            'category' => $request->input('category'),
                            'createdby' => Auth::user()->id,
                            'datecreated' => date('Y-m-d H:i:s'),
                            'status' => 1];
            
            $itemid = Items::insertGetId($data);

            $data = ['itemid' => $itemid,
                            'price' => $request->input('itemprice'),
                            'year' => date('Y'),
                            'createdby' => Auth::user()->id,
                            'datecreated' => date('Y-m-d H:i:s'),
                            'status' => 1];

            ItemPrice::create($data);

            return array('result' => 'Success',
                            'color' => 'green',
                            'message' => 'New item created!');
        }
    }

    public function toggleStatus(Request $request){
        $id = $request->input('id');
        $status = $request->input('status');
        $message = '';

        $data = [
            'updatedby' => Auth::user()->id,
            'dateupdated' => date('Y-m-d H:i:s'),
            'status' => $status
        ];
        
        $result = Items::where('id', $id)
                            ->update($data);
        
        if ($status){
            $message = 'Item successfully re-activated!';
        }
        else{
            $message = 'Item successfully removed!';
        }
        return array('result' => 'Success',
                        'color' => 'green',
                        'message' => $message);
    }

    public function getQueriedItemName(Request $request){
        $items =  Items::select("*")
                        ->where("itemname", "LIKE", "%" . trim($request->input('itemname')) . "%")
                        ->get();
        return $items;
    }

    public function replicateItems(Request $request){
        $year = ($request->input('year')) ? $request->input('year') : 0;
        $year_now = date('Y');
        
        $items = DB::table('items')
                        ->join('units', 'units.id', '=', 'items.uom')
                        ->join('object_expenditures', 'object_expenditures.id', '=', 'items.object_of_expenditure')
                        ->join('categories', 'categories.id', '=', 'items.category')
                        ->join('item_price', 'item_price.itemid', '=', 'items.id')
                        ->select('items.id', 'items.status', 'item_price.year', 'item_price.price')
                        ->where('items.status', '=', 1)
                        ->where('item_price.year', '=', $year)
                        ->get();

        if (count($items) > 0){
            foreach($items as $item){
                $chkItem = Items::join('item_price', 'item_price.itemid', '=', 'items.id')
                                ->select('items.id', 'item_price.year')
                                ->where('items.id', '=', $item->id)
                                ->where('item_price.year', '=', $year_now)
                                ->first();
                
                if (!($chkItem)){
                    $data = ['itemid' => $item->id,
                            'price' => $item->price,
                            'year' => $year_now,
                            'createdby' => Auth::user()->id,
                            'datecreated' => date('Y-m-d H:i:s'),
                            'status' => 1];
                    
                    ItemPrice::create($data);
                }
            }

            return 1;
        }
        else{
            return 2;
        }
        
    }
    
}
