<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Auth\User;
use App\ProductFinalOrder;
use App\PaymentMethod;
use Carbon;

class FinalOrder extends Model
{

    use SoftDeletes; 

    public function finalorder_user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function finalorder_payment()
    {
        return $this->belongsTo(PaymentMethod::class, 'payment_method_id')->withTrashed();
    }

    public function finalorder_generated_by()
    {
        return $this->belongsTo(User::class, 'audi_id')->withTrashed();
    }

    public function products()
    {
        return $this->hasMany(ProductFinalOrder::class);
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
