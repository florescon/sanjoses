<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\Auth\User;

class Customer extends Model
{
    
    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $guarded = ['user_id', '_token'];


    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'phone', 'rfc', 'address'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }



}
