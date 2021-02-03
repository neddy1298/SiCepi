<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;


use App\Models\Category;
use App\Models\Author;
use App\Models\Topic;
use App\Models\User;
use App\Models\Writing;

use Response;
use Alert;

class WritingController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

//     public function template()
// {
//         $templates = Template::get();
//         return Response::json($templates);
// }

    public function index()
    {
        $writings = Writing::where('writings.user_id', auth()->user()->id)
        ->get();
        return view('dashboard.app.writing.view', compact('writings'));
    }

    public function user_index()
    {
        $writings = Writing::where('writings.user_id', auth()->user()->id)
        ->get();

        // dd($writings);

        return view('dashboard.app.writing.view', compact('writings'));
    }

    public function create()
    {
        $categories = Category::get();
        $authors = Author::get();
        $topics = Topic::get();
        return view('dashboard.app.writing.actions.create', compact('categories', 'topics', 'authors'));

    }

    public function store(Request $request)
    {
        // dd($request->all());

        $limit = auth()->user()->limit;
        if ($limit <= 0 ) {
            Alert::warning('Gagal', 'Kamu telah mencapai batas pembuatan Kutipan, beli Kutipan untuk menambah Kutipanmu');
            // Alert::html('Html Title', 'Html Code', 'Type');
            return redirect()->route('dashboard.pricing');

        }else{
            $limitUpdate = User::find(auth()->user()->id);
            $limitUpdate->update([
                'limit' => $limitUpdate->limit - 1
            ]);
        }
        // dd($request->all());
        $topics = implode(',', $request->topics);

        $writing = Writing::create([
            'user_id' => $request->user_id,
            'name' => $request->name,
            'text' => $request->text,
            'category' => $request->category,
            'topics' => $topics,
            'author' => $request->author,
        ]);

        return redirect()->route('dashboard.writing.index');

    }

    public function edit($id)
    {
        $writing = Writing::find($id);
        $authors = Author::get();
        $topics = Topic::get();
        $categories = Category::get();

        return view('dashboard.app.writing.actions.edit', compact('writing','authors','topics','categories'));
    }

    public function update(Request $request, $id)
    {

        // dd($request->all());

        $limit = auth()->user()->limit;
        if ($limit <= 0 ) {
            Alert::warning('Gagal', 'Kamu telah mencapai batas pembuatan Kutipan, beli Kutipan untuk menambah Kutipanmu');
            // Alert::html('Html Title', 'Html Code', 'Type');
            return redirect()->route('dashboard.pricing');

        }else{
            $limitUpdate = User::find(auth()->user()->id);
            $limitUpdate->update([
                'limit' => $limitUpdate->limit - 1
            ]);
        }

        $writing = Writing::find($id);
        $writing->update($request->all());
        // dd($writing);

        if ($request->topics) {
            $topics = implode(',', $request->topics);
            $writing->update([
                'topics' => $topics
            ]);
        }

        Alert::success('Berhasil', 'Kutipan berhasil diubah');
        return redirect()->back();

    }

    public function user_writing()
    {
        $writings = Writing::join('templates', 'templates.id', '=', 'writings.template_id')
        ->join('catalogs', 'catalogs.id', '=', 'writings.catalog_id')
        ->select('writings.*', 'templates.template_name', 'catalogs.catalog')
        ->latest()->get();

        return view('dashboard.app.writing.user_view', compact('writings'));
    }

    public function user_writing_detail($id)
    {
        $writing = Writing::join('templates', 'templates.id', '=', 'writings.template_id')
        ->join('catalogs', 'catalogs.id', '=', 'writings.catalog_id')
        ->join('users', 'users.id', '=', 'writings.user_id')
        ->select('writings.*', 'templates.template_name', 'catalogs.catalog', 'users.email')
        ->where('writings.id', $id)
        ->get()->first();

        // dd($writing);


        $blocks = WritingChild::where('writing_id', $id)->get();

        // dd($blocks);

        return view('dashboard.app.writing.user_view_detail', compact('writing', 'blocks'));
    }

    public function destroy($id)
    {
        $writing = Writing::find($id);
        $writing->delete();

        $limitUpdate = User::find(auth()->user()->id);
        $limitUpdate->update([
            'limit' => $limitUpdate->limit + 1
        ]);


        Alert::success('Berhasil', 'Kutipan berhasil dihapus');
        return redirect()->back();
    }
}
