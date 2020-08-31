<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
}
