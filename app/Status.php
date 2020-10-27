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
                case 20:
                    return 'bg-success';
                default:
                    return 'bg-info';
            }

        return '';

    }


    /**
     * @return string
     */
    public function getAddUsersAttribute()
    {


        if ($this->to_add_users == 0) {
            if ($this->id != 1 && $this->id != 2 && $this->id != 3 ){ 
                return '<a href="'.route('admin.setting.status.statusaddusers', $this).'" data-toggle="tooltip" data-placement="top" title="'.__('buttons.backend.access.status.confirm').'" data-trans-button-cancel="'.__('buttons.general.cancel').'"  data-trans-button-confirm="'.__('buttons.general.continue').'" data-trans-title="'.__('strings.backend.general.are_you_sure').'" name="confirm_item"><span class="badge badge-danger" style="cursor:pointer">'.__('labels.general.no').'</span></a>';
            }

            return '<span class="badge badge-danger">'.__('labels.general.no').'</span>';

        }

        return '<a href="'.route('admin.setting.status.statusaddusers', $this).'" data-toggle="tooltip" data-placement="top" title="'.__('buttons.backend.access.status.deactivate').'" data-trans-button-cancel="'.__('buttons.general.cancel').'"  data-trans-button-confirm="'.__('buttons.general.continue').'" data-trans-title="'.__('strings.backend.general.are_you_sure').'" name="confirm_item"><span class="badge badge-success" style="cursor:pointer">'.__('labels.general.yes').'</span></a>';
    }


}
