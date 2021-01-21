<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Alert;

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

            if(auth()->user()->is_admin == 1){
                return redirect()->route('dashboard.index');
            }
            return redirect()->route('index');

        }else{
            Alert::error('Login Gagal', 'Perisa email & password kamu');
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

        Alert::success('Berhasil', 'Registrasi berhasil, silahkan login untuk melanjutkan');
        return redirect()->route('login');
    }
    public function logout()
    {
        \Auth::logout();

        return redirect()->route('login');
    }
}
