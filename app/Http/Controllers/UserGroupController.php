<?php
namespace App\Http\Controllers;

use Request;
use App\UserGroup;
use Response;
use Datatables;
use Session;
use Auth;
use App\Http\Requests\UserGroupRequest;
use App\Services\UserGroupServices;

/**
 * UserGroup controller to handle the management users
 *
 * @author Minhnc
 *         2016/03/18
 *
 */
class UserGroupController extends Controller
{

    public function __construct(UserGroupServices $userGroupServices)
    {
        if (! Auth::user()->hasRole('viewUserGroupList')) {
            return redirect()->route('home')->withErrors(trans('system.no_permission'));
        }
        $this->userGroupServices = $userGroupServices;
    }

    /**
     * Display a listing of the user group.
     *
     * @return Response
     */
    public function index()
    {
        if (! Auth::user()->hasRole('viewUserGroupList')) {
            return redirect()->route('home')->withErrors(trans('system.no_permission'));
        }
        return view('usergroup.list');
    }

    /**
     * get list users group to datatables
     *
     * @param
     *            Request
     * @return Response
     */
    public function getUserGroupsJson()
    {

        $userGroup = UserGroup::select('id', 'name', 'note', 'created_at');
        return Datatables::of($userGroup)->addColumn('action', function ($userGroup) {
            $buttons = array();
            if (Auth::user()->hasRole('editUserGroup')) {
                $buttons[] = [
                    'href' => 'user-group/edit/' . e($userGroup->id),
                    'icon' => 'edit',
                    'type' => 'primary',
                    'label' => trans('system.edit')
                ];
            }
            if (Auth::user()->hasRole('deleteUserGroup')) {
                $buttons[] = [
                    'href' => '#' . e($userGroup->id),
                    'icon' => 'remove',
                    'type' => 'danger',
                    'label' => trans('system.del'),
                    'htmlOptions' => [
                        'data-method' => 'post',
                        'onclick' => 'confirmDelete(this)'
                    ]
                ];
            }

            $action = view('partial.action', compact('buttons'))->render();
            return (string) $action;
        })
            ->make(true);
    }

    /**
     * Show the form for creating a new user group.
     *
     * @return Response
     */
    public function create()
    {
        if (! Auth::user()->hasRole('addUserGroup')) {
            return redirect()->route('home')->withErrors(trans('system.no_permission'));
        }

        $roleGroups = $this->userGroupServices->getRoleGroup();

        return view('usergroup.create', compact('roleGroups'));
    }

    /**
     * Store user group to database
     *
     * @param UserGroupRequest $request
     */
    public function store(UserGroupRequest $request)
    {

        $result = $this->userGroupServices->storeUserGroup($request);

        if ($result) {
            Session::flash('message', trans('user_group.created'));
            return redirect()->route('user-group-list');
        } else {
            return redirect()->back()->withErrors(trans('system.can_not_save'));
        }
    }

    /**
     * Show the form for editing the user group.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        if (! Auth::user()->hasRole('editUserGroup')) {
            return redirect()->route('user-group-list')->withErrors(trans('system.no_permission'));
        }
        $roleGroups = $this->userGroupServices->getRoleGroup();
        $userGroup = UserGroup::find($id);
        return view('usergroup.edit', compact('userGroup', 'roleGroups'));
    }

    /**
     * Update user group to database
     *
     * @param UserGroupRequest $request
     */
    public function update($id, UserGroupRequest $request)
    {
        if (! Auth::user()->hasRole('editUserGroup')) {
            return redirect()->route('user-group-list')->withErrors(trans('system.no_permission'));
        }

        $result = $this->userGroupServices->updateUserGroup($id, $request);

        if ($result) {
            Session::flash('message', trans('user_group.updated'));
            return redirect()->route('user-group-list');
        } else {
            return redirect()->back()->withErrors(trans('system.can_not_save'));
        }
    }

    /**
     * Remove the user group from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        if (! Auth::user()->hasRole('deleteUserGroup')) {
            return redirect()->route('user-group-list')->withErrors(trans('system.no_permission'));
        }

        if ($id != config('common.ADMIN_GROUP_ID')) {
            $result = $this->userGroupServices->destroyUserGroup($id);
        } else {
            $result = null;
            Session::flash('error', trans('user.not_delete_admin_group'));
        }

        if ($result) {
            Session::flash('message', trans('user_group.deleted'));
        }

        $url = url('admin/user-group');
        echo json_encode([
            'url' => $url
        ]);

    }
}
