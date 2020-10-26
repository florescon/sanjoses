<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;


class StockRevisions extends Model
{

    protected $table = 'stock_revisions';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sale_id', 'product_id', 'quantity', 'ready_quantity'
    ];

    public function product_stock()
    {
        return $this->belongsTo(ColorSizeProduct::class, 'product_id', 'id');
    }



}