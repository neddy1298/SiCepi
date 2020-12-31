<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quote;

class FrontController extends Controller
{
    public function login()
    {
        return view('app.front.pages.user.login');
    }

    public function index()
    {
        $quotes = Quote::join('users', 'users.id', '=', 'quotes.user_id')
        ->select('quotes.*', 'users.name as user_name')
        ->get();

        // $favorites = Favorite::where('favorites.user_id', auth()->user()->id)->get();
        // dd($quotes);

        return view('app.front.pages.home', compact('quotes'));
    }

    public function topics()
    {
        return view('app.front.pages.topics.view');
    }

    public function quoteby_topic($topic)
    {
        $quotes = Quote::where('topics', 'like', "%{$topic}%")->latest()->get();

        return view('app.front.pages.topics.quotes', compact('quotes'));
    }

    public function author()
    {
        return view('app.front.pages.author.view');
    }

    public function quoteby_author($author)
    {
        $quotes = Quote::where('author', 'like', "%{$author}%")->latest()->get();

        return view('app.front.pages.author.quotes', compact('quotes'));
    }




}
