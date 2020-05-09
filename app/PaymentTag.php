<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Payment;
use App\Tag;

class PaymentTag extends Model
{

	protected $fillable = [
        'payment_id', 'tag_id',
    ];

    public function payment(){
    	return $this->belongsTo(Payment::class);
    }


    public function tag()
    {
        return $this->belongsToMany(Tag::class);
    }


}
