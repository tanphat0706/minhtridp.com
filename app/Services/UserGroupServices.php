<?php
namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\UserGroup;
use App\UserRole;
use App\GroupRole;
use App\Http\Requests\UserGroupRequest;
use Hash;

/**
 * Usergroup Services to handle the management users
 *
 * @author Minhnc
 *         2016/03/18
 *
 */
class UserGroupServices
{

    /**
     * Store new user group
     *
     * @param UserGroupRequest $request
     * @return boolean
     */
    public function storeUserGroup(UserGroupRequest $request)
    {
        $roles = $request->role;

        try {
            DB::beginTransaction();

            // Insert into table groups
            $groupData = array(
                'name' => trim($request->name),
                'note' => trim($request->note),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            );
            $groupID = UserGroup::insertGetId($groupData);

            if ($groupID) {
                foreach ($roles as $role) {
                    $userRole = UserRole::where('code', $role)->first();
                    $groupRole = new GroupRole();
                    $groupRole->group_id = $groupID;
                    $groupRole->role_id = $userRole->id;
                    $result = $groupRole->save();
                }
            } else {
                $result = false;
            }
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            $result = false;
        }
        return $result;
    }

    /**
     * update user group
     *
     * @param UserGroupRequest $request
     * @return boolean
     */
    public function updateUserGroup($groupID, UserGroupRequest $request)
    {
        $roles = $request->role;

        try {
            DB::beginTransaction();

            // update into table groups
            $userGroup = new UserGroup();
            $result = $userGroup->where('id', '=', $groupID)->update([
                'name' => $request->name,
                'note' => $request->note
            ]);

            // Delete old role in table groups_roles
            $delResult = GroupRole::where('group_id', $groupID)->delete();

            if ($delResult) {
                $roles = $request->role;
                foreach ($roles as $role) {
                    $userRole = UserRole::where('code', $role)->first();
                    $groupRole = new GroupRole();
                    $groupRole->group_id = $groupID;
                    $groupRole->role_id = $userRole->id;
                    $result = $groupRole->save();
                }
            }
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            $result = false;
        }
        return $result;
    }

    public function destroyUserGroup($id)
    {
        try {
            DB::beginTransaction();

            $userGroup = UserGroup::find($id);
            // Delete old role in table role_group
            $delRoleResult = GroupRole::where('group_id', $id)->delete();

            $result = UserGroup::where('id', $id)->delete();

            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            $result = false;
        }
        return $result;
    }

    /**
     * Get list of role groups
     */
    public function getRoleGroup()
    {
        return UserRole::distinct()->select('role_group')
            ->groupBy('role_group')
            ->get();
    }

    /**
     * Get Roles list by role group
     *
     * @param
     *            $roleGroup
     */
    public function getRoles($roleGroup)
    {
        return UserRole::where('role_group', $roleGroup)->get();
    }

    /**
     * Check a user group has a role
     *
     * @param unknown $userGroup
     * @param unknown $codeRole
     */
    public function groupHasRole($userGroup, $codeRole)
    {
        $userRole = UserRole::where('code', $codeRole)->first();
        if ($userRole) {
            $groupRole = GroupRole::where('group_id', $userGroup)->where('role_id', $userRole->id)->first();
        }
        if ($groupRole) {
            return true;
        } else {
            return false;
        }
    }
}