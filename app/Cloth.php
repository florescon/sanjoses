<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon;

class Cloth extends Model
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


	// public function getCreatedAtAttribute()
	// {
	//    return (new Carbon($this->attributes['created_at']))->format('d-m-Y H:i:s');
	// }

	// public function getUpdatedAtAttribute()
	// {
	//    return (new Carbon($this->attributes['updated_at']))->format('d-m H:i:s');
	// }

}
