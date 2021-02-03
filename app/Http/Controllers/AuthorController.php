<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use Alert;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::get();

        return view('dashboard.app.master_data.author.view', compact('authors'));
    }

    public function store(Request $request)
    {
        Author::create($request->all());


        Alert::success('Berhasil', 'Berhasil membuat author baru');
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $author = Author::find($id);

        Alert::success('Berhasil', 'Berhasil merubah author');
        $author->update($request->all());

        return redirect()->back();
    }

    public function destroy($id)
    {
        $author = Author::find($id);

        $author->delete();

        Alert::success('Berhasil', 'Berhasil menghapus author');
        return redirect()->back();
    }
}
