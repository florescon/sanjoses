<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Cart;
use App\Models\Auth\User;
use App\PaymentMethod;
use App\ProductSale;
use App\Product;
use App\Status;
use App\ColorSizeProduct;
use App\MaterialProductSaleUserMain;
use App\MaterialProductSaleUserSecond;
use App\MaterialProductSaleUser;
use App\StockRevision;
use App\StockRevisionLog;
use Carbon;

class Sale extends Model
{

    use SoftDeletes; 

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function payment()
    {
        return $this->belongsTo(PaymentMethod::class, 'payment_method_id')->withTrashed();
    }

    public function products()
    {
        return $this->hasMany(ProductSale::class);
    }

    public function products_and_log()
    {
        return $this->hasMany(ProductSale::class)->with('product_revision_log');
    }

    public function material_product_sale()
    {
        return $this->hasMany(MaterialProductSale::class);
    }

    public function product_sale_staff()
    {
        return $this->hasMany(MaterialProductSaleUser::class);
    }

    public function product_sale_staff_main_()
    {
        return $this->hasMany(MaterialProductSaleUserMain::class)->orderBy('created_at', 'desc');
    }

    public function product_revision_log()
    {
        return $this->hasMany(StockRevisionLog::class);
    }

    public function product_sale_staff_main()
    {
        return $this->hasManyThrough(MaterialProductSaleUser::class, MaterialProductSaleUserMain::class);
    }

    public function generated_by()
    {
        return $this->belongsTo(User::class, 'audi_id')->withTrashed();
    }


    public function status() {
        return $this->belongsToMany(Status::class, 'status_sale')->withTrashed()->withTimestamps()->withPivot('audi_id', 'created_at')->orderBy('status_sale.created_at', 'desc');
    }

    public function status_bar() {
        return $this->belongsToMany(Status::class, 'status_sale')->withTimestamps()->withPivot('audi_id', 'created_at')->orderBy('status_sale.created_at', 'desc');
    }


    /**
     * Get the last status record associated with the sale.
     */
    public function status_last()
    {
        return $this->hasOne(Status::class, 'status_sale');
    }

    // this is not a relationship. just a standard method on the model.
    public function latestStatus() {
        return $this->status()->first();
    }


    public function getProductionAttribute(){
        return $this->latestStatus()->id != 1;
    }

    /**
     * @return string
     */
    public function getProductionLabelAttribute()
    {


        if ($this->latestStatus()->id !=1) {
            return '<span class="badge badge-success">'.__('labels.general.yes').'</span>';
        }

        return '<a href="'.route('admin.order.production', $this).'" data-toggle="tooltip" data-placement="top" title="'.__('buttons.backend.access.users.confirm').'" data-trans-button-cancel="'.__('buttons.general.cancel').'"  data-trans-button-confirm="'.__('buttons.general.continue').'" data-trans-title="'.__('strings.backend.general.are_you_sure').'" name="confirm_item"><span class="badge badge-danger" style="cursor:pointer">'.__('labels.general.no').'</span></a>';
    }


    /**
     * @return string
     */
    public function getFinalLabelAttribute()
    {


        if ($this->latestStatus()->id == 2) {
            return '<span class="badge badge-success">'.__('labels.general.finished').'</span>';
        }

        return '<a href="'.route('admin.order.final', $this).'" data-toggle="tooltip" data-placement="top" title="'.__('buttons.backend.access.users.confirm').'" data-trans-button-cancel="'.__('buttons.general.cancel').'"  data-trans-button-confirm="'.__('buttons.general.continue').'" data-trans-title="'.__('strings.backend.general.are_you_sure').'" name="confirm_item"><span class="badge badge-danger" style="cursor:pointer">'.__('labels.general.no').'</span></a>';
    }


    /**
     * @return string
     */
    public function getReintegrateAllLabelAttribute()
    {


        return '<a href="'.route('admin.order.reintegrateallproducts', $this).'" data-toggle="tooltip" data-placement="top" title="'.__('buttons.backend.access.users.confirm').'" data-trans-button-cancel="'.__('buttons.general.cancel').'"  data-trans-button-confirm="'.__('buttons.general.continue').'" data-trans-title="'.__('strings.backend.general.are_you_sure').'" data-trans-text="'.__('labels.backend.access.order.alert_reintegrate').'" name="confirm_item"><span class="btn btn-success ml-1 btn-sm" style="cursor:pointer">'.__('labels.backend.access.order.reintegrate_all_to_stock').'</span></a>';
    }



    public function setDateEnteredAttribute($value): void
    {
      $this->attributes['date_entered'] =
        Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d');
    }


    public function getTotalProducts()
    {
        return $this->products->sum(function($products) {
          return $products->quantity;
        });
    }


}
