<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Unit;
use App\Color;
use App\Size;

class Material extends Model
{

    use SoftDeletes; 

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'part_number', 'name', 'description', 'acquisition_cost', 'price', 'stock', 'unit_id', 'color_id', 'size_id'
    ];

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id')->withTrashed();
    }

    public function color()
    {
        return $this->belongsTo(Color::class, 'color_id')->withTrashed();
    }

    public function size()
    {
        return $this->belongsTo(Size::class, 'size_id')->withTrashed();
    }


    /**
     * @return string
     */
    public function getSizeNameAttribute()
    {
        return $this->size_id ? '| '.$this->size->name : '';
    }

    /**
     * @return string
     */
    public function getUnitNameAttribute()
    {
        return $this->unit_id ? '<sup>'.$this->unit->name.'</sup>' : '';
    }

    /**
     * @return string
     */
    public function getColorNameAttribute()
    {
        return $this->color_id ? '| '.$this->color->name : '';
    }

    /**
     * @return string
     */
    public function getFullNameAttribute()
    {
        return $this->name.' '.$this->unit_name.' '.$this->size_name.' '.$this->color_name;
    }

}
