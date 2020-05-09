<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Color;
use App\Product;

class ProductColor extends Model
{

	protected $fillable = [
        'product_id', 'color_id',
    ];

}
