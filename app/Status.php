<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Status extends Model
{

    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'name', 'description', 'level', 'percentage', 'to_add_users'
    ];


    /**
     * @return string
     */
    public function getActiveLabelAttribute()
    {
        if ($this->to_add_users) {
            return '<a href="'.route('admin.order.addtostaff', [$this->id, $this]).'"> <span class="badge badge-success">'.__('labels.general.assign_staff').'</span></a>';
        }

        return '';
    }

    /**
     * @return string
     */
    public function getLevelLabelBarAttribute()
    {

            switch ($this->level) {
                case -1:
                    return 'bg-warning';
                case 10:
                    return 'bg-success';
                default:
                    return 'bg-info';
            }

        return '';

    }


}
