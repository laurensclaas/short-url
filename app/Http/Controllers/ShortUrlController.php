<?php

namespace App\Http\Controllers;

use App\Models\ShortUrl;
use Illuminate\Http\Request;


class ShortUrlController extends Controller
{
    public function index(){
        //dd('index');
        $short_urls = ShortUrl::all();

        return view('short-urls\overview',['short_urls' => $short_urls]);
    }

    public function create(){
        dd('create');
    }

    public function store() {
        dd('store');
    }

    public function delete(){
        dd('delete');
    }

    public function update(){
        dd('update');
    }
}
