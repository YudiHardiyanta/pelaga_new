<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    //
    public function auth(Request $request)
    {
        $request->validate([
            'nik' => 'required',
            'password' => 'required',
            'g-recaptcha-response' => 'required|captcha'
        ]);
        
        $credentials = $request->only('nik', 'password');


        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'NIK atau password salah'
            ], 401);
        }

        // misal langsung masuk ke halaman awal
        return redirect('/');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/masuk');
    }

    public function getUsers(Request $request)
    {
        $query =  User::select(
            'users.id',
            'users.nik',
            'users.name',
            'roles.name as role_name'
        )
            ->leftJoin('user_roles', 'users.nik', '=', 'user_roles.nik')
            ->leftJoin('roles', 'user_roles.role_id', '=', 'roles.id');

        return DataTables::of($query)
            ->addIndexColumn()
            ->make(true);
    }
    public function edit(Request $request, $id)
    {
        $mode = 'Edit';
        $user = User::findOrFail($id);
        $user_role = UserRole::where('nik', '=', $user->nik)->first();
        $role = Role::findOrFail($user_role->role_id);
        $roles = Role::get();
        return view('admin.pengguna.item', [
            'mode' => $mode,
            'user' => $user,
            'user_role' => $role,
            'roles' => $roles
        ]);
    }

    public function patchRole(Request $request, $id)
    {
        $request->validate([
            'role' => ['required'],
        ]);
        $user = User::findOrFail($id);
        $user_role = UserRole::where('nik', '=', $user->nik)->first();
        $user_role->update([
            'role_id' => $request->role,
        ]);
        return redirect('/admin/pengguna')->with('success', 'Update Role Berhasil berhasil diedit');
    }

    public function tes(Request $request)
    {
        return Auth::user()->UserRoles->Roles;
    }
}
