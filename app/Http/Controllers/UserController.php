<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Alert;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile()
    {
        return view('dashboard.app.user.profile');
    }

    public function profile_update(Request $request ,$id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);
        $user = User::find($id);

        $user->update($request->all());

        Alert::success('Berhasil', 'Data berhasil diubah');
        return redirect()->route('dashboard.user.profile');
    }

    public function profile_password()
    {
        return view('dashboard.app.user.actions.change_password');
    }

    public function profile_password_update(Request $request, $id)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|required_with:password-confirm|same:password-confirm'
        ]);

        $user = User::find($id);


        if (Hash::check($request->old_password, $user->password)) {

            Alert::success('Berhasil', 'Password berhasil diubah');
            $user->update([
                'password' => bcrypt($request->password)
            ]);


        }else{
            Alert::error('Gagal', 'Password tidak berhasil diubah');
        }

        return view('dashboard.app.user.actions.change_password');

    }

    public function index()
    {
        $users = User::latest()->get();

        return view('dashboard.app.user.view', compact('users'));
    }

    public function create()
    {
        return view('dashboard.app.user.actions.create');
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

        Alert::success('Berhasil', 'User berhasil dibuat');
        return redirect()->route('dashboard.user.index');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('dashboard.app.user.actions.edit', compact('user'));
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

        Alert::success('Berhasil', 'Data berhasil diubah');
        return redirect()->route('dashboard.user.index');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        Alert::success('Berhasil', 'User berhasil dihapus');
        return redirect()->back();
    }
}
