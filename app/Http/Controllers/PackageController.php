<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\PurchaseHistory;
use App\Models\User;
use Illuminate\Http\Request;
use Alert;

class PackageController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $packages = Package::latest()->get();
        return view('dashboard.app.pricing.view', compact('packages'));
    }


    public function store(Request $request)
    {
        Package::create($request->all());

        Alert::success('Berhasil', 'Berhasil membuat paket');

        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $package = Package::find($id);
        $package->update($request->all());

        Alert::success('Berhasil', 'Berhasil merubah paket');

        return redirect()->back();
    }

    public function destroy($id)
    {
        $package = Package::find($id);
        $package->delete();

        Alert::success('Berhasil', 'Berhasil menghapus paket');
        return redirect()->back();
    }

    public function payment_confirm(Request $request, $id)
    {
        $package = PurchaseHistory::find($id);
        $package->update([
            'status' => $request->status
        ]);

        if ($request->status == "Transaksi Selesai") {

            $user = User::find(auth()->user()->id);
            $user->update([
                'limit' => $user->limit + $package->value
                ]);
            }

        Alert::success('Berhasil', $request->status);
        return redirect()->back();
    }

    public function user_history()
    {
        $packages = PurchaseHistory::join('users', 'users.id', '=', 'purchase_histories.user_id')
        ->select('purchase_histories.*', 'users.name as user_name', 'users.email')->get();
        return view('dashboard.app.pricing.history', compact('packages'));
    }
}
