<?php

namespace App\Http\Controllers\Joystick;

use Hash;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use App\Role;

class UserController extends Controller
{
	public function index()
	{
		$users = User::orderBy('created_at')->paginate(50);

		return view('joystick-admin.users.index', compact('users'));
	}

	public function edit($id)
	{
		$user = User::findOrFail($id);
		$roles = Role::all();

		return view('joystick-admin.users.edit', compact('user', 'roles'));
	}

	public function update(Request $request, $id)
	{
		$this->validate($request, [
			'name' => 'required|max:60',
			'email' => 'required',
		]);

		$user = User::findOrFail($id);

		$user->name = $request->name;
		$user->email = $request->email;
		$user->save();

		$user->roles()->sync($request->roles_id);

		return redirect('/admin/users')->with('status', 'Запись обновлена!');
	}

	public function passwordEdit($id)
	{
		$user = User::findOrFail($id);

		return view('joystick-admin.users.password', compact('user'));
	}

	public function passwordUpdate(Request $request, $id)
	{
		$this->validate($request, [
			'email' => 'required|email|max:255',
            'password' => 'required|confirmed|min:6|max:255',
			// 'password-confirm' => 'required'
		]);

		$user = User::findOrFail($id);

		if ($user->email != $request->email) {
        	return redirect()->back()->with('status', 'Email не совпадает!');
		}

        $user->password = Hash::make($request->password);
        $user->setRememberToken(Str::random(60));
        $user->save();

		return redirect('/admin/users')->with('status', 'Запись обновлена!');
	}
}