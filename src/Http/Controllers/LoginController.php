<?php

namespace Kankosal\User\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('admin_user::auth.login');
    }

    public function postLogin(Request $request)
    {
        if (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {

            // Authentication passed...
            return redirect('/');
        }
        return back()->with(['error' => __('Incorrect email or password.')]);
    }
}
