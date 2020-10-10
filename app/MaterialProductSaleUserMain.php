<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\MaterialProductSaleUser;
use App\Models\Auth\User;

class MaterialProductSaleUserMain extends Model
{

    protected $table = 'material_product_sale_user_mains';

    public function product()
    {
        return $this->hasMany(MaterialProductSaleUser::class, 'main_id', 'id');
    }

    public function product_()
    {
        return $this->hasMany(MaterialProductSaleUser::class);
    }

    public function material_()
    {
        return $this->hasMany(MaterialProductSaleUserSecond::class);
    }

    public function product_stock()
    {
        return $this->belongsTo(ColorSizeProduct::class, 'material_id', 'id');
    }

    public function staff()
    {
        return $this->belongsTo(User::class, 'user_id')->withTrashed();
    }

    public function created_by()
    {
        return $this->belongsTo(User::class, 'audi_id')->withTrashed();
    }


}
