<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Models\Settings;
use App\Models\Departments;
use App\Enums\Lists;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Settings::all();
        $departments = Departments::all();

        if(!(Auth::check()))
        {
            return redirect('/');
        }
        else{
            return view('procurement\review', array('settings' => $settings,
                                                    'departments' => $departments));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        //
    }

    public function retrieveProcurementList(Request $request){
        $settings = Settings::all();
        $dept = $request->input('dept');
        $year = $settings[1]->setting_description;

        $items = DB::table('procurement_items')
            ->join('procurement_info', 'procurement_info.id', '=', 'procurement_items.procurement_id')
            ->join('items', 'items.id', '=', 'procurement_items.itemid')
            ->select('procurement_items.*', 'items.uom', 'items.category')
            ->where('procurement_info.department', '=', $dept)
            ->where('procurement_info.year', '=', $year)
            ->where('procurement_items.status', '<>', 0)
            ->orderBy('items.category', 'asc')
            ->orderBy('procurement_items.itemname', 'asc')
            ->get();

        $months = Lists::$months;
        return view('procurement\procurement_review_list', array('months' => $months,
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
            DB::table('procurement_items')
                ->where('id', '=', $item[0])
                ->update([
                    'itemname' => $item[1],
                    'quantity' => $item[2],
                    'price' => $item[3],
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
    
}
