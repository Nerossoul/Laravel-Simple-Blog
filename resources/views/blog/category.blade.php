@extends('layouts.app')

@section('title', $category->title)

@section('content')
  <div class="ananov-category-container">
    @forelse ($articles as $article)
        <a href="#spoiler-open-{{$article->id}}" id="spoiler-open-{{$article->id}}" class="spoiler_open text_size_adapt ananov-second-text-color">
          <span class="underlined ">
            @if (isset((explode('&gt;&gt;&gt;', $article->description))[1]))
                    {{strip_tags((explode('&gt;&gt;&gt;', $article->description))[0])}}
            @else
                    {{mb_substr(strip_tags($article->description), 0, 101)}}
            @endif
            >>></span>
        </a>
        <a href="#spoiler-close-{{$article->id}}" id="spoiler-close-{{$article->id}}" class="spoiler_close text_size_adapt no_underlined ananov-dark-text text-darken-1">
          @if (isset((explode('&gt;&gt;&gt;', $article->description))[1]))
            <span class="underlined">{{strip_tags((explode('&gt;&gt;&gt;', $article->description))[0])}}</span>{{strip_tags((explode('&gt;&gt;&gt;', $article->description))[1])}}
          @else
            <span class="underlined">{{mb_substr(strip_tags($article->description), 0, 101)}}</span>{!!mb_substr(strip_tags($article->description), 101,strlen($article->description),'UTF-8')!!}
          @endif
          @guest
          @else
            <form onsubmit="if(confirm('Удалить?')){ return true }else{ return false }" action="{{route('admin.article.destroy', $article)}}" method="post">
              <input type="hidden" name="_method" value="DELETE">
              {{ csrf_field() }}
              <a class="waves-effect waves-ananov-dark btn-flat ananov-dark-text" href="{{route('admin.article.edit',$article)}}"> <i class="material-icons">edit</i></a>
              <button type="submit"  class="waves-effect waves-ananov-dark btn-flat ananov-dark-text" > <i class="material-icons">delete</i> </button>
            </form>
          @endguest
        </a>
    @empty
      <h2 class="text-centre">Пусто</h2>
    @endforelse
  </div>

@endsection
