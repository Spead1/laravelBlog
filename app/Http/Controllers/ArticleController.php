<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use App\Models\Category;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::paginate(10);
        return view('article.index', [
            'articles'=> $articles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('article.create', [
            'categories'=> Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleRequest $request)

    {
        $validated = $request->validated();

        Article::create([
            'title'=> $request->input('title'),
            'subtitle'=> $request->input('subtitle'),
            'content'=> $request->input('content'),
            'category_id' => $request->input('category'),
        ]);

        return redirect()->route('articles.index')->with('success', "L'article a bien été posté !");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('article.edit', [

            'article'=> $article,
            'categories'=> Category::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ArticleRequest $request, Article $article)
    {
          $article->title =  $request->input('title');
          $article->subtitle =  $request->input('subtitle');
          $article->content =  $request->input('content');
          $article->category_id =  $request->input('category');
          $article->save();

          return redirect()->route('articles.index')->with('success', "L'article a bien été modifié !");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Article $article){

        $article->delete();

        return redirect()->route("articles.index")->with("success", "l'article a bien été supprimé !");
    }
}
