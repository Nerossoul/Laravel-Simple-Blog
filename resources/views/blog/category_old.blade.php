@extends('layouts.app')

@section('title', $category->title)

@section('content')

    <div class="container">
    @forelse ($articles as $article)
      <div class="row">
        <div class="col-sm-12">
          <h2> <a href="{{route('article', $article->slug)}}">{{$article->title}}</a> </h2>
          {!!$article->description_short!!}
        </div>
      </div>
    @empty
      <h2 class="text-centre">Пусто</h2>
    @endforelse
    {{$articles->links()}}
    </div>

@endsection
