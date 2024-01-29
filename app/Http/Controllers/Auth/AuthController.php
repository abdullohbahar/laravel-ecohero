<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.index');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => ':attribute harus diisi',
            'password.required' => ':attribute harus diisi',
        ]);

        $auth = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($auth)) {
            $request->session()->regenerate();

            switch (Auth::user()->role) {
                case 'member':
                    return redirect()->route('member.dashboard');
                    break;
                case 'admin':
                    return redirect()->route('admin.dashboard');
                    break;
                default:
                    return redirect()->route('login')->with('error', 'Username atau password salah');
            }
        }

        return redirect()->route('login')->with([
            'error' =>  'email atau password salah',
            'email' => $request->email
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return to_route('login')->with('success', 'Logout Successfully');
    }
}
