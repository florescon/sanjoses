<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\ProductDetail;
use App\ColorSizeProduct;
use App\Color;
use App\Size;
use App\ClothBoms;
use App\SizeClothBoms;
use Carbon;

class Product extends Model
{

    use SoftDeletes; 

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'code', 'quantity', 'price', 'type', 'status'
    ];

    public function detail()
    {
        return $this->hasMany(ProductDetail::class)->orderBy('updated_at', 'desc');
    }

    public function product_stock()
    {
        return $this->hasMany(ColorSizeProduct::class)->orderBy('updated_at', 'desc');
    }

    public function color_size_product()
    {
        return $this->hasMany(ColorSizeProduct::class)->orderBy('updated_at', 'desc');
    }

    /**
     * Get the product's name.
     *
     * @param  string  $value
     * @return string
     */
    public function getNameAttribute($value)
    {
        return ucwords(strtolower($value));
    }

    /**
     * Get the product's created_at.
     *
     * @param  string  $value
     * @return string
     */
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y h:i:s a');
    }

    /**
     * Get the product's created_at.
     *
     * @param  string  $value
     * @return string
     */
    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y h:i:s a');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function colors()
    {
        return $this->belongsToMany(Color::class, 'product_colors', 'product_id', 'color_id')->withTrashed()->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function sizes()
    {
        return $this->belongsToMany(Size::class, 'product_sizes', 'product_id', 'size_id')->withTrashed()->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function colores()
    {
        return $this->belongsToMany(Color::class, 'color_size_product', 'product_id', 'color_id')->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tallas()
    {
        return $this->belongsToMany(Size::class, 'color_size_product', 'product_id', 'size_id')->withTimestamps();
    }


    public function cloth_material()
    {
        return $this->belongsTo(ClothBoms::class, 'id', 'product_id');
    }


    public function size_cloth_material()
    {
        return $this->belongsTo(SizeClothBoms::class, 'id', 'product_id');
    }

    public function getTotalStock()
    {
        return $this->color_size_product->sum(function($color_size_product) {
          return $color_size_product->stock;
        });
    }
}
