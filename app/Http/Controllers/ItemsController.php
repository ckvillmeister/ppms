<?php

namespace App\Http\Controllers;

use App\Models\Items;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data = array('itemname' => $request->input('itemname'),
                        'price' => $request->input('itemprice'),
                        'uom' => $request->input('uom'),
                        'category' => $request->input('category'),
                        'datecreated' => date('Y-m-d H:i:s'),
                        'status' => 1);

        $result = Items::create($data);
        return array('result' => 'Success',
                        'color' => 'green',
                        'message' => 'New item created!');
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
     * @param  \App\Models\Items  $items
     * @return \Illuminate\Http\Response
     */
    public function show(Items $items)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Items  $items
     * @return \Illuminate\Http\Response
     */
    public function edit(Items $items)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Items  $items
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Items $items)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Items  $items
     * @return \Illuminate\Http\Response
     */
    public function destroy(Items $items)
    {
        //
    }

    public function displayItemListProcurement(){
        $items =  Items::select("*")
                        ->where("status", "=", 1)
                        ->get();
        return view('procurement\itemlist', array('items' => $items));
    }

    public function getQueriedItemName(Request $request){
        $items =  Items::select("*")
                        ->where("itemname", "LIKE", "%" . trim($request->input('itemname')) . "%")
                        ->get();
        return $items;
    }
}
