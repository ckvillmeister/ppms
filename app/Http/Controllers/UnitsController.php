<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use App\Models\Units;
use App\Enums\Lists;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UnitsController extends Controller
{
    public function index()
    {
        if(!(Auth::check()))
        {
            return redirect('/');
        }
        else{
            $settings = Settings::all();

            if ($this::isAuthorized(Auth::user()->role, 'sidebarUnits')){
                return view('units.index', array('settings' => $settings));
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
            $data = ['uom' => $request->input('uom'),
                        'description' => $request->input('description'),
                        'updatedby' => Auth::user()->id,
                        'dateupdated' => date('Y-m-d H:i:s'),
                        'status' => 1];
                        
            $result = Units::where('id', $id)
                            ->update($data);

            return array('result' => 'Success',
                            'color' => 'green',
                            'message' => 'Unit of measurement successfully updated!');
        }
        else{
            $data = ['uom' => $request->input('uom'),
                        'description' => $request->input('description'),
                        'createdby' => Auth::user()->id,
                        'datecreated' => date('Y-m-d H:i:s'),
                        'status' => 1];
        
            $result = Units::create($data);

            return array('result' => 'Success',
                            'color' => 'green',
                            'message' => 'New unit of measurement successfully added!');
        }
        
    }

    public function retrieveUnits(Request $request){
        $units = DB::table('units')
                        ->where('status', '=', $request->input('status'))
                        ->orderBy('id', 'asc')
                        ->get();

        return view('units.unitlist', array('units' => $units));
    }

    public function getForm(Request $request){
        $id = ($request->input('id')) ? $request->input('id') : 0;

        $unitinfo = DB::table('units')
                        ->where('id', '=', $id)
                        ->get();

        return view('units.unitform', array('unitinfo' => $unitinfo));
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
        
        $result = Units::where('id', $id)
                            ->update($data);
        
        if ($status){
            $message = 'Unit of measurement successfully re-activated!';
        }
        else{
            $message = 'Unit of measurement successfully removed!';
        }
        return array('result' => 'Success',
                        'color' => 'green',
                        'message' => $message);
    }
}
