<?php

namespace App\Http\Controllers;

use App\Models\Popular;
use Illuminate\Http\Request;

use App\Models\PopularAuthor;
use App\Models\PopularTopic;

class PopularController extends Controller
{

    public function index_author()
    {
        $authors = PopularAuthor::get();

        return view('dashboard.app.popular.author', compact('authors'));
    }

    public function store_author(Request $request)
    {
        PopularAuthor::create($request->all());

        return redirect()->back();
    }

    public function update_author(Request $request, $id)
    {
        $author = PopularAuthor::find($id);

        $author->update($request->all());

        return redirect()->back();
    }

    public function destroy_author($id)
    {
        $author = PopularAuthor::find($id);

        $author->delete();

        return redirect()->back();
    }

    public function index_topic()
    {
        $topics = PopularTopic::get();

        return view('dashboard.app.popular.topic', compact('topics'));
    }

    public function store_topic(Request $request)
    {
        PopularTopic::create($request->all());

        return redirect()->back();
    }

    public function update_topic(Request $request, $id)
    {
        $author = PopularTopic::find($id);

        $author->update($request->all());

        return redirect()->back();
    }

    public function destroy_topic($id)
    {
        $author = PopularTopic::find($id);

        $author->delete();

        return redirect()->back();
    }
}
