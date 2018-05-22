@extends('layouts.app')

@section('title', $category->title)

@section('content')
  <div class=".ananov-category-container w3-content w3-padding ananov-second-color">
    @forelse ($articles as $article)
        <a href="#spoiler-open-{{$article->id}}" id="spoiler-open-{{$article->id}}" class="spoiler_open ananov-second-text-color">
          <span class="underlined ">{{$article->description_short}}</span>
        </a>
        <a href="#spoiler-close-{{$article->id}}" id="spoiler-close-{{$article->id}}" class="spoiler_close no_underlined ananov-second-text-color">
          <span class="underlined">{{strip_tags(mb_substr($article->description, 0, 104))}}</span>{!!mb_substr($article->description, 104,strlen($article->description),'UTF-8')!!}
        </a>
    @empty
      <h2 class="text-centre">Пусто</h2>
    @endforelse
</div>

@endsection
