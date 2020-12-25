<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function loginForm()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
            ]);

        $credentials = $request->except(['_token','_method']);

        $user = User::where('email',$request->email)->first();

        // dd($credentials);
        if (auth()->attempt($credentials)) {

            return redirect()->route('dashboard.index');

        }else{
            session()->flash('message', 'Invalid credentials');
            return redirect()->back();
        }
    }
    public function registerForm()
    {
        return view('auth.register');
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|required_with:password-confirm|same:password-confirm'
        ]);

        $user = User::create([
            'name' => trim($request->input('name')),
            'email' => strtolower($request->input('email')),
            'password' => bcrypt($request->input('password')),
        ]);


        return redirect()->route('login');
    }
    public function logout()
    {
        \Auth::logout();

        return redirect()->route('login');
    }
}
