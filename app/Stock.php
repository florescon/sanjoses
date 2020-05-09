<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Color;
use App\Size;
use Carbon;

class Stock extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id', 'color_id', 'size_id', 'stock', 'price'
    ];


    public function color()
    {
        return $this->hasOne(Color::class, 'id', 'color_id');
    }

    public function size()
    {
        return $this->hasOne(Size::class, 'id', 'size_id');
    }


}
