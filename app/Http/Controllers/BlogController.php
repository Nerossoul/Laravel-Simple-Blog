<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\Article;


class BlogController extends Controller
{

    public function mainPage() {
      $main_categorues = Category::where('parent_id', 0)->orderBy('created_at', 'asc')->get();
      return view('blog.home',[
        'categories' => $main_categorues->where('published', 1)
      ]);
    }

    public function category($slug) {
      $category = Category::where('slug', $slug)->first();
      return view('blog.category', [
        'category'=>$category,
        'articles'=>$category->articles()->where('published', 1)->orderBy('created_at', 'asc')->get()//->paginate(1000)
        ]);
    }

    public function ajaxCategory($slug) {
      $category = Category::where('slug', $slug)->first();
      return view('blog.ajax_category', [
        'category'=>$category,
        'articles'=>$category->articles()->where('published', 1)->orderBy('created_at', 'asc')->get()//->paginate(1000)
        ]);
    }

    public function article($slug) {
      return view('blog.article', [
        'article'=>Article::where('slug', $slug)->first()
        ]);
    }
}
