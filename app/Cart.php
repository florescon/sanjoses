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

    public function boms_bysize()
    {
        return $this->hasManyThrough(SizeBom::class, ColorSizeProduct::class, 'id', 'product_id', 'product_id', 'product_id');
    }

    public function bom_cloth()
    {
        return $this->hasManyThrough(ClothBoms::class, ColorSizeProduct::class, 'id', 'product_id', 'product_id', 'product_id');
    }


    public function bom_bysizecloth()
    {
        return $this->hasManyThrough(SizeClothBoms::class, ColorSizeProduct::class, 'id', 'product_id', 'product_id', 'product_id');
    }



}
