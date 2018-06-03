@extends('admin.layouts.app_admin')

@section('content')
<div class="container">
  <div class="row">
    <div class="col l6 m6 s12">
      <div class="">
        <p> <span class="label label-primary ananov-dark ananov-light-text">Статей {{$count_articles}}</span>
          <a href="{{route('admin.article.create')}}" class="btn btn-block ananov-dark ananov-light-text" style="margin-top:5px;">Создать статью</a>
          <a href="{{route('admin.article.index')}}" class="btn btn-block ananov-dark ananov-light-text" style="margin-top:5px;">Все статьи</a>

        </p>
      </div>
    </div>
    <div class="col l6 m6 s12">
      <div class="">
        <p> <span class="label label-primary ananov-dark ananov-light-text">Всего категорий {{$count_categories}}</span>
          <a href="{{route('admin.category.create')}}" class="btn btn-block ananov-dark ananov-light-text" style="margin-top:5px;">Создать категорию</a>
          <a href="{{route('admin.category.index')}}" class="btn btn-block ananov-dark ananov-light-text" style="margin-top:5px;">Все категории</a>
        </p>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col l6 m6 s12">
      <div class="card ananov-dark ananov-light-text">
        <span class="card-content ">Последние 5 созданных статей из {{$count_articles}} </span>
      </div>

      <div class="collection">
        @foreach ($articles as $article)
        <a href="{{route('admin.article.edit',$article)}}" class="collection-item ananov-light ananov-dark-text">

          <h5 class="list-group-item-heading">{{$article->title}}</h5>
          <p class="list-group-item-text">
            {{$article->categories()->pluck('title')->implode(', ')}}
          </p>
        </a>
        @endforeach
      </div>
    </div>
    <div class="col l6 m6">
      <div class="card ananov-dark ananov-light-text">
          <span class="card-content">Последние 5 созданных категорий из {{$count_categories}}</span>
      </div>

      <div class="collection">
        @foreach ($categories as $category)
        <a href="{{route('admin.category.edit',$category)}}" class="collection-item ananov-light ananov-dark-text">
          <h5 class="list-group-item-heading">{{$category->title}}</h5>
          <p class="list-group-item-text">
            {{$category->articles()->count()}}
          </p>
        </a>
        @endforeach
      </div>

    </div>
  </div>

</div>
@endsection
