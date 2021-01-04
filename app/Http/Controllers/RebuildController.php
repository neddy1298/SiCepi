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
use Alert;


class RebuildController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit(Request $request, $id)
    {

        $writing = Writing::join('catalogs', 'catalogs.id' ,'=' ,'writings.catalog_id')
        ->join('templates', 'templates.id' ,'=' ,'writings.template_id')
        ->select('writings.*', 'catalogs.catalog' ,'templates.template_name' ,'templates.template_intro')
        ->where('writings.id', '=', $id)
        ->get()->first();

        // dd($writing);
        $block = Block::where('blocks.template_id', $writing->template_id)->get()->first();

        if($writing->field == null){

            if ($block->template_id != 1)
            {
                $writingchild = WritingChild::where('writing_id', $id)->get()->first();
                $writingchild->update([
                    'writing_name' => $request->name,
                    'writing_text' => $block->block_body,
                ]);
                // return redirect()->route('dashboard.writing.edit', $writing->id);
            }
            return redirect()->route('dashboard.writing.edit', $writing->id);


        }

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

        return view('dashboard.app.writing.actions.rebuild', compact('writing', 'fields'));

    }

    public function store(Request $request, $id)
    {
        // dd($request->all());

        $writing = Writing::find($id);
        $template = Template::find($writing->template_id);
        $blocks = Block::where('blocks.template_id', '=', $template->id)->get();

        $writingchild = WritingChild::where('writing_id', $id)->delete();
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

        Alert::success('Berhasil', 'Berhasil rebuild tulisan');
        return redirect()->route('dashboard.writing.edit', $writing->id);


    }
}
