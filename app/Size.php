<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\SizeBom;

class Size extends Model
{

    use SoftDeletes; 

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];


    public function countAllBySize($value)
    {
        return $this->hasMany(SizeBom::class)->whereSizeId($this->id)->whereProductId($value)->count();
    }

    //Size::class
    public function material_bysize()
    {
        return $this->hasMany(SizeBom::class)->orderBy('updated_at', 'desc');
    }


    public function getTotalStock()
    {
        return $this->material_bysize->count() ? $this->material_bysize->count() : '';
    }


}
