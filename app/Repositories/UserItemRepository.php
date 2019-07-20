<?php
namespace App\Repositories;

use App\Item;
use App\Scopes\LoggedUserScope;
use Illuminate\Support\Facades\DB;

class UserItemRepository extends Repository
{
    /**
     * Controller Constructor Method.
     * 
     * @param  Item  $itemModel
     */
    public function __construct(Item $itemModel)
    {
        $itemModel::addGlobalScope(new LoggedUserScope);
        parent::__construct( $itemModel );
    }

    /**
     * Create a new record in the database.
     * 
     * @param  Array  $data
     * @return Item
     */
    public function create(Array $data)
    {
        $item = new Item;
        $item->name = $data['name'];
        $item->user_id = auth('api')->user()->id;
        $item->save();

        $id = DB::getPdo()->lastInsertId();
        $item = $this->model::findOrFail( $id );

        return $item;
    }

    /**
     * Update a record in the database.
     * 
     * @param  Integer  $id
     * @param  Array  $data
     * 
     * @return Item
     */
    public function update( $id, Array $data=[] )
    {
        $item = $this->model::findOrFail( $id );

        $item->is_done = !$item->is_done;

        $item->save();

        $item = $this->model->findOrFail($id);
        return $item;
    }

    /**
     * Delete a record from the database.
     * 
     * @param  Integer  $id
     * 
     * @return Item
     */
    // remove record from the database
    public function delete( $id )
    {
        $item = $this->model::findOrFail( $id );

        $item->delete();

        return $item;
    }
}