<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaterialProductSaleUserSecond extends Model
{

   protected $table = 'material_product_sale_user_seconds';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'material_product_sale_user_main_id', 'material_id', 'quantity', 'ready_quantity'
    ];

 
    public function material()
    {
        return $this->belongsTo(Material::class, 'material_id', 'id')->withTrashed();
    }

 
	 public function product_stock()
    {
        return $this->belongsTo(ColorSizeProduct::class, 'material_id', 'id');
    }

}
