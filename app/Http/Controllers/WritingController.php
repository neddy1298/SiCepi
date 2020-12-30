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

    public function user_index()
    {
        $writings = Writing::where('writings.user_id', auth()->user()->id)
        ->join('catalogs', 'catalogs.id' ,'=' ,'writings.catalog_id')
        ->join('templates', 'templates.id' ,'=' ,'writings.template_id')
        ->select('writings.*', 'catalogs.catalog' ,'templates.template_name')
        ->get();

        // dd($writing);

        return view('app.writing.view', compact('writings'));
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

        $writing = Writing::create($request->all());

        $block = Block::where('blocks.template_id', $writing->template_id)->get()->first();
        // dd($block);
        if($block){
            if ($block->tags == "") {
                if ($block->template_id != 1)
                {
                    $writingchild = WritingChild::create([
                        'writing_id' => $writing->id,
                        'writing_name' => $block->block_name,
                        'writing_text' => $block->block_body,
                    ]);
                }
                return redirect()->route('dashboard.writing.edit', $writing->id);
            }
        }

        return redirect()->route('dashboard.writing.build', $writing->id);

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

            array_push($fields ,Tag::where('tags.tag_field', 'like', "%{$block}%")->get()->first());
        }
        // dd($fields);

        return view('app.writing.actions.build', compact('writing', 'fields'));

    }

    public function build_store(Request $request, $id)
    {
        // dd($request->all());

        $writing = Writing::find($id);
        $template = Template::find($writing->template_id);
        $blocks = Block::where('blocks.template_id', '=', $template->id)->get();

        // dd($template);
        $result = "";

        if ($template->id == 1) {
            $writingchild = WritingChild::create([
                'writing_id' => $id,
                'writing_name' => 'Quote',
                'writing_text' => $request->writing,
            ]);

        }else{

        foreach($blocks as $block){


            // $fields = collect(explode("{{", $block->block_body));
            //     $fields = collect($fields)->implode('');
            //     $fields = collect(explode("}}", $fields));
            //     $fields = collect($fields)->implode('');
            //     $fields = collect(explode(" ", $fields));


            //     dd($fields);

            //     $fields = $block->tags;


            //         // $fields = collect(explode(" ", $block->tags));
            //     // $fields = collect(explode(",}}",$fields));

            //     $result = $block->block_body;

                $fields = collect(explode(" ", $block->tags));
                // dd($fields);


                // $result = $block->block_body;
                $result = collect(explode("{{", $block->block_body));
                $result = collect($result)->implode('');
                $result = collect(explode("}}", $result));
                $result = collect($result)->implode(' ');

                // dd($result);


                foreach ($fields as $field) {

                    $result = str_replace($field,$request->$field, $result);
                // dd($result);


                }


                $writingchild = WritingChild::create([
                    'writing_id' => $id,
                    'writing_name' => $block->block_name,
                    'writing_text' => $result,
                ]);

            }
        }
        // dd($result);

        $writing->update([
            'name' => $request->name,
            'field' => $request->except(['_token', 'name'])
        ]);


        return redirect()->route('dashboard.writing.edit', $writing->id);


    }

    public function edit($id)
    {
        $writing = Writing::where('writings.id', $id)
        ->join('catalogs', 'catalogs.id', '=', 'writings.catalog_id')
        ->join('templates', 'templates.id', '=', 'writings.template_id')
        ->select('writings.*', 'catalogs.catalog', 'templates.template_name',)
        ->get()->first();

        $writingchilds = WritingChild::where('writing_id', $id)->get();
        // dd($writingchilds);

        return view('app.writing.actions.edit', compact('writing', 'writingchilds'));
    }

    public function update(Request $request, $id)
    {
        $writing = Writing::find($id);
        $writingchild = WritingChild::where('writing_children.writing_id', '=', $writing->id)->get();

        $result = $request->except('name', '_token');

        foreach($writingchild as $block){

            $writingchildedit = WritingChild::where('writing_children.id', '=', $result['child_id_'.$block->id])->get()->first();

            $writingchildedit->update([
                'writing_text' => $result['block_body_'.$block->id],
            ]);

        }


        $writing->update([
            'name' => $request->name,
        ]);



        return redirect()->route('dashboard.writing.edit', $writing->id);


    }

    public function user_writing()
    {
        $writings = Writing::join('templates', 'templates.id', '=', 'writings.template_id')
        ->join('catalogs', 'catalogs.id', '=', 'writings.catalog_id')
        ->select('writings.*', 'templates.template_name', 'catalogs.catalog')
        ->latest()->get();

        return view('app.writing.user_view', compact('writings'));
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

        return view('app.writing.user_view_detail', compact('writing', 'blocks'));
    }

    public function destroy($id)
    {
        $writing = Writing::find($id);
        $writing->delete();

        return redirect()->back();
    }
}
