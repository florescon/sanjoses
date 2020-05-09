<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Sale;
use App\Subscription;

class PaymentMethod extends Model
{

    use SoftDeletes; 

    protected $dates = ['deleted_at']; 

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
    ];

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    public function getTotalSalesAttribute() {
        $totalPrice = 0;

        foreach ($this->sales as $orderItem) {

            foreach ($orderItem->products as $product) {
                $totalPrice+=$product->quantity* $product->product_detail->price;
            }

        }

        return $totalPrice;
    }

    public function inscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    public function getTotalInscriptionAttribute() {
        $totalPrice = 0;

        foreach ($this->inscriptions as $orderItem) {
            $totalPrice = bcadd($totalPrice, $orderItem->price, 2);
        }

        return $totalPrice;
    }


    /**
     * Get the payment's name.
     *
     * @param  string  $value
     * @return string
     */
    public function getNameAttribute($value)
    {
        return ucwords(strtolower($value));
    }



}
