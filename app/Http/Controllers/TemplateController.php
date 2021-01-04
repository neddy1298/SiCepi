<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Template;
use App\Models\Catalog;
use App\Models\Tag;
use App\Models\Block;
use DataTables;
use Alert;


class TemplateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $templates = Template::join('catalogs', 'catalogs.id', '=', 'templates.catalog_id')
        ->select('templates.*', 'catalogs.catalog')->latest()->get();
        return view('dashboard.app.template.view', compact('templates'));
    }

    public function create()
    {
        $catalogs = Catalog::get();
        $tags = Tag::get();
        return view('dashboard.app.template.actions.create', compact('catalogs', 'tags'));

    }

    public function store(Request $request)
    {
        // $text = explode(" ",$request->block_body);
        $text = collect(explode("{{", $request->block_body));
        $text = collect($text)->implode('');
        $text = collect(explode("}}", $text));
        $text = collect($text)->implode('');
        $text = collect(explode(" ", $text));
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

        if($request->status == null){
            $request->status = 'Not Published';
        }else{
            $request->status = 'Published';
        }
        $template = Template::create([
            'catalog_id' => $request->catalog_id,
            'template_name' => $request->template_name,
            'template_intro' => $request->template_intro,
            'status' => $request->status

            ]);


        $block = Block::create([
            'tags' => $tags,
            'block_name' => $request->block_name,
            'template_id' => $template->id,
            'block_body' => $request->block_body,
        ]);

        Alert::success('Berhasil', 'Template berhasil dibuat');
        return redirect()->route('dashboard.admin.template');
    }

    public function edit($id)
    {
        $template = Template::where('templates.id', $id)->join('catalogs', 'catalogs.id', '=', 'templates.catalog_id')
        ->select('templates.*', 'catalogs.catalog')
        ->first();

        $blocks = Block::where('blocks.template_id', $id)->get();
        $catalogs = Catalog::get();

        return view('dashboard.app.template.actions.edit', compact('template', 'blocks', 'catalogs'));
    }

    public function update(Request $request, $id)
    {
        if($request->status == null){
            $request->status = 'Not Published';
        }else{
            $request->status = 'Published';
        }

        $template = Template::find($id);
        $template->update([
            'catalog_id' => $request->catalog_id,
            'template_name' => $request->template_name,
            'template_intro' => $request->template_intro,
            'status' => $request->status

            ]);

        Alert::success('Berhasil', 'Block berhasil diubah');
        return redirect()->route('dashboard.admin.template_edit', $id);
    }

    public function destroy($id)
    {
        $block = Block::where('blocks.template_id', $id)->delete();
        $template = Template::find($id);
        $template->delete();

        Alert::success('Berhasil', 'Block berhasil dihapus');
        return redirect()->back();
    }




}
