<?php

namespace App\Http\Controllers;

use App\Models\Banjar;
use App\Models\Penduduk;
use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    //
    public function pageLogin(Request $request)
    {
        if (Auth::check()) {
            return redirect('/');
        }
        return view('login');
    }

    public function pageProfile(Request $request)
    {
        $user = Auth::user();
        $identitas_penduduk = Penduduk::where('nik', '=', $user->nik)->first();
        return view('web.profil', [
            'identitas_penduduk' => $identitas_penduduk
        ]);
    }

    public function resetPassword(Request $request)
    {
        try {
            // ✅ Validasi input
            $request->validate([
                'old_password' => 'required',
                'new_password' => 'required|min:6',
                'confirm_password' => 'required|same:new_password',
            ]);

            $user = Auth::user();

            // ❌ cek password lama
            if (!Hash::check($request->old_password, $user->password)) {
                return response()->json([
                    'message' => 'Password lama salah'
                ], 400);
            }

            // ❌ optional: cegah password sama
            if (Hash::check($request->new_password, $user->password)) {
                return response()->json([
                    'message' => 'Password baru tidak boleh sama dengan password lama'
                ], 400);
            }

            // ✅ update password
            $user->password = Hash::make($request->new_password);
            $user->save();

            return response()->json([
                'message' => 'Password berhasil diubah'
            ], 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => $e->validator->errors()->first()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Terjadi kesalahan server'
            ], 500);
        }
    }

    public function auth(Request $request)
    {
        $request->validate([
            'nik' => 'required',
            'password' => 'required',
            //'g-recaptcha-response' => 'required|captcha'
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

    public function getAdminUserInfo(Request $request)
    {
        $user = Auth::user();
        $user_detail = Penduduk::where('nik', '=', $user->nik)->join('banjars', 'penduduks.banjar_id', '=', 'banjars.id')->first();
        $keluarga = Penduduk::where('penduduks.kk', '=', $user->kk)->join('users', 'penduduks.nik', '=', 'users.nik')->select('users.kk', 'users.jk', 'users.name', 'penduduks.*')->get();
        return view('admin.profil', [
            'user_detail' => $user_detail,
            'keluarga' => $keluarga,
        ]);
    }

    public function autocomplete(Request $request)
    {
        $search = $request->q;

        $users = User::where('name', 'LIKE', "%{$search}%")
            ->orWhere('nik', 'LIKE', "%{$search}%")
            ->select('nik','name')
            ->limit(10)
            ->get();


        return response()->json([
            'results' => $users->map(function ($user) {
                return [
                    'id' => $user->nik,
                    'text' => $user->name,

                ];
            })
        ]);
    }

    public function tes(Request $request)
    {
        return Auth::user()->UserRoles->Roles;
    }
}
