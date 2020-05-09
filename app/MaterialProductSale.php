<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\MaterialProductSaleHistory;

class MaterialProductSale extends Model
{

    protected $table = 'material_product_sale';

	protected $fillable = [
        'sale_id', 'material_id', 'product_id', 'quantity'
    ];

    public function material()
    {
        return $this->belongsTo(Material::class, 'material_id', 'id')->withTrashed();
    }

    public function history()
    {
        return $this->hasMany(MaterialProductSaleHistory::class)->orderBy('updated_at', 'desc');
    }


}
