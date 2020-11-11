<?php

namespace App\Http\Controllers;

use App\Models\ShortUrl;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class ShortUrlController extends Controller
{
    public function index(){
        //dd('index');
        $short_urls = ShortUrl::all();
        
        return view('short-urls.overview',['shortUrls' => $short_urls]);
    }

    public function create(){
       // dd('create');
       return view('short-urls.create');
    }

    public function edit($id) {
        //$target = ShortUrl::find($shorturl);
        //dd($request);
        $short = ShortUrl::find($id);

        //dd($short);
        return view('short-urls.edit', ['short_url'=> $short]);
    }
    public function store(Request $request) {
        $val_url = $this->validateUrl();
        $val_url['short_url'] = Str::random(6);
        $val_url['counter'] = 0;
        $short =  ShortUrl::create($val_url);
        return view('short-urls.succes',['short_url' => $short]);
    }

    

    public function delete(ShortUrl $shortUrl){
        
        $shortUrl->delete();
        //dd('delete');
        return redirect(route('short-urls.overview'));
    }

    public function update($id){
        
        $val_url = $this->validateUrl();
        $short = ShortUrl::find($id);

/*         if(request('category_id') == "null")
        {
            //d("null");
            $val_ad['category_id'] = null;
        } */

        $short->update($val_url);


        return redirect(route('short-urls.overview'));
        //dd('update');
    }

    public function redirectShortUrl($short_url) {
        $short_url = ShortUrl::where('short_url', $short_url)->first();
        $short_url->counter++;
        $short_url->save();
        return redirect($short_url->url);
    }

    public function validateUrl()
    {
        
        return  request()->validate([
            'url' => ['required','string'],
            'short_url' => ['string'],
        ]);
    }
}
