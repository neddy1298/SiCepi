<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();

        return view('app.user.view', compact('users'));
    }

    public function create()
    {
        return view('app.user.actions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required',
            'password' => 'required|required_with:password-confirm|same:password-confirm'
        ]);

        $user = User::create([
            'name' => ucfirst(trim($request->name)),
            'email' => strtolower($request->email),
            'role' => $request->role,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('dashboard.user.index');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('app.user.actions.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required',
        ]);

        $user = User::find($id);
        $user->update([
            'name' => ucfirst(trim($request->name)),
            'email' => strtolower($request->email),
            'role' => $request->role,
        ]);
        return redirect()->route('dashboard.user.index');
    }
}
