<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }

    public function index() {
        //
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {
        if($request->input('article_id') > 0) {
            $comment = new Comment();
            $comment->article_id = $request->input('article_id');
            $comment->comment_text = $request->input('comment');
            $comment->save();
            return redirect('/article/' . $request->input('article_id'))->with('success', 'Comment was added');
        }

        $this->validate($request, [
            'title' => 'required|max:170|min:10',
            'anons' => 'required|max:1000|min:10',
            'text' => 'required|max:5000|min:10',
            'main_image' => 'nullable|image|max:2000',
        ]);

        if($request->hasFile('main_image')) {
            $file = $request->file('main_image')->getClientOriginalName();
            $image_name_without_ext = pathinfo($file, PATHINFO_FILENAME);

            $ext = $request->file('main_image')->getClientOriginalExtension();

            $image_name = $image_name_without_ext."_".time().".".$ext;
            $request->file('main_image')->storeAs('public/img/articles', $image_name);
        } else 
            $image_name = 'noimage.jpg';

        $article = new Article();
        $article->title = $request->input('title');
        $article->anons = $request->input('anons');
        $article->text = $request->input('text');
        $article->user_id = auth()->user()->id;
        $article->image = $image_name;
        $article->save();

        return redirect('/')->with('success', 'The article was added');
    }

    public function show($id)
    {
        $article = Article::find($id);
        // return view('articles.show')->with('article', $article);

        $comments = Comment::where('article_id', $id)->get();
        $data = ['article' => $article, 'comments' => $comments];
        return view('articles.show')->with('data', $data);
        
    }

    public function edit($id)
    {
        $article = Article::find($id);

        if(auth()->user()->id != $article->user_id)
            return redirect('/')->with('error', 'This is not your article!');

        return view('articles.edit')->with('article', $article);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|max:170|min:10',
            'anons' => 'required|max:1000|min:10',
            'text' => 'required|max:5000|min:10',
            'main_image' => 'nullable|image|max:2000'
        ]);

        if($request->hasFile('main_image')) {
            $file = $request->file('main_image')->getClientOriginalName();
            $image_name_without_ext = pathinfo($file, PATHINFO_FILENAME);

            $ext = $request->file('main_image')->getClientOriginalExtension();

            $image_name = $image_name_without_ext."_".time().".".$ext;
            $request->file('main_image')->storeAs('public/img/articles', $image_name);
        }

        $article = Article::find($id);
        $article->title = $request->input('title');
        $article->anons = $request->input('anons');
        $article->text = $request->input('text');

        if($request->hasFile('main_image')) {
            if($article->image != "noimage.jpg")
            Storage::delete('public/img/articles' . $article->image);

            $article->image = $image_name;
        }

        $article->save();

        return redirect('/')->with('success', 'The article was edited');
    }

    public function destroy($id)
    {
        $article = Article::find($id);
        if(auth()->user()->id != $article->user_id)
            return redirect('/')->with('error', 'This is not your article!');

            
        if($article->image != "noimage.jpg")
            Storage::delete('public/img/articles' . $article->image);

        $article->delete();
        return redirect('/')->with('success', 'The article was deleted');
    }
}
