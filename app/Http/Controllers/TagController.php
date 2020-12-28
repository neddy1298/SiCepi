<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tags = Tag::latest()->get();
        return view('app.tag.view', compact('tags'));
    }

    public function create()
    {
        return view('app.tag.actions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tag_name' => 'required',
            'tag_body' => 'required',
            'default_replace' => 'required',
        ]);

        $tag_body = "{{". $request->tag_body ."}}";

        $tag = Tag::create([
            'tag_name' => $request->tag_name,
            'tag_body' => $tag_body,
            'default_replace' => $request->tag_body,
            'promp_text' => $request->promp_text
        ]);


        return redirect()->route('dashboard.admin.tag');
    }

    public function edit($id)
    {
        $tag = Tag::find($id);
        return view('app.tag.actions.edit', compact('tag'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());

        $tag = Tag::find($id);
        $tag->update($request->all());

        return redirect()->route('dashboard.admin.tag_edit', $tag->id);
    }

    public function destroy($id)
    {
        $tag = Tag::find($id);
        $tag->delete();

        return redirect()->route('dashboard.admin.tag');

    }
}
