<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Material;
use App\Unit;
use App\Color;
use App\Size;

class SizeBom extends Model
{

    protected $table = 'size_boms';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'product_id', 'material_id', 'size_id', 'quantity'
    ];


    public function material()
    {
        return $this->belongsTo(Material::class, 'material_id', 'id');
    }


    public function unit()
    {
        return $this->hasOneThrough(Unit::class, Material::class, 'unit_id', 'id');
    }

    public function color()
    {
        return $this->hasOneThrough(Color::class, Material::class, 'color_id', 'id');
    }

    public function size()
    {
        return $this->hasOneThrough(Size::class, Material::class, 'size_id', 'id');
    }

    public function getTotalPriceAttribute()
    {
        return $this->quantity * $this->material->price;
    }

    public function getUnitNameAttribute()
    {
        return $this->material->unit->name;
    }

    public function getColorNameAttribute()
    {
        return $this->material->color->name;
    }

    public function getSizeNameAttribute()
    {
        return $this->material->size->name;
    }

    public function getTotalBomAttribute()
    {
        return $this->material->sum(function($material) {
          return $material->price;
        });
    }

    protected $appends = ['total_price', 'unit_name', 'color_name', 'size_name'];


}
