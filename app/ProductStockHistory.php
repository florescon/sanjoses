<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\Auth\User;
use App\ColorSizeProduct;

class ProductStockHistory extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_stock_id', 'old_quantity', 'quantity', 'type', 'audi_id'
    ];

    public function product_stock()
    {
        return $this->belongsTo(ColorSizeProduct::class, 'product_stock_id');
    }

    public function generated_by()
    {
        return $this->belongsTo(User::class, 'audi_id');
    }

    public function product_has()
    {
        return $this->hasOneThrough(Product::class, ColorSizeProduct::class, 'product_id', 'id', 'product_stock_id', 'product_id');
    }

}
