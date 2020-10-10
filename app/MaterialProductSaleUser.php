<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\Auth\User;
use App\Product;

class MaterialProductSaleUser extends Model
{

    protected $table = 'material_product_sale_user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'material_product_sale_user_main_id', 'material_id', 'quantity', 'ready_quantity'
    ];

    public function product_stock()
    {
        return $this->belongsTo(ColorSizeProduct::class, 'material_id', 'id');
    }

    public function staff()
    {
        return $this->belongsTo(User::class, 'user_id')->withTrashed();
    }

}
