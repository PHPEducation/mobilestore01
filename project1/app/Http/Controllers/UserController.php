<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserFormRequest;
use App\Http\Requests\RegisterFormRequest;
use App\User;
use App\Role;
use Auth;

class UserController extends Controller
{
    public function show ($id)
    {
        try {
            $user = User::findOrFail($id);

            return view('users.show', compact('user'));
        } catch (Exception $e) {
            abort('404');
        }
    }

    public function update (UserFormRequest $request, $id)
    {
        $user = Auth::user();
        $this->authorize('update', $user);
        $user = User::updateUser($request, $id);
        if(!empty($request->get('password'))) {
            $request->validate([
                'password' => 'required|min:3',
                'password_confirm' => 'required|same:password|min:3'
            ]);
            User::updatePassword($request, $id);
        }

        return redirect()->back()->with('status', __('user.updated'));
    }

    public function formRegister ()
    {
        $roleUser = Role::whereName('User')->firstOrFail();

        return view('users.register', compact('roleUser'));
    }

    public function register (RegisterFormRequest $request)
    {
        User::registerUser($request);

        return redirect()->route('home-user');
    }

    public function logout () {
        Auth::logout();

        return redirect('login');
    }
}
