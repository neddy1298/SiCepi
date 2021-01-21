<?php

namespace App\Http\Controllers;

use App\Models\PromoCode;
use App\Models\PurchaseHistory;
use Illuminate\Http\Request;
use Alert;

class PromoCodeController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $codes = PromoCode::latest()->get();
        return view('dashboard.app.pricing.view', compact('codes'));
    }


    public function store(Request $request)
    {
        PromoCode::create($request->all());

        Alert::success('Berhasil', 'Berhasil membuat promo code');

        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $code = PromoCode::find($id);
        $code->update($request->all());

        Alert::success('Berhasil', 'Berhasil merubah promo code');

        return redirect()->back();
    }

    public function destroy($id)
    {
        $code = PromoCode::find($id);
        $code->delete();

        Alert::success('Berhasil', 'Berhasil menghapus promo code');
        return redirect()->back();
    }

    public function user_history()
    {
        $codes = PurchaseHistory::join('users', 'users.id', '=', 'purchase_histories.user_id')
        ->select('purchase_histories.*', 'users.name')->get();
        return view('dashboard.app.pricing.history', compact('codes'));
    }
}
