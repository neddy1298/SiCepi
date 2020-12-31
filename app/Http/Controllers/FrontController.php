<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function login()
    {
        return view('app.front.pages.user.login');
    }

    public function index()
    {
        return view('app.front.pages.home');
    }

    public function topics()
    {
        return view('app.front.pages.topics.view');
    }

    public function quoteby_topic($id)
    {
        return view('app.front.pages.topics.quotes');
    }

    public function author()
    {
        return view('app.front.pages.author.view');
    }

    public function quoteby_author($id)
    {
        return view('app.front.pages.author.quotes');
    }

    public function create_quote()
    {
        return view('app.front.pages.user.create_quote');
    }

    public function favorite($id)
    {
        return view('app.front.pages.user.favorite');

    }
}
