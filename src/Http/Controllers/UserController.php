<?php

namespace Kankosal\User\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    function __construct()
    {
    }

    public function index(Request $request)
    {
        $limit = $request->get('limit', 10);

        $rows = User::paginate($limit)->withQueryString();
        return view('admin_user::users.index', compact('rows'));
    }

    public function create()
    {
        $users = []; //User::all();

        return view('admin_user::users.form', compact('users'));
    }

    public function edit($id)
    {
    }

    public function show($id)
    {
    }

    public function store(Request $request)
    {
    }

    public function update(Request $request)
    {
    }

    public function destroy($id)
    {
    }
}
