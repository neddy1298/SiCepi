<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Writing;
use App\Models\Catalog;
use App\Models\Template;
use App\Models\Block;
use App\Models\Tag;
use App\Models\WritingChild;
use Response;

class WritingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

//     public function template()
// {
//         $templates = Template::get();
//         return Response::json($templates);
// }

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

        return redirect()->route('dashboard.writing.build', $template->id);

    }

    public function build(Request $request, $id)
    {

        $writing = Writing::join('catalogs', 'catalogs.id' ,'=' ,'writings.catalog_id')
        ->join('templates', 'templates.id' ,'=' ,'writings.template_id')
        ->select('writings.*', 'catalogs.catalog' ,'templates.template_name' ,'templates.template_intro')
        ->where('writings.id', '=', $id)
        ->get()->first();

        // dd($writing);

        $blocks = Block::where('blocks.template_id', $writing->template_id)->get();

        // dd($blocks);
        $field = [];



        foreach ($blocks as $block) {

            array_push($field, $block->tags);
        }


            // Filtering Data
            $block = implode(' ', array_values($field));
            $block = collect(explode(" ", $block))->unique();
            $block = collect($block)->implode(' ');
            $blocks = collect(explode(" ", $block));


        $fields = [];
        foreach ($blocks as $block) {

            array_push($fields ,Tag::where('tags.tag_body', 'like', "%{$block}%")->get()->first());
        }

        return view('app.writing.actions.build', compact('writing', 'fields'));

    }

    public function build_store(Request $request, $id)
    {
        $writing = Writing::find($id);
        $template = Template::find($writing->template_id);
        $blocks = Block::where('blocks.template_id', '=', $template->id)->get();

        // dd($request->all());

        $result = "";
        foreach($blocks as $block){


            $fields = collect(explode(" ", $block->tags));

            $result = $block->block_body;


            foreach ($fields as $field) {

                $result = str_replace($field,$request->$field, $result);

            }


            $writingchild = WritingChild::create([
                'writing_id' => $id,
                'writing_name' => $block->block_name,
                'writing_text' => $result,
            ]);

        }
        // $text = collect($text);
        // $text = collect(explode("---", $text));

        // dd($writingchild);

        $writing->update([
            'name' => $request->name,
            // 'writing' => collect(['template_name' => $block->block_name, 'text' => $text]),
            'field' => $request->except(['_token', 'name'])
        ]);

        // dd($writing);


        return redirect()->route('dashboard.writing.edit', $writing->id);


    }

    public function edit($id)
    {
        $writing = Writing::where('writings.id', $id)
        ->join('catalogs', 'catalogs.id', '=', 'writings.catalog_id')
        ->join('templates', 'templates.id', '=', 'writings.template_id')
        ->select('writings.*', 'catalogs.catalog', 'templates.template_name',)
        ->get()->first();

        // dd($writing);

        $writingchilds = WritingChild::where('writing_id', $id)->get();
        // $keys = array_keys($writing->writing->toArray());
        // dd($writingchild);

        return view('app.writing.actions.edit', compact('writing', 'writingchilds'));
    }


    public function user_writing()
    {
        # code...
    }
}
