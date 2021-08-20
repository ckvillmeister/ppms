<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use App\Models\Categories;
use App\Enums\Lists;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
    public function index()
    {
        if(!(Auth::check()))
        {
            return redirect('/');
        }
        else{
            $settings = Settings::all();

            if ($this::isAuthorized(Auth::user()->role, 'sidebarCategories')){
                return view('categories\index', array('settings' => $settings));
            }
            else{
                return view('forbidden\index', array('settings' => $settings));
            }
        }
        
    }

    public function create(Request $request)
    {
        $id = $request->input('id');

        if ($id){
            $data = ['category' => $request->input('category'),
                        'updatedby' => Auth::user()->id,
                        'dateupdated' => date('Y-m-d H:i:s'),
                        'status' => 1];
                        
            $result = Categories::where('id', $id)
                            ->update($data);

            return array('result' => 'Success',
                            'color' => 'green',
                            'message' => 'Category updated successfully!');
        }
        else{
            $data = ['category' => $request->input('category'),
                        'createdby' => Auth::user()->id,
                        'datecreated' => date('Y-m-d H:i:s'),
                        'status' => 1];
        
            $result = Categories::create($data);

            return array('result' => 'Success',
                            'color' => 'green',
                            'message' => 'New category successfully added!');
        }
        
    }

    public function retrieveCategories(Request $request){
        $categories = DB::table('categories')
                        ->where('status', '=', $request->input('status'))
                        ->orderBy('id', 'asc')
                        ->get();

        return view('categories\categorylist', array('categories' => $categories));
    }

    public function getForm(Request $request){
        $id = ($request->input('id')) ? $request->input('id') : 0;

        $categoryinfo = DB::table('categories')
                        ->where('id', '=', $id)
                        ->get();

        return view('categories\categoryform', array('categoryinfo' => $categoryinfo));
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
        
        $result = Categories::where('id', $id)
                            ->update($data);
        
        if ($status){
            $message = 'Category successfully re-activated!';
        }
        else{
            $message = 'Category successfully removed!';
        }
        return array('result' => 'Success',
                        'color' => 'green',
                        'message' => $message);
    }
}
