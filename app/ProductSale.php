<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\Auth\User;
use App\Sale;
use App\ColorSizeProduct;
use App\Bom;

class ProductSale extends Model
{

    protected $table = 'product_sale';

	protected $fillable = [
        'sale_id', 'product_id', 'quantity', 'price'
    ];

    public function product_detail()
    {
        return $this->belongsTo(ColorSizeProduct::class, 'product_id');
    }


    public function sale(){
    	return $this->belongsTo(Sale::class);
    }

    public function product()
    {
        return $this->belongsToMany(ColorSizeProduct::class);
    }

    public function boms()
    {
        return $this->hasManyThrough(Bom::class, ColorSizeProduct::class, 'id', 'product_id', 'product_id', 'product_id');
    }


    // this is not a relationship. just a standard method on the model.
    public function ReintegrateStatus() {
        return $this->reintegrate;
    }


    /**
     * @return string
     */
    public function getReintegrateLabelAttribute()
    {


        if ($this->ReintegrateStatus() != 0) {
            return '<span class="badge badge-secondary">'.__('labels.backend.access.order.reintegrated_into_stock').'</span>';
        }

        return '<a href="'.route('admin.order.reintegrateproduct', $this).'" data-toggle="tooltip" data-placement="top" title="'.__('buttons.backend.access.users.confirm').'" data-trans-button-cancel="'.__('buttons.general.cancel').'"  data-trans-button-confirm="'.__('buttons.general.continue').'" data-trans-title="'.__('strings.backend.general.are_you_sure').'" name="confirm_item"><span class="badge badge-success" style="cursor:pointer">'.__('labels.backend.access.order.reintegrate_to_stock').'</span></a>';
    }


}
