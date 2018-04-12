<?php
/**
 * Created by PhpStorm.
 * User: menq
 * Date: 12.04.2018
 * Time: 21:25
 */

namespace BtyBugHook\Api\Http\Controllers;


use App\Http\Controllers\Controller;
use Btybug\User\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Response;
use Notify;
use Redirect;
use Validator;


class ApiLoginController extends Controller
{
    use AuthenticatesUsers;
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/bty-api/authenticated';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function test()
    {
        $user = User::find(1);
        $token = $user->createToken('Token Name');
        dd(time($token->token->expires_at));
    }

    public function showLogin(Request $request)
    {
        return view('bty_api::oauth.login');
    }




    public function username()
    {
        return 'usernameOremail';
    }

    public function authenticate()
    {
        if (Auth::attempt(['username' => $username, 'password' => $password])) {
            // Authentication passed...
            return redirect()->intended('dashboard');
        }
    }

    public function authenticatedRedirect()
    {
        dd(\Auth::user());
    }

    public function login(Request $request)
    {

        $field = filter_var(
            $request->input('usernameOremail'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $request->merge([$field => $request->input('usernameOremail')]);

        $this->validateLogin($request);
        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }
        if (\Auth::attempt(array_add($request->only($field, 'password'), 'status', 'active'), $request->has('remember'))) {
            return $this->sendLoginResponse($request);
        }
        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }
}