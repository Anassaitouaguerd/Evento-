<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class Authontication extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index_login()
    {
        return view('auth.login');
    }
    
    public function index_register()
    {
        return view('auth.register');
    }

    public function login(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            $request->session()->put('user_id', $user->id);
            $request->session()->put('user_name', $user->name);
            $request->session()->put('user_role', $user->role);
            return redirect('/home')->with('success', 'Login successful');
        } else {
            return back()->withErrors(['email' => 'the email or password could not be verified']);
        }
        return view('auth.register');
    }
    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);
        $request->session()->put('user_name', $user->name);
        $request->session()->put('user_role', $user->role);
        return redirect('/login')->with('success', 'Login successful');
    }
    public function destroy(string $id)
    {
        Session::flush();
        return redirect('/login')->with('success', 'Goodbye!!');
    }

    public function index_forget_password()
    {
        return view('auth.forgot-password');
    }
}