<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Cart;
use App\Sale;

class CartSale extends Model
{

	protected $fillable = [
        'sale_id', 'cart_id',
    ];

    public function sale(){
    	return $this->belongsTo(Sale::class);
    }


}
