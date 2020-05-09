<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\Auth\User;
use App\Blood;
use App\School;

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
        'phone', 'age', 'address', 'grade'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function blood()
    {
        return $this->belongsTo(Blood::class);
    }

    public function school()
    {
        return $this->belongsTo(School::class);
    }



}
