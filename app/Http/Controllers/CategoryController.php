<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Writing;
use App\Models\WritingChild;
use App\Models\Catalog;
use Alert;

class CategoryController extends Controller
{
    public function index($id)
    {
        $writings = Writing::where('writings.catalog_id', $id)->where('writings.user_id', 1)
        ->join('catalogs', 'catalogs.id' ,'=' ,'writings.catalog_id')
        ->join('users', 'users.id' ,'=' ,'writings.user_id')
        ->select('writings.*', 'catalogs.catalog', 'users.name as user_name')
        ->get();

        $category = Catalog::find($id);
        // dd($writings);

        return view('front.pages.category.view', compact('writings','category'));
    }

    public function detail($id)
    {
        $writing = Writing::join('templates', 'templates.id', '=', 'writings.template_id')
        ->join('catalogs', 'catalogs.id', '=', 'writings.catalog_id')
        ->join('users', 'users.id', '=', 'writings.user_id')
        ->select('writings.*', 'templates.template_name', 'catalogs.catalog', 'users.name as user_name')
        ->where('writings.id', $id)
        ->get()->first();



        $blocks = WritingChild::where('writing_id', $id)->get();
        // dd($blocks);
        // dd($writings);

        return view('front.pages.category.detail', compact('writing','blocks'));
    }

    public function writing_save($id)
    {
        $writing = Writing::find($id);
        $blocks = WritingChild::where('writing_children.writing_id', $id)->get();


        $writing = Writing::create([
            'name' => $writing->name,
            'template_id' => $writing->template_id,
            'catalog_id' => $writing->catalog_id,
            'user_id' => auth()->user()->id,
            'field' => $writing->field,
        ]);

        foreach ($blocks as $block) {
            WritingChild::create([
                'writing_id' => $writing->id,
                'writing_name' => $block->writing_name,
                'writing_text' => $block->writing_text,
            ]);
        }

        Alert::success('Berhasil', 'Kitupan berhasil disimpan');
        return redirect()->back();
        // dd($block);
    }
}
