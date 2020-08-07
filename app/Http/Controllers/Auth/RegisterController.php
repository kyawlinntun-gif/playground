<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:4',
            'username' => 'required|alpha_dash|min:4',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password'
        ]);

        $user = User::create(['name' => $request->name, 'username' => $request->username, 'email' => $request->email, 'password' => bcrypt($request->password)]);
        Auth::login($user);
        return redirect('/dashboard');
    }
}
