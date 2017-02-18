<?php
namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Auth;
use Session;

class AuthController extends Controller
{
    /*
     * |--------------------------------------------------------------------------
     * | Registration & Login Controller
     * |--------------------------------------------------------------------------
     * |
     * | This controller handles the registration of new users, as well as the
     * | authentication of existing users. By default, this controller uses
     * | a simple trait to add these behaviors. Why don't you explore it?
     * |
     */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $loginPath = '/login';

    protected $redirectTo = '/admin';

    protected $redirectAfterLogout = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', [
            'except' => 'logout'
        ]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'phone' => 'required|numeric|digits_between:10,11',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'group_id' => 2,
            'is_customer' => 1,
            'status' => 1,
            'phone' => $data['phone'],
            'password' => bcrypt($data['password'])
        ]);
    }

    /**
     *
     * @param Request $request
     * @author Phat Le
     */
    protected function login(Request $request)
    {
        if (Auth::attempt([
            'email' => $request->l_email,
            'password' => $request->l_password,
            'status' => 1
        ])) {
            Session::set('authUserId', auth()->user()->id);
            if (auth()->user()->isCustomer()) {
                $back_link = \Session::get('back_link');
                if(isset($back_link)){
                    return redirect()->route($back_link);
                }else{
                    return redirect()->route('frontend');
                }

            }
            return redirect()->intended($this->redirectPath());
        }

        return redirect()->back()->withErrors([
            'l_email' => trans('auth.failed_login_message')
        ]);
    }


    protected function handleUserWasAuthenticated(Request $request, $throttles)
    {
        if ($throttles) {
            $this->clearLoginAttempts($request);
        }

        if (method_exists($this, 'authenticated')) {
            return $this->authenticated($request, Auth::guard($this->getGuard())->user());
        }
        if (auth()->user()->group_id == 1) {
            return redirect()->intended($this->redirectPath());
        }

        return redirect()->route('frontend');
    }

    public function postRegister(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails())
        {
            $this->throwValidationException(
                $request, $validator
            );
        }
        $user = $this->create($request->all());
//        if ($request->get('active')) {
//            $this->auth->login($user);
//        }
        Auth::guard($this->getGuard())->login($user);
        $back_link = \Session::get('back_link');
        if(isset($back_link)){
            return redirect()->route($back_link);
        }else{
            return redirect()->route('frontend');
        }
    }
}
