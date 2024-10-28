<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;

class StaticController extends Controller {
    public function index() {
        $articles = Article::all();
        return view('static/index')->with('articles', $articles); // compact('title')
    }

    public function about() {
        $data = [
            'title' => 'About us page',
            'params' => ['BMW', 'Audi', 'Ferrari']
        ];
        return view('static/about')->with($data);
    }

    public function blog() {
        $title = "Our blog's page";
        return view('static/blog', compact('title'));
    }
}
