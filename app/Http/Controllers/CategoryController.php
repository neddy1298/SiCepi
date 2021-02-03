<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Alert;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::get();

        return view('dashboard.app.master_data.category.view', compact('categories'));
    }

    public function store(Request $request)
    {
        Category::create($request->all());


        Alert::success('Berhasil', 'Berhasil membuat kategori baru');
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        Alert::success('Berhasil', 'Berhasil merubah kategori');
        $category->update($request->all());

        return redirect()->back();
    }

    public function destroy($id)
    {
        $category = Category::find($id);

        $category->delete();

        Alert::success('Berhasil', 'Berhasil menghapus kategori');
        return redirect()->back();
    }
}
