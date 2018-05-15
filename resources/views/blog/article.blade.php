@extends('layouts.app')

@section('title', $article->title)
@section('meta_keyword', $article->meta_keyword)
@section('meta_description', $article->meta_description)

@section('content')

    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <h1> <a href="{{route('article', $article->slug)}}">{{$article->title}}</a> </h1>
          {!!$article->description!!}
        </div>
      </div>
    </div>

@endsection
