<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockRevisionLog extends Model
{

    protected $table = 'stock_revision_logs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sale_id', 'product_id', 'quantity', 'type'
    ];


    public function product_detail()
    {
        return $this->belongsTo(ColorSizeProduct::class, 'product_id');
    }


}
