<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use Illuminate\Http\Request;

use Alert;

class CatalogController extends Controller
{

    public function index()
    {
        $catalogs = Catalog::latest()->get();
        return view('app.catalog.view', compact('catalogs'));
    }
    public function store(Request $request)
    {
        Catalog::create($request->all());

        Alert::success('Berhasil', 'Catalog berhasil dibuat');
        return redirect()->back();
    }
    public function update(Request $request, $id)
    {
        $catalog = Catalog::find($id);

        $catalog->update($request->all());

        Alert::success('Berhasil', 'Catalog berhasil diubah');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $catalog = Catalog::find($id);

        $catalog->delete();

        Alert::success('Berhasil', 'Catalog berhasil dihapus');
        return redirect()->back();
    }
}
