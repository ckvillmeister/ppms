<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use App\Models\ObjectExpenditure;
use App\Enums\Lists;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ObjectExpenditureController extends Controller
{
    public function index()
    {
        if(!(Auth::check()))
        {
            return redirect('/');
        }
        else{
            $settings = Settings::all();

            if ($this::isAuthorized(Auth::user()->role, 'sidebarObjectExpenditures')){
                return view('objectexpenditures.index', array('settings' => $settings));
            }
            else{
                return view('forbidden.index', array('settings' => $settings));
            }
        }
    }

    public function create(Request $request)
    {
        $id = $request->input('id');

        if ($id){
            $data = ['obj_exp_name' => $request->input('obj_exp_name'),
                        'updatedby' => Auth::user()->id,
                        'dateupdated' => date('Y-m-d H:i:s'),
                        'status' => 1];
                        
            $result = ObjectExpenditure::where('id', $id)
                            ->update($data);

            return array('result' => 'Success',
                            'color' => 'green',
                            'message' => 'Object expenditure successfully updated!');
        }
        else{
            $data = ['obj_exp_name' => $request->input('obj_exp_name'),
                        'createdby' => Auth::user()->id,
                        'datecreated' => date('Y-m-d H:i:s'),
                        'status' => 1];
        
            $result = ObjectExpenditure::create($data);

            return array('result' => 'Success',
                            'color' => 'green',
                            'message' => 'Object expenditure successfully added!');
        }
        
    }

    public function retrieveObjectExpenditures(Request $request){
        $objectexpenditures = DB::table('object_expenditures')
                        ->where('status', '=', $request->input('status'))
                        ->orderBy('id', 'asc')
                        ->get();

        return view('objectexpenditures.objectexpenditurelist', array('objectexpenditures' => $objectexpenditures));
    }

    public function getForm(Request $request){
        $id = ($request->input('id')) ? $request->input('id') : 0;

        $objectexpenditureinfo = DB::table('object_expenditures')
                        ->where('id', '=', $id)
                        ->get();

        return view('objectexpenditures.objectexpenditureform', array('objectexpenditureinfo' => $objectexpenditureinfo));
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
        
        $result = ObjectExpenditure::where('id', $id)
                            ->update($data);
        
        if ($status){
            $message = 'Object expenditure successfully re-activated!';
        }
        else{
            $message = 'Object expenditure successfully removed!';
        }
        return array('result' => 'Success',
                        'color' => 'green',
                        'message' => $message);
    }
}
