<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ItemCreateRequest;
use App\Http\Requests\ItemDeleteRequest;
use App\Http\Requests\ItemUpdateRequest;
use App\Item;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
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
    public function create( ItemCreateRequest $request )
    {
        // 
        $request->headers->set('Accept', 'application/json');
        //


        $item = new Item;
        $item->name = $request->name;
        $item->user_id = auth('api')->user()->id;
        $item->save();

        $id = DB::getPdo()->lastInsertId();
        $item = Item::find( $id );
        
        return response()->json( $item );

        // die('crateItem');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ItemUpdateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(ItemUpdateRequest $request)
    {
        $item = Item::find( $request->id );

        if( !$item ) {
            throw new \Exception('Item Not Found', 404);
        }

        $item->is_done = !$item->is_done;

        $item->save();

        return response()->json( $item );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  ItemDeleteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy( ItemDeleteRequest $request )
    {
        $item = Item::find( $request->id );

        if( !$item ) {
            throw new \Exception('Item Not Found', 404);
        }

        $item->delete();

        return response()->json( $item );
    }
}
