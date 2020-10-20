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


    public function getTotalMaterialAttribute()
    {
        return $this->material_->count();
    }


    /**
     * @return string
     */
    public function getReadyAllProductsLabelAttribute()
    {
        return '<a href="'.route('admin.order.readyallproducts', $this).'" data-toggle="tooltip" data-placement="top" title="Finalizar cantidades de este ticket" data-trans-button-cancel="'.__('buttons.general.cancel').'"  data-trans-button-confirm="'.__('buttons.general.continue').'" data-trans-title="'.__('strings.backend.general.are_you_sure').'" data-trans-text="'.__('labels.backend.access.order.alert_reintegrate').'" name="confirm_item"><span class="btn btn-primary custom-btn btn-sm" style="cursor:pointer">'.__('labels.backend.access.order.ready_all_quantities').'</span></a>';
    }


}
