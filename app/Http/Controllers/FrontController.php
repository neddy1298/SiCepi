<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Writing;

class FrontController extends Controller
{
    public function login()
    {
        return view('front.layouts.login');
    }

    public function index()
    {
        $writings = Writing::join('users', 'users.id', '=', 'writings.user_id')
        ->where('users.is_admin', 1)
        ->select('writings.*', 'users.name as user_name')
        ->get();

        foreach ($writings as $writing) {
            foreach (explode(',',$writing->topics) as $topic) {
                $topics[] = $topic;
            }
        }
        $topics = array_unique($topics);

        return view('front.pages.home', compact('writings', 'topics'));
    }

    public function topics()
    {
        return view('front.pages.topics.view');
    }

    public function by_topic($topic)
    {
        $writings = Writing::where('topics', 'like', "%{$topic}%")->latest()->get();

        return view('front.pages.topics.writing', compact('writings'));
    }

    public function author()
    {
        return view('front.pages.author.view');
    }

    public function by_author($author)
    {
        $writings = Writing::where('author', 'like', "%{$author}%")->latest()->get();

        return view('front.pages.author.writing', compact('writings'));
    }

    public function by_category($category)
    {
        $writings = Writing::where('category', 'like', "%{$category}%")->latest()->get();

        return view('front.pages.category.view', compact('writings'));
    }




}
