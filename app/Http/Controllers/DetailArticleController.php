<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;

class DetailArticleController extends Controller
{
    public function index($judul)
    {
        $article = Posts::where('judul', $judul)->first();
        return view('article_detail',compact('article'));
    }
}
