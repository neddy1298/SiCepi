<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Template;
use App\Models\Catalog;
use App\Models\Tag;
use App\Models\Block;
use DataTables;

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
        return view('app.template.view', compact('templates'));
    }

    public function create()
    {
        $catalogs = Catalog::get();
        $tags = Tag::get();
        return view('app.template.actions.create', compact('catalogs', 'tags'));

    }

    public function store(Request $request)
    {

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


        if ($request->catalog_id != 1) {

            Block::create([
                'template_id' => $template->id,
                'tag_id' => $request->tag_id,
                'block_name' => $request->block_name,
                'block_body' => $request->block_body,

                ]);
            }

        return redirect()->route('dashboard.admin.template_edit', $template->id);
    }

    public function edit($id)
    {
        $template = Template::where('templates.id', $id)->join('catalogs', 'catalogs.id', '=', 'templates.catalog_id')
        ->select('templates.*', 'catalogs.catalog')
        ->first();

        $blocks = Block::where('blocks.template_id', $id)->get();
        $catalogs = Catalog::get();

        return view('app.template.actions.edit', compact('template', 'blocks', 'catalogs'));
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

        return redirect()->route('dashboard.admin.template_edit', $id);
    }

    public function destroy($id)
    {
        $block = Block::where('blocks.template_id', $id)->delete();
        $template = Template::find($id);
        $template->delete();

        return redirect()->back();
    }




}
