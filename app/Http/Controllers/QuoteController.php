<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Quote;
use App\Models\Favorite;
use App\Models\User;

use Alert;


class QuoteController extends Controller
{
    // Search
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

        return view('front.pages.search', compact('quotes', 'key', 'search'));
    }

    // User Quote
    public function user_quote()
    {
        $from = null;
        $quotes = Quote::where('quotes.user_id', auth()->user()->id)->where('saved_from', $from)->get();

        // dd($quotes);

        return view('front.pages.user.user_quote.quote', compact('quotes'));
    }

    // Create Quote
    public function create_quote()
    {
        return view('front.pages.user.actions.create_quote');
    }

    // Store Created Quote
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

    // Edit Quote
    public function edit_quote($id)
    {
        $quote = Quote::find($id);
        return view('front.pages.user.actions.edit_quote', compact('quote'));
    }

    // Update Edited Quote
    public function quote_update(Request $request, $id)
    {
        if ($request->topics) {
            $topics = implode(',', $request->topics);
        }

        $quote = Quote::find($id);

        $quote->update($request->all());

        Alert::success('Berhasil', 'Quote berhasil diubah');
        return redirect()->back();
    }

    // Save Quote
    public function save()
    {
        $quotes = Quote::where('quotes.user_id', auth()->user()->id)->where('saved_from', '!=', null)->get();


        return view('front.pages.user.user_quote.save', compact('quotes'));

    }

    // Store Saved Quote
    public function save_store($id)
    {
        $limit = auth()->user()->quote_limit;
        if ($limit <= 0 ) {
            Alert::warning('Gagal', 'Kamu telah mencapai batas pembuatan tulisan. Silahkan upgrade untuk dapat membuat & menyimpan lebih banyak quote');
            return redirect()->back();

        }

        $limitUpdate = User::find(auth()->user()->id);
        $limitUpdate->update([
            'quote_limit' => $limitUpdate->quote_limit - 1
        ]);

        $quote = Quote::find($id);

        $save = Quote::create([
            'user_id' => auth()->user()->id,
            'quote_id' => $id,
            'author' => $quote->author,
            'quote' => $quote->quote,
            'topics' => $quote->topics,
            'saved_from' => $quote->user_id,
        ]);

        Alert::success('Berhasil', 'Quote berhasil disimpan');
        return redirect()->back();

    }

    // Destroy Saved Quote
    public function save_destroy($id)
    {
        // dd('test');

        $limitUpdate = User::find(auth()->user()->id);
        $limitUpdate->update([
            'quote_limit' => $limitUpdate->quote_limit + 1
        ]);

        $quote = Quote::find($id);

        $quote->delete();

        Alert::success('Berhasil', 'Quote berhasil dihapus');
        return redirect()->back();
    }

    // User Favorite
    public function favorite()
    {
        $quotes = Favorite::where('favorites.user_id', auth()->user()->id)
        ->join('quotes', 'quotes.id', '=', 'favorites.quote_id')
        ->select('quotes.*')
        ->get();

        return view('front.pages.user.user_quote.favorite', compact('quotes'));

    }

    // User Favorite Store
    public function favorite_store($id)
    {
        $favorite = Favorite::where('quote_id', $id)->where('user_id', auth()->user()->id)->get();


        if($favorite->isEmpty()){

            $favorite = Favorite::create([
                'quote_id' => $id,
                'user_id' => auth()->user()->id,
            ]);
        }

        Alert::success('Berhasil', 'Quote favorite kamu berhasil disimpan');
        return redirect()->back();

    }

    // Delete Favorite Quote
    public function favorite_destroy($id)
    {
        $favorite = Favorite::where('id', $id)->where('user_id', auth()->user()->id)->get()->first();

        $favorite->delete();

        Alert::success('Berhasil', 'Berhasil menghapus quote dari list favorite kamu');
        return redirect()->back();
    }
}
