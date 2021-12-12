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
        $limit = ($request->input('limit')) ? $request->input('limit') : 0;

        $items = Items::join('units', 'units.id', '=', 'items.uom')
                        ->join('object_expenditures', 'object_expenditures.id', '=', 'items.object_of_expenditure')
                        ->join('categories', 'categories.id', '=', 'items.category')
                        ->select('items.*', 'units.description', 'object_expenditures.obj_exp_name', 'categories.category')
                        ->where('items.status', '=', $status)
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
            $qryItems = Items::join('categories', 'categories.id', '=', 'items.category')
                                ->where('items.status', '=', $request->input('status'));

            if ($limit){
                $qryItems = $qryItems->limit($limit);
            }
                        
            $items = $qryItems->get();
            return view('items.itemlist', array('items' => $items));
        }
    }

    public function getForm(Request $request){
        $id = ($request->input('id')) ? $request->input('id') : 0;
        $year = date('Y');

        $uom = Units::where('status', 1)->get();
        $categories = Categories::where('status', 1)->get();
        $classexpenditures = ClassExpenditure::where('status', 1)->get();
        
        $iteminfo = Items::with('object_of_expenditure')->where('items.id', $id)->first();
        $objinfo = ($iteminfo) ? ObjectExpenditure::where('id', $iteminfo->object_of_expenditure)->first() : '';
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
        $confirm = ($request->input('confirm')) ? $request->input('confirm') : 0;
        $id = ($request->input('id')) ? $request->input('id') : 0;
        $itemname = $request->input('itemname');
        $uom = $request->input('uom');
        $price = str_replace(',', '', $request->input('itemprice'));
        $objexp = $request->input('objexp');
        $itemlist = Items::where('status', 1)->get();
        $identical_items = [];

        if ($confirm){
            goto add_item;
        }
        
        foreach($itemlist as $item){
            $compare = similar_text($itemname, $item->itemname, $perc);

            if ($perc >= 50){
                $item->perc = $perc;
                $identical_items[] = $item;
            }
        }
        
        if (count($identical_items) > 0){
            return view('items.identical_items', ['identical_items' => $identical_items]);
        }
        else{
            goto add_item;
        }

        add_item:
        if ($id){
            $data = [   
                    'itemname' => $itemname,
                    'uom' => $uom,
                    'price' => floatval($price),
                    'object_of_expenditure' => $objexp,
                    'updatedby' => Auth::user()->id,
                    'dateupdated' => date('Y-m-d H:i:s'),
                    'status' => 1
                ];
                        
            $result = Items::where('id', $id)->update($data);

            return 2;
        }
        else{
            $data = [
                    'itemname' => $itemname,
                    'uom' => $uom,
                    'price' => floatval($price),
                    'object_of_expenditure' => $objexp,
                    'category' => $request->input('category'),
                    'createdby' => Auth::user()->id,
                    'datecreated' => date('Y-m-d H:i:s'),
                    'status' => 1
                ];
            
            Items::insert($data);

            return 1;
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
    
}
