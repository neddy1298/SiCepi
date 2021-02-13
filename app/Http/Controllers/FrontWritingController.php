<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Save;
use App\Models\Favorite;
use App\Models\User;
use App\Models\Writing;
use App\Models\Package;
use App\Models\PurchaseHistory;

use Alert;


class FrontWritingController extends Controller
{
    // Search
    public function search(Request $request)
    {
        if ($request->key == "Topik") {
            $writings = Writing::where('topics', 'like', "%{$request->search}%")
            ->get();
        }elseif($request->key == "Author"){
            $writings = Writing::where('author', 'like', "%{$request->search}%")
            ->get();
        }elseif($request->key == "Category"){
            $writings = Writing::where('category', 'like', "%{$request->search}%")
            ->get();

        return view('front.pages.category.view', compact('writings'));

        }else{
            $writings = Writing::where('author', 'like', "%{$request->search}%")
            ->orWhere('topics', 'like', "%{$request->search}%")
            ->orWhere('category', 'like', "%{$request->search}%")
            ->orWhere('text', 'like', "%{$request->search}%")
            ->orWhere('name', 'like', "%{$request->search}%")
            ->get();
        }

        $key = $request->key;
        $search = $request->search;

        return view('front.pages.search', compact('writings', 'key', 'search'));
    }

    // User kutipan
    public function writing()
    {

        $writings = Writing::where('writings.user_id', auth()->user()->id)->get();

        return view('front.pages.user.writing.view', compact('writings'));
    }

    public function writing_category($category)
    {
        $writings = Writing::where('writings.user_id', auth()->user()->id)->where('category', $category)->get();

        return view('front.pages.user.writing.view', compact('writings'));
    }

    // Create kutipan
    public function create()
    {
        return view('front.pages.user.actions.create');
    }

    // Store Created kutipan
    public function store(Request $request)
    {
        // dd($request->all());
        $limit = auth()->user()->limit;
        if ($limit <= 0 ) {
            Alert::warning('Gagal', 'Kamu telah mencapai batas pembuatan Kutipan, beli Kutipan untuk menambah Kutipanmu');
            return redirect()->route('dashboard.pricing');

        }else{
            $limitUpdate = User::find(auth()->user()->id);
            $limitUpdate->update([
                'limit' => $limitUpdate->limit - 1
            ]);
        }
        $topics = implode(',', $request->topics);

        $writing = Writing::create([
            'user_id' => $request->user_id,
            'name' => $request->name,
            'text' => $request->text,
            'category' => $request->category,
            'topics' => $topics,
            'author' => $request->author,
        ]);
        Alert::success('Berhasil', 'Kutipan berhasil dibuat');

        return redirect()->route('user.writing');
    }



    public function show($id)
    {
        $writing = Writing::find($id);
        return view('front.pages.writings.view', compact('writing'));
    }

    // Edit kutipan
    public function edit($id)
    {

        $writing = Writing::find($id);
        $save = 0;
        if(!$writing){

            $writing = Save::join('writings', 'writings.id', $id)
            ->where('saves.user_id', auth()->user()->id)
            ->select('writings.*')->get();
            $save = 1;
        }
        return view('front.pages.user.actions.edit', compact('writing', 'save'));
    }

    // Update Edited kutipan
    public function update(Request $request, $id)
    {

        $writing = Writing::find($id);
        $limit = auth()->user()->limit;
        if ($request->topics) {
            $topics = implode(',', $request->topics);
        }else{
            $topics = $writing->topics;
        }

        if ($writing->user_id != auth()->user()->id) {

            if ($limit <= 0 ) {
                Alert::warning('Gagal', 'Kamu telah mencapai batas pembuatan Kutipan. Silahkan upgrade untuk dapat membuat & menyimpan lebih banyak kutipan');
                return redirect()->back();

            }

            $limitUpdate = User::find(auth()->user()->id);
            $limitUpdate->update([
                'limit' => $limitUpdate->limit - 1
            ]);

            // Alert::warning('Gagal', 'contoh');
            //     return redirect()->back();

                // dd($request->all());

            Writing::create([
                'user_id' => auth()->user()->id,
                'name' => $request->name,
                'author' => $writing->author,
                'text' => $request->text,
                'category' => $writing->category,
                'topics' => $topics,
                'saved_from' => $writing->user_id,
            ]);
            Alert::success('Berhasil', 'kutipan berhasil diubah dan disimpan di kutipanmu');
            return redirect()->route('user.writing');
        }else{

            $writing->update($request->all());
            Alert::success('Berhasil', 'kutipan berhasil diubah');
        }


        return redirect()->back();
    }

    public function writing_destroy($id)
    {

        $writing = Writing::find($id);

        $writing->delete();

        $limitUpdate = User::find(auth()->user()->id);
        $limitUpdate->update([
            'limit' => $limitUpdate->limit + 1
        ]);
        Alert::success('Berhasil', 'kutipan berhasil dihapus');
        return redirect()->back();
    }


    // Save kutipan
    public function save()
    {

        $writings = Save::join('writings', 'writings.id', 'saves.writing_id')
        ->where('saves.user_id', auth()->user()->id)
        ->select('writings.*', 'saves.id as save_id')->get();

        return view('front.pages.user.writing.save', compact('writings'));

    }

    public function save_category($category)
    {
        $writings = Save::join('writings', 'writings.id', 'saves.writing_id')
        ->where('saves.user_id', auth()->user()->id)
        ->where('category', $category)
        ->select('writings.*', 'saves.id as save_id')->get();

        return view('front.pages.user.writing.save', compact('writings'));
    }

    // Store Saved kutipan
    public function save_store($id)
    {
        $save = Save::where('writing_id', $id)->where('user_id', auth()->user()->id)->get();
        // dd($save);

        if($save->isEmpty()){

            Save::create([
                'user_id' => auth()->user()->id,
                'writing_id' => $id,
            ]);

            Alert::success('Berhasil', 'Kutipan berhasil disimpan');

        }else{

            Alert::error('Gagal', 'kutipan sudah disimpan');
        }

        return redirect()->back();

    }

    // Destroy Saved kutipan
    public function save_destroy($id)
    {
        $writing = Save::where('id', $id)->where('user_id', auth()->user()->id)->get()->first();

        $writing->delete();

        Alert::success('Berhasil', 'kutipan berhasil dihapus');
        return redirect()->back();


    }

    // User Favorite
    public function favorite()
    {
        $writings = Favorite::where('favorites.user_id', auth()->user()->id)
        ->join('writings', 'writings.id', 'favorites.writing_id')
        ->select('writings.*', 'favorites.id as favorite_id')
        ->get();

        // dd($writings);

        return view('front.pages.user.writing.favorite', compact('writings'));

    }

    public function favorite_category($category)
    {

        $writings = Favorite::join('writings', 'writings.id', 'favorites.writing_id')
        ->where('favorites.user_id', auth()->user()->id)
        ->where('category', $category)
        ->select('writings.*', 'favorites.id as favorite_id')->get();

        return view('front.pages.user.writing.favorite', compact('writings'));
    }

    // User Favorite Store
    public function favorite_store($id)
    {
        $favorite = Favorite::where('writing_id', $id)->where('user_id', auth()->user()->id)->get();
        // dd($favorite);

        if($favorite->isEmpty()){

            // dd('test1');
            $favorite = Favorite::create([
                'user_id' => auth()->user()->id,
                'writing_id' => $id,
                ]);
                Alert::success('Berhasil', 'kutipan favorite kamu berhasil disimpan');
        }else{

            Alert::error('Gagal', 'kutipan sudah menjadi favorite kamu');
        }


        return redirect()->back();

    }

    // Delete Favorite kutipan
    public function favorite_destroy($id)
    {
        // dd($id);
        $favorite = Favorite::find($id);
        $favorite->delete();

        Alert::success('Berhasil', 'Berhasil menghapus kutipan dari list favorite kamu');
        return redirect()->back();
    }

    // Purchase
    public function purchase()
    {
        $packages = Package::get();
        return view('front.pages.user.purchase.view', compact('packages'));
    }

    public function purchase_store(Request $request, $id)
    {
        $packages = Package::find($id);

        $user_id = auth()->user()->id;
        $history = PurchaseHistory::create([
            'name' => $packages->name,
            'code' => "PYM".$user_id."D".now()->format("dmY"),
            'method' => $request->method,
            'price' => $packages->price,
            'value' => $packages->value,
            'user_id' => $user_id,
        ]);

        // Alert::success('Berhasil', 'Berhasil mengaktifkan kode promo');
        Alert::html('Bayar',
        '
        <div class="row text-center">
            <div class="col-12">
                <span>'. $history->code .'</span>
            </div>
            <div class="col-12">
                <span>Silahkan lakukan pembayaran sebesar</span>
            </div>
            <div class="col-12 mt-3 mb-2">
                <h3>Rp.'.$packages->price.'</h3><br>
                <span>Ke rekening BCA</span>
            </div>

            <div class="ml-4 col-4 mb-3">
                <img src="'. public_path() .'/assets/img/bca_logo.png" width="100%">
            </div>
            <div class="col-auto">
                <div class="row">
                    <h2>123456789</h2>
                </div>
                <div class="row">
                    <small>SICEPI INDONESIA</small>
                </div>
            </div>

        </div>', 'info')->autoClose(false);
        return redirect()->route('user.purchase_history');
    }

    public function purchase_history()
    {
        $histories = PurchaseHistory::where('user_id', auth()->user()->id)->get();

        return view('front.pages.user.purchase.history', compact('histories'));

    }
}
