<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;

class MainController extends Controller
{

    public function home()
    {
        return view('home');
    }

    public function index()
    {
        $articles = Article::paginate(6);
        $comments = Comment::class;
        return view('articles', [
            'articles' => $articles,
            'comments' => $comments
        ]);
    }

    public function show(Article $article){
        $comments = $article->comments()->with('user')->paginate(10);
        return view('article', [
            'article' => $article,
            'comments' => $comments
        ]);

    }

    public function countComments(Article $article)
    {
        $commentCount = $article->comments()->get()->count();

        return response()->json(['comment_count' => $commentCount]);
    }

}
