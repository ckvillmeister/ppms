<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use App\Models\ClassExpenditure;
use App\Enums\Lists;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClassExpenditureController extends Controller
{
    public function index()
    {
        if(!(Auth::check()))
        {
            return redirect('/');
        }
        else{
            $settings = Settings::all();

            if ($this::isAuthorized(Auth::user()->role, 'sidebarClassExpenditures')){
                return view('classexpenditures.index', array('settings' => $settings));
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
            $data = ['class_exp_name' => $request->input('class_exp_name'),
                        'updatedby' => Auth::user()->id,
                        'dateupdated' => date('Y-m-d H:i:s'),
                        'status' => 1];
                        
            $result = ClassExpenditure::where('id', $id)
                            ->update($data);

            return array('result' => 'Success',
                            'color' => 'green',
                            'message' => 'Class of expenditure successfully updated!');
        }
        else{
            $data = ['class_exp_name' => $request->input('class_exp_name'),
                        'createdby' => Auth::user()->id,
                        'datecreated' => date('Y-m-d H:i:s'),
                        'status' => 1];
        
            $result = ClassExpenditure::create($data);

            return array('result' => 'Success',
                            'color' => 'green',
                            'message' => 'Class of expenditure successfully added!');
        }
        
    }

    public function retrieveClassExpenditures(Request $request){
        $classexpenditures = DB::table('class_expenditures')
                        ->where('status', '=', $request->input('status'))
                        ->orderBy('id', 'asc')
                        ->get();

        return view('classexpenditures.classexpenditurelist', array('classexpenditures' => $classexpenditures));
    }

    public function getForm(Request $request){
        $id = ($request->input('id')) ? $request->input('id') : 0;

        $classexpenditureinfo = DB::table('class_expenditures')
                        ->where('id', '=', $id)
                        ->get();

        return view('classexpenditures.classexpenditureform', array('classexpenditureinfo' => $classexpenditureinfo));
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
        
        $result = ClassExpenditure::where('id', $id)
                            ->update($data);
        
        if ($status){
            $message = 'Class expenditure successfully re-activated!';
        }
        else{
            $message = 'Class expenditure successfully removed!';
        }
        return array('result' => 'Success',
                        'color' => 'green',
                        'message' => $message);
    }
}
