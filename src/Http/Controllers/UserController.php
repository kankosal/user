<?php

namespace Kankosal\User\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\User;

class UserController extends Controller
{
    function __construct()
    {
        // auth()->loginUsingId(1);
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $limit = $request->get('limit', 10);

        $rows = User::paginate($limit)->withQueryString();
        return view('admin_user::users.index', compact('rows'));
    }

    public function create()
    {
        return view('admin_user::users.form');
    }

    public function edit($id)
    {
        $row = User::findOrFail((int)$id);
        return view('admin_user::users.form', compact('row'));
    }

    public function show($id)
    {
        abort(404);
    }

    public function store(Request $request)
    {
        $validator = validator()->make($request->all(),[
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password'=> 'required|min:6|max:32',
            'password_confirmation' => 'required|same:password|min:6|max:32',
        ]);
        if ($validator->fails()){
            return back()->with(['error' => $validator->errors()->first()])->withInput();
        }

        $row = new User();
        $row->name = $request->name;
        $row->email = $request->email;
        $row->password = bcrypt($request->password);
        $row->save();

        // Adding roles to a user
        $roles = $request->get('roles', []);
        $this->userSyncRoles($roles, $row);

        return redirect(route('users.index'))->with(['success' => __('Saved Successfully!')]);
    }

    public function update(Request $request, $id)
    {
        $row = User::findOrFail((int)$id);

        $validator = validator()->make($request->all(),[
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            // 'password'=> 'required|min:6|max:32',
            // 'password_confirmation' => 'required|same:password|min:6|max:32',
        ]);
        if ($validator->fails()){
            return back()->with(['error' => $validator->errors()->first()])->withInput();
        }

        if($id == 1){
            return back()->with(['error' => __('Not allow to modify super admin information.')])->withInput();
        }

        $row->name = $request->name;
        $row->email = $request->email;
        $row->save();

        // Adding roles to a user
        $roles = $request->get('roles', []);
        $this->userSyncRoles($roles, $row);
        
        return redirect(route('users.index'))->with(['success' => __('Updated Successfully!')]);
    }

    public function destroy($id)
    {
        if($id == 1){
            return back()->with(['error' => __('Not allow to modify super admin information.')]);
        }

        $row = User::findOrFail((int)$id);

        $row->delete();
        return redirect(route('users.index'))->with(['success' => __('Deleted Successfully!')]);
    }

    private function userSyncRoles($roles, $user){

        if(!empty($roles)){
            $roleIds = [];
            foreach ($roles as $role) {
                $roleIds[] = $role['id']??0;
            }
            $roleObjs = Role::find($roleIds);
            $user->syncRoles($roleObjs);
        }
    }
}
