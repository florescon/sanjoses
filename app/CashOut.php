<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Sale;
use App\Income;
use App\Expense;
use App\Subscription;
use App\Payment;
use Carbon;


class CashOut extends Model
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'initial', 'final'
    ];

    public function sales()
    {
        return $this->hasMany(Sale::class, 'box')->withTrashed();
    }

    public function incomes()
    {
        return $this->hasMany(Income::class, 'box')->withTrashed();
    }

    public function expenses()
    {
        return $this->hasMany(Expense::class, 'box')->withTrashed();
    }

    public function inscriptions()
    {
        return $this->hasMany(Subscription::class, 'box')->withTrashed();
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'box')->withTrashed();
    }


    /**
     * Get the cashout created_at.
     *
     * @param  string  $value
     * @return string
     */
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y h:i:s a');
    }

    /**
     * Get the cashout updated_at.
     *
     * @param  string  $value
     * @return string
     */
    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y h:i:s a');
    }


}
