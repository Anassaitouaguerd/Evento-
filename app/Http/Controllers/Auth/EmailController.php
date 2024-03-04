<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResetPassRequest;
use App\Http\Requests\SendEmailRequest;
use App\Mail\ForgotPassMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function send_email(SendEmailRequest $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user) {
            $user->remember_token = Str::random(30);
            $user->save();
            Mail::to($user->email)->send(new ForgotPassMail($user));
            return back()->with('success', 'Checke your Email');
        } else {
            return back()->with('error', 'The account not found');
        }
    }
    public function reset_password($token)
    {
        $user = User::where('remember_token' , $token)->first();
        if($user)
        {
            return view('auth.reset-password');
        }else{
            return abort(404);
        }
    }
    public function change_password(ResetPassRequest $request , $token)
    {
        $user = User::where('remember_token', $token)->first();
        $remember_token = Str::random(30);
        $user->remember_token = $remember_token;
        $user->password = $request->password;
        $user->save();
        return redirect('login')->with('passIsChanged' , 'Your Password Is Changed');
    }

  
}