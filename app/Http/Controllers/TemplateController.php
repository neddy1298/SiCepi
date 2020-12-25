<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Template;
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
        return view('app.template.actions.create');

    }

    // public function fill(Request $request)
    // {
    //     Writing::create([
    //         'name' => $request->name,
    //         'catalog_id' => $request->catalog_id,
    //         'template_id' => $request->template_id
    //     ]);

    //     $template = Writing::join('catalogs', 'catalogs.id' ,'=' ,'writings.catalog_id')
    //     ->join('templates', 'templates.id' ,'=' ,'writings.template_id')
    //     ->select('writings.*', 'catalogs.catalog' ,'templates.template' ,'templates.text')
    //     ->first();

    //     // dd($template);
    //     return view('app.writing.actions.fill', compact('template'));

    // }

    // public function store(Request $request)
    // {
    //     dd($request->all());
    //     Writing::update($request->all());
    // }
}
