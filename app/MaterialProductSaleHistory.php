<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\Auth\User;

class MaterialProductSaleHistory extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'material_product_sale_id', 'old_quantity', 'quantity', 'type', 'audi_id'
    ];

    public function generated_by()
    {
        return $this->belongsTo(User::class, 'audi_id')->withTrashed();
    }

}
