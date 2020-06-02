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

    public function size_bymaterial()
    {
        return $this->hasMany(SizeBom::class)->orderBy('updated_at', 'desc');
    }


    public function getTotalStock()
    {
        return $this->size_bymaterial->count() ? $this->size_bymaterial->count() : '';
    }


}
