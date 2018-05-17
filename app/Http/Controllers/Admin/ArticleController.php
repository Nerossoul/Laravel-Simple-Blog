<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.articles.index', [
          'articles' => Article::orderBy('created_at', 'desc')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() // data for show create form
    {
        return view('admin.articles.create', [

          'article'    => [],
          'categories' => Category::with('children')->where('parent_id', 0)->orderBy('created_at', 'asc')->get(),
          'delimiter'  => ''

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) // write article data to table articles
    {
        $request['description_short'] = strip_tags(mb_substr($request['description'], 0, 104));
        $article = Article::create($request->all());

        //categories
        if ($request->input('categories')) :
          $article->categories()->attach($request->input('categories'));
        endif;

        return redirect()->route('admin.article.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
      return view('admin.articles.edit', [

        'article'    => $article,
        'categories' => Category::with('children')->where('parent_id', 0)->orderBy('created_at', 'asc')->get(),
        'delimiter'  => ''

      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $request['description_short'] = strip_tags(mb_substr($request['description'], 0, 104));
        $article->update($request->except('slug'));

        $article->categories()->detach();
        if ($request->input('categories')) :
          $article->categories()->attach($request->input('categories'));
        endif;

        return redirect()->route('admin.article.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
      $article->categories()->detach();
      $article->delete();
      return redirect()->route('admin.article.index');
    }
}
