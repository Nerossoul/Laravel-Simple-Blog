<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;



class DashboardController extends Controller
{
    //Dashboard
    public function dashboard() {
      return view('admin.dashboard', [
        'articles'   => Article::LustArticles(5),
        'categories' => Category::LastCategories(5),
        'count_categories' => Category::count(),
        'count_articles' => Article::count(),
      ]);
    }


}
