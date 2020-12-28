<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Writing;
use App\Models\Catalog;
use App\Models\Template;
use App\Models\Block;
use App\Models\Tag;
use Response;

class WritingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function template()
{
        $templates = Template::get();
        return Response::json($templates);
}

    public function index()
    {
        return view('app.writing.view');
    }

    public function index_user()
    {
        return view('app.writing.view');
    }

    public function create()
    {
        $catalogs = Catalog::get();
        $templates = Template::get();
        $blocks = Block::get();
        return view('app.writing.actions.create', compact('catalogs', 'templates', 'blocks'));

    }

    public function store(Request $request)
    {
        // dd($request->all());

        $template = Writing::create($request->all());

        return redirect()->route('dashboard.writing.fill', $template->id);

    }

    public function fill(Request $request, $id)
    {

        $template = Writing::join('catalogs', 'catalogs.id' ,'=' ,'writings.catalog_id')
        ->join('templates', 'templates.id' ,'=' ,'writings.template_id')
        ->select('writings.*', 'catalogs.catalog' ,'templates.template_name' ,'templates.template_intro')
        ->get()->first();

        $blocks = Block::where('blocks.template_id', $template->template_id)->get();

        $field = [];



        foreach ($blocks as $block) {

            array_push($field, $block->tags);
        }


            // Filtering Data
            $block = implode(' ', array_values($field));
            $block = collect(explode(" ", $block))->unique();
            $block = collect($block)->implode(' ');
            $blocks = collect(explode(" ", $block));

            $field = [];
            foreach ($blocks as $block) {

                 array_push($field ,Tag::where('tags.tag_body', 'like', "%{$block}%")->get()->first());
            }
            // echo $field;
            dd($field);

        // for ($i=0; $i < $blocks->count(); $i++) {

        //     if ($blocks[$i] == 'Undefined' ) {

        //         $tags[] = Tag::where('tags.tag_body', 'like', "%{$blocks[$i]}%")->get();
        //     }


        // }

        // return view('app.writing.actions.fill', compact('template', 'blocks'));

    }


    public function user_writing()
    {
        # code...
    }
}
