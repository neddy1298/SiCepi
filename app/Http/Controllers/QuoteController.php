<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Quote;
use App\Models\Favorite;
use App\Models\User;
use App\Models\Catalog;
use App\Models\Template;
use App\Models\Block;
use App\Models\Tag;
use App\Models\Writing;
use App\Models\WritingChild;
use App\Models\PromoCode;

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
        }elseif($request->key == "Category"){
            $writings = Catalog::where('catalog', 'like', "%{$request->search}%")
            ->join('writings', 'writings.catalog_id' ,'=' ,'catalogs.id')
            ->join('users', 'users.id' ,'=' ,'writings.user_id')
            ->select('writings.*', 'catalogs.catalog', 'users.name as user_name')
            ->get();

        $category = $request->search;
        return view('front.pages.category.view', compact('writings','category'));

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

        $writings = Writing::where('writings.user_id', auth()->user()->id)
        ->join('catalogs', 'catalogs.id' ,'=' ,'writings.catalog_id')
        ->join('users', 'users.id' ,'=' ,'writings.user_id')
        ->select('writings.*', 'catalogs.catalog', 'users.name as user_name')
        ->get();

        // $category = Catalog::find($id);

        // dd($quotes);

        return view('front.pages.user.user_quote.quote', compact('quotes', 'writings'));
    }

    // User Other Quote
    public function user_other_quote()
    {

        $from = null;

        $writings = Writing::where('writings.user_id', auth()->user()->id)
        ->join('catalogs', 'catalogs.id' ,'=' ,'writings.catalog_id')
        ->join('users', 'users.id' ,'=' ,'writings.user_id')
        ->select('writings.*', 'catalogs.catalog', 'users.name as user_name')
        ->get();

        // $category = Catalog::find($id);

        // dd($quotes);

        return view('front.pages.user.user_quote.other_quote', compact('writings'));
    }

    // Create Other
    public function create_other()
    {
        $catalogs = Catalog::get();
        $templates = Template::where('status', 'Published')->get();
        $blocks = Block::get();
        return view('front.pages.user.actions.other.create_other', compact('catalogs', 'templates', 'blocks'));
    }

    // Store Created Other
    public function other_store(Request $request)
    {
        $limit = auth()->user()->writing_limit;
        if ($limit <= 0 ) {
            Alert::warning('Gagal', 'Kamu telah mencapai batas pembuatan tulisan, beli tulisan untuk menambah tulisanmu');
            // Alert::html('Html Title', 'Html Code', 'Type');
            return redirect()->route('dashboard.pricing');

        }else{
            $limitUpdate = User::find(auth()->user()->id);
            $limitUpdate->update([
                'writing_limit' => $limitUpdate->writing_limit - 1
            ]);
        }
        // dd($limit);
        $writing = Writing::create($request->all());

        $blocks = Block::where('blocks.template_id', $writing->template_id)->get();
        // dd($blocks);

        if($blocks->count() == 1){
            $block = Block::where('blocks.template_id', $writing->template_id)->get()->first();

            // dd($block);
            if ($block->tags == "") {

                $writingchild = WritingChild::create([
                    'writing_id' => $writing->id,
                    'writing_name' => $block->block_name,
                    'writing_text' => $block->block_body,
                ]);

                return redirect()->route('user.edit_other', $writing->id);
            }
        }else{
            $block = Block::where('blocks.template_id', $writing->template_id)->get()->first();

            if ($block->tags == "") {
                foreach ($blocks as $block) {

                    $writingchild = WritingChild::create([
                        'writing_id' => $writing->id,
                        'writing_name' => $block->block_name,
                        'writing_text' => $block->block_body,
                    ]);
                }
                return redirect()->route('user.edit_other', $writing->id);
            }

        }

        return redirect()->route('user.build_other', $writing->id);
    }

    public function build_other(Request $request, $id)
    {


        $writing = Writing::join('catalogs', 'catalogs.id' ,'=' ,'writings.catalog_id')
        ->join('templates', 'templates.id' ,'=' ,'writings.template_id')
        ->select('writings.*', 'catalogs.catalog' ,'templates.template_name' ,'templates.template_intro')
        ->where('writings.id', '=', $id)
        ->get()->first();


        // dd($writing);

        $blocks = Block::where('blocks.template_id', $writing->template_id)->get();

        // dd($blocks);
        $field = [];



        foreach ($blocks as $block) {

            array_push($field, $block->tags);
        }


            // Filtering Data
            $block = implode(' ', array_values($field));
            $block = collect(explode(" ", $block))->unique();
            $block = collect($block)->implode(' ');
            $blocks = collect(explode(" ", $block));


        $fields = [];
        foreach ($blocks as $block) {

            array_push($fields ,Tag::where('tags.tag_field', 'like', "%{$block}%")->get()->first());
        }
        // dd($fields);

        return view('front.pages.user.actions.other.build_other', compact('writing', 'fields'));

    }

    public function build_other_store(Request $request, $id)
    {
        // dd($request->all());

        $writing = Writing::find($id);
        $template = Template::find($writing->template_id);
        $blocks = Block::where('blocks.template_id', '=', $template->id)->get();

        // dd($template);
        $result = "";



        foreach($blocks as $block){


            $fields = collect(explode(" ", $block->tags));
            // dd($fields);


            // $result = $block->block_body;
            $result = collect(explode("{{", $block->block_body));
            $result = collect($result)->implode('');
            $result = collect(explode("}}", $result));
            $result = collect($result)->implode(' ');

            // dd($result);


            foreach ($fields as $field) {

                $result = str_replace($field,$request->$field, $result);
            // dd($result);


            }


            $writingchild = WritingChild::create([
                'writing_id' => $id,
                'writing_name' => $block->block_name,
                'writing_text' => $result,
            ]);

        }
        // dd($result);

        $writing->update([
            'name' => $request->name,
            'field' => $request->except(['_token', 'name'])
        ]);

        Alert::success('Berhasil', 'Tulisanmu berhasil dibuat');
        return redirect()->route('user.edit_other', $writing->id);


    }

    public function edit_other($id)
    {
        $writing = Writing::where('writings.id', $id)
        ->join('catalogs', 'catalogs.id', '=', 'writings.catalog_id')
        ->join('templates', 'templates.id', '=', 'writings.template_id')
        ->select('writings.*', 'catalogs.catalog', 'templates.template_name',)
        ->get()->first();

        if ($writing->user_id != auth()->user()->id) {

            Alert::error('Error', 'Kamu tidak memiliki hak untuk merubah kutipan');
            return redirect()->back();
        }

        $writingchilds = WritingChild::where('writing_id', $id)->get();
        // dd($writingchilds);

        return view('front.pages.user.actions.other.edit_other', compact('writing', 'writingchilds'));
    }

    public function update_other(Request $request, $id)
    {
        $writing = Writing::find($id);
        $writingchild = WritingChild::where('writing_children.writing_id', '=', $writing->id)->get();

        $result = $request->except('name', '_token');

        foreach($writingchild as $block){

            $writingchildedit = WritingChild::where('writing_children.id', '=', $result['child_id_'.$block->id])->get()->first();

            $writingchildedit->update([
                'writing_text' => $result['block_body_'.$block->id],
            ]);

        }


        $writing->update([
            'name' => $request->name,
        ]);


        Alert::success('Berhasil', 'Tulisanmu berhasil diubah');
        return redirect()->back();


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

        $quote = Quote::find($id);

        if ($request->topics) {
            $topics = implode(',', $request->topics);
        }else{
            $topics = $quote->topics;
        }


        // dd($quote);

        if ($quote->saved_from) {

            $limit = auth()->user()->quote_limit;
            if ($limit <= 0 ) {
                Alert::warning('Gagal', 'Kamu telah mencapai batas pembuatan tulisan. Silahkan upgrade untuk dapat membuat & menyimpan lebih banyak quote');
                return redirect()->back();

            }

            $limitUpdate = User::find(auth()->user()->id);
            $limitUpdate->update([
                'quote_limit' => $limitUpdate->quote_limit - 1
            ]);

            Quote::create([
                'user_id' => $request->user_id,
                'author' => $request->author,
                'quote' => $request->quote,
                'topics' => $topics,
            ]);
            Alert::success('Berhasil', 'Quote berhasil diubah dan disimpan di kutipanmu');


        }else{

            $quote->update($request->all());
            Alert::success('Berhasil', 'Quote berhasil diubah');
        }


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

    // Purchase
    public function purchase()
    {
        return view('front.pages.user.purchase.view');
    }

    public function purchase_store(Request $request)
    {
        $promo_code = PromoCode::where('code', '=', $request->code)->get()->first();
        if(!$promo_code){
            Alert::error('Gagal', 'Gagal mengaktifkan kode promo, Periksa kembali kode promo kamu');
            return redirect()->back();
        }
        $user = User::find(auth()->user()->id);
        $user->update([
            'writing_limit' => $user->writing_limit + $promo_code->value
        ]);

        Alert::success('Berhasil', 'Berhasil mengaktifkan kode promo');
        return redirect()->back();
    }
}
