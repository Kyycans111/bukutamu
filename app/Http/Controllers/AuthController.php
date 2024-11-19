<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);

        // Menangani login menggunakan session
        if (Auth::attempt(['name' => $request->name, 'password' => $request->password])) {
            // Redirect ke halaman yang diinginkan setelah login berhasil
            return redirect()->intended('bukutamu');
        }

        // Jika gagal login, kembali dengan error
        return back()->withErrors([
            'name' => 'The provided credentials do not match our records.',
        ]);
    }

    // Untuk logout
    public function logout(Request $request)
{
    Auth::logout(); // Menghapus session
    $request->session()->invalidate(); // Menghapus session yang ada
    $request->session()->regenerateToken(); // Regenerasi token CSRF
    return redirect()->route('login'); // Redirect ke halaman login
}

}