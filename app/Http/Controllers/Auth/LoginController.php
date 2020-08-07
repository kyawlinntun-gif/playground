<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        if(filter_var($username, FILTER_VALIDATE_EMAIL)) {
            //user sent their email 
            Auth::attempt(['email' => $username, 'password' => $password]);
        } else {
            //they sent their username instead 
            Auth::attempt(['username' => $username, 'password' => $password]);
        }

        //was any of those correct ?
        if ( Auth::check() ) {
            //send them where they are going 
            return redirect('users/all');
        }

        return redirect()->back()->with('fail', 'Please, check your credentials');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
