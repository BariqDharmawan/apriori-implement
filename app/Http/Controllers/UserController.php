<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $admins = User::where('role', 'admin')->get();
        $users = User::where('role', 'user')->get();

        return view('user.index', ['admins' => $admins, 'users' => $users]);
    }

    public function update(Request $request, User $akun)
    {
        $akun->username = $request->username;
        $akun->nama = $request->nama;
        $akun->password = $request->password;
        $akun->save();

        return redirect('akun');
    }

    public function destroy(Request $request, User $akun)
    {
        $akun->delete();
        return redirect('akun');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('user.edit', compact('user'));
    }
}
