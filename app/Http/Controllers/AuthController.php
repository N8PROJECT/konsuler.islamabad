<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetCodeMail;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    // REGISTER
    public function register_form() {
        return view('auth.register');
    }

    public function register(Request $request) {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'gender'   => 'required|in:male,female',
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'gender'   => $request->gender,
        ]);

        Auth::login($user);

        return redirect()->route('login')->with('message', 'Registrasi berhasil. Silakan login.');
    }

    // LOGIN
    public function login_form() {
        return view('auth.login');
    }
    
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string',
        ]);

        if (!Auth::attempt($credentials)) {
            return back()->withErrors([
                'email' => 'Email atau password salah.',
            ])->onlyInput('email');
        }

        $request->session()->regenerate();

        $user = Auth::user();

        return redirect()->route($user->role === 'admin' ? 'admin.dashboard' : 'user.home');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home'); // atau ke route login
    }

    // Forgot Password
    public function showForgotForm() {
        return view('auth.forgot-password.forgot-password');
    }

    public function sendEmail(Request $request) {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        // Simpan email di session
        session(['reset_email' => $request->email]);

        return redirect()->route('password.reset.form');
    }

    public function showResetForm() {
        if (!session()->has('reset_email')) {
            return redirect()->route('forgot-password')->withErrors(['email' => 'Email belum diisi.']);
        }

        return view('auth.forgot-password.new-password');
    }

    public function resetPassword(Request $request) {
        $request->validate([
            'password' => 'required|string|min:6|confirmed',
        ]);

        $email = session('reset_email');

        $user = User::where('email', $email)->firstOrFail();
        $user->update([
            'password' => Hash::make($request->password),
        ]);

        // Hapus email dari session
        session()->forget('reset_email');

        return redirect()->route('login')->with('success', 'Password berhasil direset. Silakan login.');
    }
}