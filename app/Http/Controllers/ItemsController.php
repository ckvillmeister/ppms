<?php

namespace App\Http\Controllers;

use App\Models\Items;
use App\Models\Settings;
use App\Models\Units;
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
                return view('items\index', array('settings' => $settings));
            }
            else{
                return view('forbidden\index', array('settings' => $settings));
            }
        }
        
    }

    public function retrieveItems(Request $request){
        $status = ($request->input('status')) ? $request->input('status') : 1;
        $items = DB::table('items')
                        ->join('units', 'units.id', '=', 'items.uom')
                        ->join('object_expenditures', 'object_expenditures.id', '=', 'items.object_of_expenditure')
                        ->join('categories', 'categories.id', '=', 'items.category')
                        ->select('items.*', 'units.description', 'object_expenditures.obj_exp_name', 'categories.category')
                        ->where('items.status', '=', $status)
                        ->get();
        
        if ($request->path() == 'myprocurementRetrieveItems'){
            return view('myprocurement\itemlist', array('items' => $items));
        }
        elseif ($request->path() == 'manageprocurementRetrieveItems'){
            return view('manageprocurement\itemlist', array('items' => $items));
        }
        elseif ($request->path() == 'manageprocurementRetrieveItemsUpdate'){
            return view('manageprocurement\itemlistforupdate', array('items' => $items));
        }
        elseif ($request->path() == 'itemsRetrieveItems'){
            $items = DB::table('items')
                        ->join('units', 'units.id', '=', 'items.uom')
                        ->join('object_expenditures', 'object_expenditures.id', '=', 'items.object_of_expenditure')
                        ->join('categories', 'categories.id', '=', 'items.category')
                        ->select('items.*', 'units.description', 'object_expenditures.obj_exp_name', 'categories.category')
                        ->where('items.status', '=', $request->input('status'))
                        ->get();
            return view('items\itemlist', array('items' => $items));
        }
    }

    public function getForm(Request $request){
        $id = ($request->input('id')) ? $request->input('id') : 0;

        $uom = Units::all();
        $categories = Categories::all();
        $objexpenditures = ObjectExpenditure::all();
        $iteminfo = DB::table('items')
                        ->where('id', '=', $id)
                        ->get();
                        

        return view('items\itemform', array('iteminfo' => $iteminfo,
                                                'categories' => $categories,
                                                'objexpenditures' => $objexpenditures,
                                                'uom' => $uom));
    }

    public function create(Request $request)
    {
        $id = $request->input('id');

        if ($id){
            $data = ['itemname' => $request->input('itemname'),
                        'price' => $request->input('itemprice'),
                        'uom' => $request->input('uom'),
                        'object_of_expenditure' => $request->input('objexp'),
                        'updatedby' => Auth::user()->id,
                        'dateupdated' => date('Y-m-d H:i:s'),
                        'status' => 1];
                        
            $result = Items::where('id', $id)
                            ->update($data);

            return array('result' => 'Success',
                            'color' => 'green',
                            'message' => 'Office updated successfully!');
        }
        else{
            $data = ['itemname' => $request->input('itemname'),
                            'price' => $request->input('itemprice'),
                            'uom' => $request->input('uom'),
                            'object_of_expenditure' => $request->input('objexp'),
                            'category' => $request->input('category'),
                            'createdby' => Auth::user()->id,
                            'datecreated' => date('Y-m-d H:i:s'),
                            'status' => 1];
            
            $result = Items::create($data);
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
    
}
