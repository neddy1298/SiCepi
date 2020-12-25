<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Writing;
use App\Models\Catalog;
use App\Models\Template;

class WritingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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
        return view('app.writing.actions.create', compact('catalogs', 'templates'));

    }

    public function fill(Request $request)
    {
        Writing::create([
            'name' => $request->name,
            'catalog_id' => $request->catalog_id,
            'template_id' => $request->template_id
        ]);

        $template = Writing::join('catalogs', 'catalogs.id' ,'=' ,'writings.catalog_id')
        ->join('templates', 'templates.id' ,'=' ,'writings.template_id')
        ->select('writings.*', 'catalogs.catalog' ,'templates.template' ,'templates.text')
        ->first();

        // dd($template);
        return view('app.writing.actions.fill', compact('template'));

    }

    public function store(Request $request)
    {
        dd($request->all());
        Writing::update($request->all());
    }
    public function user_writing()
    {
        # code...
    }
}
