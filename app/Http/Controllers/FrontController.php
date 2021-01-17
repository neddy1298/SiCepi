<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quote;

class FrontController extends Controller
{
    public function login()
    {
        return view('front.layouts.login');
    }

    public function index()
    {
        $quotes = Quote::join('users', 'users.id', '=', 'quotes.user_id')
        ->where('users.is_admin', 1)
        ->select('quotes.*', 'users.name as user_name')
        ->get();

        foreach ($quotes as $quote) {
            foreach (explode(',',$quote->topics) as $topic) {
                $topics[] = $topic;
            }
        }
        $topics = array_unique($topics);

        return view('front.pages.home', compact('quotes', 'topics'));
    }

    public function topics()
    {
        return view('front.pages.topics.view');
    }

    public function quoteby_topic($topic)
    {
        $quotes = Quote::where('topics', 'like', "%{$topic}%")->latest()->get();

        return view('front.pages.topics.quotes', compact('quotes'));
    }

    public function author()
    {
        return view('front.pages.author.view');
    }

    public function quoteby_author($author)
    {
        $quotes = Quote::where('author', 'like', "%{$author}%")->latest()->get();

        return view('front.pages.author.quotes', compact('quotes'));
    }




}
