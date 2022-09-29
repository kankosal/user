<?php

namespace Kankosal\User\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MyProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getMyProfile()
    {
        return view('admin_user::users.my_profile');
    }

    public function postMyProfile(Request $request)
    {
        $validator = validator()->make($request->all(),[
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.auth()->id()
        ]);
        if ($validator->fails()){
            return back()->with(['error' => $validator->errors()->first()])->withInput();
        }

        $row = auth()->user();
        $row->name = $request->name;
        $row->email = $request->email;
        $row->save();
        
        return back()->with(['success' => __('Updated Successfully!')]);
    }

    public function getChangePassword()
    {
        return view('admin_user::users.change_password');
    }

    public function postChangePassword(Request $request)
    {
        $validator = validator()->make($request->all(),[
            'current_password'=>'required',
            'password'=> 'required|min:6|max:32',
            'password_confirmation' => 'required|same:password|min:6|max:32',
        ]);
        if ($validator->fails()){
            return back()->with(['error' => $validator->errors()->first()])->withInput();
        }

        $row = auth()->user();
        if (Hash::check($request->current_password, $row->password)) {
            $row->password = bcrypt($request->password);
            $row->save();
            return back()->with(['success' => __('Saved Successfully!')]);
        }
        return back()->with(['error'=> __('Incorrect Current Password!')]);
    }

    public function logout()
    {
        auth()->logout();
        return redirect('admin');
    }
}
