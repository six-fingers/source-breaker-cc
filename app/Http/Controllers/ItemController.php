<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ItemCreateRequest;
use App\Http\Requests\ItemDeleteRequest;
use App\Http\Requests\ItemUpdateRequest;
use App\Repositories\UserItemRepository;

class ItemController extends Controller
{

    /**
     * Controller Constructor Method.
     * 
     * @param  UserItemRepository  $userItemRepository
     */
    public function __construct(UserItemRepository $userItemRepository)
    {
        $this->userItemRepository = $userItemRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = $this->userItemRepository->all();

        return response()->json( $items );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param ItemCreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function create( ItemCreateRequest $request )
    {
        $item = $this->userItemRepository->create(
            $request->only('name')
        );
        
        return response()->json( $item );
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
        $item = $this->userItemRepository->update(
            $request->id
        );

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
        $item = $this->userItemRepository->delete( $request->id );

        return response()->json( $item );
    }
}
