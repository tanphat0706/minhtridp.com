<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model
{

    protected $table = 'users_groups';

    public function user()
    {
        return $this->hasMany('App\User');
    }
    public function getGroupName($groupId)
    {
        foreach ($this->get() as $group)
        {
            if ($group->id == $groupId)
            {
                return $group->name;
            }
        }
        return null;
    }
}
