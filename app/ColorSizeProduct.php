<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Sale;
use App\Product;
use App\Color;
use App\Size;

class ColorSizeProduct extends Model
{

    use SoftDeletes; 

    protected $table = 'color_size_product';

	protected $fillable = [
        'product_id', 'color_id', 'size_id', 'stock', 'price'
    ];

    public function product_detail()
    {
        return $this->belongsTo(Product::class, 'product_id')->withTrashed();
    }


    public function product_detail_color()
    {
        return $this->belongsTo(Color::class, 'color_id')->withTrashed();
    }


    public function product_detail_size()
    {
        return $this->belongsTo(Size::class, 'size_id')->withTrashed();
    }


    public function sale(){
    	return $this->belongsTo(Sale::class);
    }

    public function product()
    {
        return $this->belongsToMany(Product::class);
    }


    /**
     * @return string
     */
    public function getSizeNameAttribute()
    {
        return $this->size_id ? '| '.$this->product_detail_size->name : '';
    }

    /**
     * @return string
     */
    public function getColorNameAttribute()
    {
        return $this->color_id ? '| '.$this->product_detail_color->name : '';
    }

    /**
     * @return string
     */
    public function getFullNameAttribute()
    {
        return '<strong>'.$this->part_number.'</strong> '.$this->name.' '.$this->size_name.' '.$this->color_name;
    }



}
