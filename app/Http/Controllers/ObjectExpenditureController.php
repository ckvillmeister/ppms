<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use App\Models\ObjectExpenditure;
use App\Models\ClassExpenditure;
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
                        'class_exp_id' => $request->input('class_exp'),
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
                        'class_exp_id' => $request->input('class_exp'),
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
        $objectexpenditures = ObjectExpenditure::with('class_of_expenditure')
                                                ->where('status', '=', $request->input('status'))
                                                ->orderBy('id', 'asc')
                                                ->get();

        return view('objectexpenditures.objectexpenditurelist', array('objectexpenditures' => $objectexpenditures));
    }

    public function retrieveObjectExpendituresByClass(Request $request){
        $objectexpenditures = ObjectExpenditure::where('class_exp_id', $request->input('classid'))
                                                ->orderBy('id', 'asc')
                                                ->get();

        return json_encode($objectexpenditures);
    }

    public function getForm(Request $request){
        $id = ($request->input('id')) ? $request->input('id') : 0;

        $objectexpenditureinfo = DB::table('object_expenditures')
                        ->where('id', '=', $id)
                        ->get();

        $class_exp = ClassExpenditure::where('status', 1)->get();

        return view('objectexpenditures.objectexpenditureform', array('objectexpenditureinfo' => $objectexpenditureinfo,
                                                                        'class_exp' => $class_exp
                                                                    ));
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
