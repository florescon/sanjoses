<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClothBoms extends Model
{

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id', 'quantity'
    ];

}
