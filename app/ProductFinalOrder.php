<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\Auth\User;
use App\FinalOrder;
use App\ColorSizeProduct;
use App\StockRevisionLog;

class ProductFinalOrder extends Model
{

    protected $table = 'product_final_order';

	protected $fillable = [
        'final_order_id', 'product_id', 'quantity', 'price'
    ];


    public function product_detail()
    {
        return $this->belongsTo(ColorSizeProduct::class, 'product_id');
    }

    public function finalorder(){
    	return $this->belongsTo(FinalOrder::class);
    }

    public function finalorder_product()
    {
        return $this->belongsToMany(ColorSizeProduct::class);
    }

    public function finalorder_product_revision_log()
    {
        return $this->hasMany(StockRevisionLog::class, 'product_sale_id');
    }



}
