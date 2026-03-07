<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function auth(Request $request)
    {
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

    public function tes(Request $request){
        return Auth::user();
    }
}
