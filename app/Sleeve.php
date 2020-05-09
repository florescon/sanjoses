<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon;

class Sleeve extends Model
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

	// public function getCreatedAtAttribute($timestamp) {
	//     return Carbon\Carbon::parse($timestamp)->format('d-m-Y H:i:s');
	// }

}
