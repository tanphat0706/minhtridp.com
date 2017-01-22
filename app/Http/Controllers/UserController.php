<?php
/**
 * @author  Phat Le
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserGroup;
use Response;
use Datatables;
use Session;
use Auth;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserProfileRequest;
use App\Services\UserServices;

/**
 * User controller to handle the management users
 *
 * @author Phatle
 *         2016/07/06
 *
 */
class UserController extends Controller
{

    public function __construct(UserServices $userServices, User $user)
    {
        $this->userServices = $userServices;
        $this->user = $user;
    }

    /**
     * Display a listing of the users.
     *
     * @return Response
     */
    public function index()
    {
        if (! Auth::user()->hasRole('viewUsersList')) {
            abort('403');
        }
        return view('user.list');
    }

    /**
     * get list users to datatables
     *
     * @param
     *            Request
     * @return Response
     */
    public function getUsersJson()
    {
        if (! Auth::user()->hasRole('viewUsersList')) {
            abort('403');
        }
        $user = User::select('users.id as userId', 'users.name as userName', 'users.email', 'users_groups.name as groupName', 'is_customer', 'status', 'users.created_at')
            ->leftJoin('users_groups', 'users.group_id', '=', 'users_groups.id');
        $buttons = array();
        return Datatables::of($user)
            ->editColumn('is_customer', function ($row) {
                return $row->isCustomer() ? '<i class="fa fa-check text-success"></i>' : '';
            })
            ->editColumn('status', function ($row) {
                return '<span class="flat label status-label label-' . $row->getStatusColor() . '">' . $row->getStatus() . '</span>';
            })
            ->addColumn('action', function ($user) {
                $buttons = array();
                if (Auth::user()->hasRole('editUser')) {
                    $buttons[] = [
                        'href' => 'user/edit/' . e($user->userId),
                        'icon' => 'edit',
                        'type' => 'primary',
                        'label' => trans('system.edit')
                    ];
                }
                if (Auth::user()->hasRole('deleteUser')) {
                    $formId = 'delete-user-' . e($user->userId);
                    $buttons[] = [
                        'href' => '#' . e($user->userId),
                        'icon' => 'remove',
                        'type' => 'danger',
                        'delete' => e($user->userId),
                        'id' => $formId,
                        'route' => 'delete-user',
                        'label' => trans('system.del'),
                        'htmlOptions' => [
                            "onclick" => "confirmDelete('$formId')"
                        ]
                    ];
                }

                $action = view('partial.action', compact('buttons'))->render();
                return (string)$action;
            })
            ->make(true);
    }

    /**
     * Show the form for creating a new user.
     *
     * @return Response
     */
    public function create()
    {
        if (! Auth::user()->hasRole('addUser')) {
            abort('403');
        }
        $listStatus = $this->userServices->createListStatus();
        $listTypeUser = $this->user->userType();
        $userGroup = array_add(UserGroup::all()->lists('name', 'id'), '', trans('user.choose_group'));
        return view('user.create', compact('listStatus', 'listTypeUser','userGroup'));
    }

    /**
     * Store a user created.
     *
     * @return Response
     */
    public function store(UserRequest $request)
    {
        if (! Auth::user()->hasRole('addUser')) {
            abort('403');
        }
        $result = $this->userServices->storeUser($request);
        if ($result) {
            Session::flash('message', trans('user.created'));
            return redirect()->route('users-list');
        } else {
            return redirect()->back()->withErrors(trans('system.can_not_save'));
        }
    }

    /**
     * Show the form for editing the user
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        if (! Auth::user()->hasRole('editUser')) {
            abort('403');
        }
        $user = User::find($id);

        $listStatus = $this->userServices->createListStatus();
        $listTypeUser = $this->user->userType();
        $userGroup = UserGroup::all()->lists('name', 'id');

        return view('user.edit', compact('user', 'listStatus','listTypeUser','userGroup'));
    }

    /**
     * Update user.
     *
     * @param int $id
     * @return Response
     */
    public function update($id, UserRequest $request)
    {
        if (! Auth::user()->hasRole('editUser')) {
            abort('403');
        }
        if (($request->status == User::DISABLE) && (Auth::id() == config('common.SUPER_ADMIN_ID'))) {
            return redirect()->back()->withErrors(trans('user.not_disable_supper_admin'));
        }
        $result = $this->userServices->updateUser($id, $request);

        if ($result) {
            Session::flash('message', trans('user.updated'));
            return redirect()->route('users-list');
        } else {
            return redirect()->back()->withErrors(trans('system.can_not_save'));
        }
    }

    /**
     * Delete user
     *
     * @param unknown $id
     */
    public function destroy($id)
    {
        if (! Auth::user()->hasRole('deleteUser')) {
            abort('403');
        }

        if (Auth::id() != $id) {
            $result = $this->userServices->destroyUser($id);
        } else {
            $result = null;
            if ($id == config('common.SUPER_ADMIN_ID')) {
                Session::flash('error', trans('user.not_delete_supper_admin'));
            } else {
                Session::flash('error', trans('user.not_delete_yourself'));
            }
        }

        if ($result) {
            Session::flash('message', trans('user.deleted'));
            return redirect()->route('users-list');
        }
    }

    public function edit_profile(){
        $user = User::find(Auth::user()->id);
        return view('auth.update',compact('user'));
    }
    public function update_profile(Request $request){
        $update = $request->all();
        $user = User::find(Auth::user()->id);
        if($update['password'] != '') {
            $user->password = $update['password'];
        }
        $user->name = $update['name'];
        $user->email = $update['email'];
        $user->phone = $update['phone'];
        $user->save();
        return redirect()->route('my-page');
    }
}
