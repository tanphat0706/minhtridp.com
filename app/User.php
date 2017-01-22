<?php
namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    const IS_CUSTOMER = 1;
    const IS_NOT_CUSTOMER = 0;
    const ENABLE = 1;
    const DISABLE = 0;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'is_customer',
        'group_id',
        'status'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token'
    ];
    public function userGroup()
    {
        return $this->belongsTo('App\UserGroup', 'group_id', 'id');
    }
    // Check current user has a role
    public function hasRole($role)
    {
        $groupRole = false;
        $user = User::find($this->id);
        if ($user) {
            $userRole = UserRole::where('code', $role)->first();
            if ($userRole) {
                $groupRole = GroupRole::where('group_id', $user->group_id)->where('role_id', $userRole->id)->first();
            }
        }

        return $groupRole;
    }
    public function isCustomer()
    {
        return $this->is_customer == static::IS_CUSTOMER;
    }

    public function userType()
    {
        $userType = array(
            User::IS_CUSTOMER => trans('system.customer'),
            User::IS_NOT_CUSTOMER => trans('system.admin'),
        );
        return $userType;
    }
    public function getStatus()
    {
        return $this->status == static::ENABLE ? trans('system.enable') : trans('system.disable');
    }

    public function getStatusColor()
    {
        return $this->status == static::ENABLE ? 'success' : 'default';
    }

    public function favorites()
    {
        return $this->hasMany('\App\Favorite', 'user_id', 'id');
    }
}
