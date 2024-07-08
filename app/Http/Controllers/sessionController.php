<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class sessionController extends Controller
{
    //
    public function loginPage()
    {
        $title = 'Login';
        return view('login', ['title' => $title]);
    }

    public function registerPage()
    {
        $title = 'Register';
        return view('register', ['title' => $title]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            //Password
            if (Auth::user()->role == 'admin') {
                return redirect()->intended(route('admin'));
            }
            return redirect()->intended(route('home'));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }


    public function register(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email',
                'phone' => 'required',
                'password' => 'required|min:8'
            ],
            [
                'name.required' => 'Name is required',
                'email.required' => 'Email is required',
                'email.email' => 'Email is not valid',
                'phone.required' => 'Phone is required',
                'password.required' => 'Password is required',
                'password.min' => 'Password must be at least 8 characters'
            ]
        );


        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = bcrypt($request->password);
        $user->role = 'user';
        $user->save();

        return redirect()->route('session.loginPage');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('session.loginPage');
    }
}
