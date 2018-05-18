@extends('admin.layouts.app_admin')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-sm-6">
        <div class="">
          <p> <span class="label label-primary ananov-main-color">Статей {{$count_articles}}</span>
            <a href="{{route('admin.article.create')}}" class="btn btn-block btn-default ananov-main-color">Создать статью</a>
            <a href="{{route('admin.article.index')}}" class="btn btn-block btn-default ananov-main-color">Все статьи</a>

          </p>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="">
          <p> <span class="label label-primary ananov-main-color">Всего категорий {{$count_categories}}</span>
            <a href="{{route('admin.category.create')}}" class="btn btn-block btn-default ananov-main-color">Создать категорию</a>
            <a href="{{route('admin.category.index')}}" class="btn btn-block btn-default ananov-main-color">Все категории</a>
          </p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <span class="label label-primary ananov-main-color">Последние 5 созданных статей {{$count_articles}} </span>
        @foreach ($articles as $article)
          <a href="{{route('admin.article.edit',$article)}}" class="list-group-item ananov-second-color">

            <h4 class="list-group-item-heading">{{$article->title}}</h4>
            <p class="list-group-item-text">
              {{$article->categories()->pluck('title')->implode(', ')}}
            </p>
          </a>
        @endforeach

      </div>
      <div class="col-sm-6">
        <span class="label label-primary ananov-main-color">Последние 5 созданных категорий из {{$count_categories}}</span>
        @foreach ($categories as $category)
          <a href="{{route('admin.category.edit',$category)}}" class="list-group-item ananov-second-color">
            <h4 class="list-group-item-heading">{{$category->title}}</h4>
            <p class="list-group-item-text">
              {{$category->articles()->count()}}
            </p>
          </a>
        @endforeach
      </div>
    </div>

  </div>
@endsection
