<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Auth\User;
use App\PaymentMethod;
use App\Tag;
use Carbon;

class Payment extends Model
{

    use SoftDeletes; 

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'price', 'comment', 'start_date', 'finish_date', 'payment_method_id', 'ticket_text', 'box'
    ];


    public function generated_by()
    {
        return $this->belongsTo(User::class, 'audi_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function payment_method()
    {
        return $this->belongsTo(PaymentMethod::class, 'payment_method_id');
    }

    public function setStartDateAttribute($value): void
    {
      $this->attributes['start_date'] =
        Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d');
    }


    // public function setFinishDateAttribute($value): void
    // {
    //   $this->attributes['finish_date'] =
    //     Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d');
    // }


    /**
     * Get the payment's start_date.
     *
     * @param  string  $value
     * @return string
     */
    public function getStartDateAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }


    /**
     * Get the payment's finish_date.
     *
     * @param  string  $value
     * @return string
     */
    public function getFinishDateAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }


    /**
     * Get the payment's created_at.
     *
     * @param  string  $value
     * @return string
     */
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y h:i:s a');
    }

}
