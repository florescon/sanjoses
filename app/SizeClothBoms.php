<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SizeClothBoms extends Model
{

    protected $table = 'size_cloth_boms';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'product_id', 'size_id', 'quantity'
    ];


}
