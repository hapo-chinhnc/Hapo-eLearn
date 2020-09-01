<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateRequest;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserManagementController extends Controller
{
    public function index()
    {
        $users = User::get();
        return view('admin.user.user_management', compact('users'));
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user-management.index');
    }

    public function show($id)
    {
        //
    }

    public function create()
    {
        return view('admin.user.create_user');
    }

    public function store(UserRequest $request)
    {
        $user = new User();

        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'avatar' => 'user-img.jpg',
            'phone' => $request->input('phone'),
        ];
        $user::create($data);
        return redirect()->route('user-management.create')->with('success', trans('messages.add'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.edit_user', compact('user'));
    }

    public function update(UpdateRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $data = [
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'password' => $request->input('password'),
            'role' => $request->input('role')
        ];
        $user->update($data);
        return redirect()->route('user-management.edit', $id)->with('succses', trans('messages.update'));
    }
}
