<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\Auth\User;
use App\Material;

class MaterialHistory extends Model
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'material_id', 'old_quantity', 'quantity', 'type', 'audi_id'
    ];

    public function material()
    {
        return $this->belongsTo(Material::class, 'material_id');
    }

    public function generated_by()
    {
        return $this->belongsTo(User::class, 'audi_id');
    }


}
