<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Quote;
use App\Models\Favorite;
use App\Models\Saved;
use App\Models\User;

use Alert;


class QuoteController extends Controller
{
    public function search(Request $request)
    {
        if ($request->key == "Topik") {
            $quotes = Quote::where('topics', 'like', "%{$request->search}%")
            ->get();
        }elseif($request->key == "Author"){
            $quotes = Quote::where('author', 'like', "%{$request->search}%")
            ->get();
        }else{
            $quotes = Quote::where('author', 'like', "%{$request->search}%")
            ->orWhere('topics', 'like', "%{$request->search}%")
            ->orWhere('quote', 'like', "%{$request->search}%")
            ->get();
        }

        $key = $request->key;
        $search = $request->search;

        return view('app.front.pages.search', compact('quotes', 'key', 'search'));
    }
    public function create_quote()
    {
        return view('app.front.pages.user.create_quote');
    }

    public function quote_store(Request $request)
    {
        $limit = auth()->user()->quote_limit;
        if ($limit <= 0 ) {
            Alert::warning('Gagal', 'Kamu telah mencapai batas pembuatan tulisan');
            return redirect()->route('user.quote');

        }else{
            $limitUpdate = User::find(auth()->user()->id);
            $limitUpdate->update([
                'quote_limit' => $limitUpdate->quote_limit - 1
            ]);
        }

        $topics = implode(',', $request->topics);

        $quote = Quote::create([
            'user_id' => $request->user_id,
            'author' => $request->author,
            'quote' => $request->quote,
            'topics' => $topics,
        ]);

        return redirect()->back();
    }

    public function edit_quote($id)
    {
        $quote = Quote::find($id);
        return view('app.front.pages.user.edit_quote', compact('quote'));
    }

    public function quote_update(Request $request, $id)
    {
        if ($request->topics) {
            $topics = implode(',', $request->topics);
        }

        $quote = Quote::find($id);

        $quote->update($request->all());

        return redirect()->back();
    }

    public function save_store($id)
    {
        $save = Saved::where('quote_id', $id)->where('user_id', auth()->user()->id)->get();


        if($save->isEmpty()){

            $save = Saved::create([
                'quote_id' => $id,
                'user_id' => auth()->user()->id,
            ]);
        }

        return redirect()->back();

    }

    public function save()
    {
        $quotes = Saved::where('saveds.user_id', auth()->user()->id)
        ->join('quotes', 'quotes.id', '=', 'saveds.quote_id')
        ->select('quotes.*')
        ->get();


        return view('app.front.pages.user.save', compact('quotes'));

    }

    public function favorite_store($id)
    {
        $favorite = Favorite::where('quote_id', $id)->where('user_id', auth()->user()->id)->get();


        if($favorite->isEmpty()){

            $favorite = Favorite::create([
                'quote_id' => $id,
                'user_id' => auth()->user()->id,
            ]);
        }

        return redirect()->back();

    }

    public function favorite()
    {
        $quotes = Favorite::where('favorites.user_id', auth()->user()->id)
        ->join('quotes', 'quotes.id', '=', 'favorites.quote_id')
        ->select('quotes.*')
        ->get();


        return view('app.front.pages.user.favorite', compact('quotes'));

    }

    public function user_quote()
    {
        $quotes = Quote::where('quotes.user_id', auth()->user()->id)->get();

        return view('app.front.pages.user.user_quote', compact('quotes'));
    }
}
