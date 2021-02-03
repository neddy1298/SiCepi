<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
use Alert;

class TopicController extends Controller
{
    public function index()
    {
        $topics = Topic::get();

        return view('dashboard.app.master_data.topic.view', compact('topics'));
    }

    public function store(Request $request)
    {
        Topic::create($request->all());


        Alert::success('Berhasil', 'Berhasil membuat topic baru');
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $topic = Topic::find($id);

        Alert::success('Berhasil', 'Berhasil merubah topic');
        $topic->update($request->all());

        return redirect()->back();
    }

    public function destroy($id)
    {
        $topic = Topic::find($id);

        $topic->delete();

        Alert::success('Berhasil', 'Berhasil menghapus topic');
        return redirect()->back();
    }
}
