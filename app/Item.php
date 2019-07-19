<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'is_done' => false,
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'is_done'
    ];
}
