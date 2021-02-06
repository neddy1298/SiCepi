<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Alert;
use File;
use Image;

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

    public function profile_front()
    {
        return view('front.pages.user.profile.view');
    }

    public function profile_update(Request $request ,$id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);
        $user = User::find($id);

        $user->update($request->all());



        if ($request->file('image')) {

            $foto = $request->file('image');
            $namaFile = \Carbon\Carbon::now()->timestamp . '_' . uniqid() . '.' . $foto->getClientOriginalExtension();

            $destinationPath = public_path('assets/upload/user');
            File::exists($destinationPath) or File::makeDirectory($destinationPath, 0777, true, true);
            $img = Image::make($foto->path());

            $img->resize(466, 493)->save($destinationPath.'/'.$namaFile);

            $user->update([
                'image' => $namaFile
            ]);
        }


        Alert::success('Berhasil', 'Data berhasil diubah');
        return redirect()->back();
    }

    public function profile_password()
    {
        return view('dashboard.app.user.actions.change_password');
    }

    public function profile_password_front()
    {
        return view('front.pages.user.profile.password');
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

        return redirect()->back();

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
            'is_admin' => 'required',
        ]);


        $user = User::find($id);
        $user->update([
            'name' => ucfirst(trim($request->name)),
            'email' => strtolower($request->email),
            'is_admin' => $request->is_admin,
        ]);

        Alert::success('Berhasil', 'Data berhasil diubah');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $user = User::find($id);
        File::delete(public_path('assets/upload/user/') . $user->image);
        $user->delete();

        Alert::success('Berhasil', 'User berhasil dihapus');
        return redirect()->back();
    }
}
