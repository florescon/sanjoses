<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\Auth\User;

class Note extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'content', 
    ];

    public function generated_by()
    {
      return $this->belongsTo(User::class, 'audi_id');
    }


    /**
     * Get the note's content.
     *
     * @param  string  $value
     * @return string
     */
    public function getContentAttribute($value)
    {
        return ucfirst($value);
    }

}
