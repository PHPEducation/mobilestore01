<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use App\Http\Requests\UserFormRequest;

class UserController extends Controller
{
    public function index ()
    {
        $users = User::with('role')->paginate(config('custom.pagination.users_table'));
        $roles = Role::all();

        return view('admin.users.index', compact('users', 'roles'));
    }

    public function publish (Request $request)
    {
        try {
            $id = $request->id;
            $status = $request->status;
            $user = User::findOrFail($id);
            if($status == 1) {
                $user->status = 0;
                $user->save();
            } else if ($status == 0) {
                $user->status = 1;
                $user->save();
            }
            
            return $user;
        } catch (Exception $e) {
            abort('404');
        }
    }

    public function usersOfRoles ($id)
    {
        $roles = Role::all();
        $role_of_users = Role::findOrFail($id);
        $users = User::where('role_id', $role_of_users->id)->paginate(config('custom.pagination.users_table'));

        return view('admin.users.index', compact('users', 'role_of_users', 'roles'));
    }

    public function create ()
    {
        $roles = Role::all();

        return view('admin.users.create', compact('roles'));
    }

    public function store (UserFormRequest $request)
    {
        User::storeUser($request);

        return redirect()->back()->with('status', __('user.created') );
    }
}
