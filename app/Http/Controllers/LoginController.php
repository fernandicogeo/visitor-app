<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPasswordMail; 


class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'emailOrUsername' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only(['password']);
        $emailOrUsername = $request->emailOrUsername;

        // Check if the input is an email
    if (filter_var($emailOrUsername, FILTER_VALIDATE_EMAIL)) {
        if (Auth::guard('web')->attempt(['email' => $emailOrUsername, 'password' => $credentials['password']])) {
            $request->session()->regenerate();
            return redirect('dashboard');
        }
    } else {
        // If it's not an email, attempt login based on username for different guards
        if (Auth::guard('staff')->attempt(['username' => $emailOrUsername, 'password' => $credentials['password']])) {
            $request->session()->regenerate();
            return redirect('dashboard-staff');
        } elseif (Auth::guard('manager')->attempt(['username' => $emailOrUsername, 'password' => $credentials['password']])) {
            $request->session()->regenerate();
            return redirect('dashboard-manager');
        } elseif (Auth::guard('satpam')->attempt(['username' => $emailOrUsername, 'password' => $credentials['password']])) {
            $request->session()->regenerate();
            return redirect('dashboard-satpam');
        }elseif (Auth::guard('admin')->attempt(['username' => $emailOrUsername, 'password' => $credentials['password']])) {
            $request->session()->regenerate();
            return redirect('dashboard-admin');
        }
    }

        return back()->with('loginError', 'Email atau password salah!');
    }

    public function forget_password()
    {
        return view('forget-password');
    }

    public function process_forget_password(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->with('pesanSalah', 'Email tidak ditemukan');
        }

        // Generate token dan timestamp
        $token = hash_hmac('sha256', Str::random(40), config('app.key'));
        DB::table('password_resets')->insert([
            'email' => $user->email,
            'token' => $token,
            'created_at' => now(),
        ]);

        $newPassword = Str::random(10);

        $bycryptPassword = bcrypt($newPassword);

        User::where('email', $request->email)
            ->update(['password' => $bycryptPassword]);

        Mail::to($user->email)
        ->send(new ResetPasswordMail($user, $newPassword));

        return back()->with('pesan', 'Link reset password telah dikirim ke email Anda');
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/login');
    }
}
