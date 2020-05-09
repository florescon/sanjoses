<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\Auth\User;

class ProductDetail extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id', 'quantity', 'audi_id'
    ];


    public function generated_by()
    {
        return $this->belongsTo(User::class, 'audi_id');
    }

}
