<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SmallBox extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'amount', 'comment'
    ];

    /**
     * Get the smallbox's name.
     *
     * @param  string  $value
     * @return string
     */
    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

    /**
     * Get the smallbox's comment.
     *
     * @param  string  $value
     * @return string
     */
    public function getCommentAttribute($value)
    {
        return ucfirst($value);
    }


}
