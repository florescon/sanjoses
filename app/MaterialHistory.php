<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\Auth\User;
use App\Material;
use Carbon;

class MaterialHistory extends Model
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'material_id', 'old_quantity', 'quantity', 'type', 'price_actual', 'price_entered', 'date_entered', 'audi_id'
    ];

    public function material()
    {
        return $this->belongsTo(Material::class, 'material_id')->withTrashed();
    }

    public function generated_by()
    {
        return $this->belongsTo(User::class, 'audi_id');
    }




    /**
     * Get the inscription's start_date.
     *
     * @param  string  $value
     * @return string
     */
    public function getDateEnteredAttribute($value)
    {
        return !is_null($value) ? Carbon::parse($value)->format('d-m-Y') : '<span class="badge badge-pill badge-secondary"> <em>No asignada</em></span>';
    }

}
