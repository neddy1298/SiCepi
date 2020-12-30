<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Template;
use App\Models\Tag;
use App\Models\Block;
use Alert;


class BlockController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create($id)
    {
        $tags = Tag::get();
        $template = Template::where('templates.id', $id)->join('catalogs', 'catalogs.id', '=', 'templates.catalog_id')
        ->select('templates.id', 'templates.template_name', 'catalogs.catalog')
        ->get()->first();

        // dd($template);

        return view('app.block.actions.create', compact('tags', 'template'));
    }

    public function store(Request $request, $id)
    {

        $text = collect(explode("{{", $request->block_body));
            $text = collect($text)->implode(' ');
            $text = collect(explode("}}", $text));
            $text = collect($text)->implode(' ');
            $text = collect(explode(" ", $text))->unique();
            // dd($text);
        $tags_id = [];
        foreach ($text as $item) {

            $tags = Tag::get();
            foreach ($tags as $tag) {
                if($item == $tag->tag_field){

                    array_push($tags_id, $item);

                }
            }
        }

        $tags = implode(' ', array_values($tags_id));

        $block = Block::create([
            'tags' => $tags,
            'block_name' => $request->block_name,
            'template_id' => $id,
            'block_body' => $request->block_body,
        ]);

        Alert::success('Berhasil', 'Block berhasil dibuat');
        return redirect()->route('dashboard.admin.template_edit', $id);
    }

    public function edit($id)
    {
        $tags = Tag::get();
        $block = Block::where('blocks.id', $id)
        ->join('templates', 'templates.id', '=', 'blocks.template_id')
        ->join('catalogs', 'catalogs.id', '=', 'templates.catalog_id')
        ->select('blocks.*', 'templates.template_name', 'catalogs.catalog')
        ->get()->first();

        // dd($block);

        return view('app.block.actions.edit', compact('tags', 'block'));
    }

    public function update(Request $request, $id)
    {

        // $text = explode(" ",$request->block_body);
        $text = collect(explode("{{", $request->block_body));
            $text = collect($text)->implode(' ');
            $text = collect(explode("}}", $text));
            $text = collect($text)->implode(' ');
            $text = collect(explode(" ", $text));
            // dd($text);
        $tags_id = [];
        foreach ($text as $item) {

            $tags = Tag::get();
            foreach ($tags as $tag) {
                if($item == $tag->tag_field){

                    array_push($tags_id, $item);

                }
            }
        }

            // dd($tags_id);
        $tags_id = array_unique($tags_id);
        $tags = implode(' ', array_values($tags_id));

        $block = Block::find($id);
        $block->update([
            'tags' => $tags,
            'block_name' => $request->block_name,
            'template_id' => $request->template_id,
            'block_body' => $request->block_body,
        ]);

        Alert::success('Berhasil', 'Template berhasil diubah');
        return redirect()->route('dashboard.admin.template_edit', $block->template_id);
    }

    public function destroy($id)
    {
        $block = Block::find($id);
        $block->delete();

        Alert::success('Berhasil', 'Template berhasil dihapus');
        return redirect()->back();

    }
}
