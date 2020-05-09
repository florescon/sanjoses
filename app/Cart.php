<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ColorSizeProduct;

class Cart extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'product_id', 'quantity', 'price'
    ];

    public function product()
    {
        return $this->belongsTo(ColorSizeProduct::class, 'product_id', 'id');
    }

    public function boms()
    {
        return $this->hasManyThrough(Bom::class, ColorSizeProduct::class, 'id', 'product_id', 'product_id', 'product_id');
    }


}
