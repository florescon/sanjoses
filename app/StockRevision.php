<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockRevision extends Model
{

    protected $table = 'stock_revisions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id', 'quantity', 'ready_quantity'
    ];

    public function product_detail()
    {
        return $this->belongsTo(ColorSizeProduct::class, 'product_id');
    }



}
