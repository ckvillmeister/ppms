<?php

namespace App\Http\Controllers;

use App\Models\Departments;
use App\Models\Settings;
use App\Enums\Lists;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DepartmentsController extends Controller
{
    public function index()
    {
        if(!(Auth::check()))
        {
            return redirect('/');
        }
        else{
            $settings = Settings::all();

            if ($this::isAuthorized(Auth::user()->role, 'sidebarDepartments')){
                return view('departments\index', array('settings' => $settings));
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
            $data = ['office_name' => $request->input('office_name'),
                        'description' => $request->input('description'),
                        'office_head' => $request->input('office_head'),
                        'sub_office' => $request->input('sub_office'),
                        'sub_office_in_charge' => $request->input('sub_office_in_charge'),
                        'position' => $request->input('position'),
                        'updatedby' => Auth::user()->id,
                        'dateupdated' => date('Y-m-d H:i:s'),
                        'status' => 1];
                        
            $result = Departments::where('id', $id)
                            ->update($data);

            return array('result' => 'Success',
                            'color' => 'green',
                            'message' => 'Office updated successfully!');
        }
        else{
            $data = ['office_name' => $request->input('office_name'),
                        'description' => $request->input('description'),
                        'office_head' => $request->input('office_head'),
                        'sub_office' => $request->input('sub_office'),
                        'sub_office_in_charge' => $request->input('sub_office_in_charge'),
                        'position' => $request->input('position'),
                        'createdby' => Auth::user()->id,
                        'datecreated' => date('Y-m-d H:i:s'),
                        'status' => 1];
        
            $result = Departments::create($data);

            return array('result' => 'Success',
                            'color' => 'green',
                            'message' => 'New deparment / office added!');
        }
        
    }

    public function retrieveDepartments(Request $request){
        $departments = DB::table('departments')
                        ->where('status', '=', $request->input('status'))
                        ->orderBy('id', 'asc')
                        ->get();

        return view('departments\departmentlist', array('departments' => $departments));
    }

    public function getForm(Request $request){
        $id = ($request->input('id')) ? $request->input('id') : 0;

        $deptinfo = DB::table('departments')
                        ->where('id', '=', $id)
                        ->get();

        return view('departments\departmentform', array('deptinfo' => $deptinfo));
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
        
        $result = Departments::where('id', $id)
                            ->update($data);
        
        if ($status){
            $message = 'Department / office successfully re-activated!';
        }
        else{
            $message = 'Department / office successfully removed!';
        }
        return array('result' => 'Success',
                        'color' => 'green',
                        'message' => $message);
    }
}
