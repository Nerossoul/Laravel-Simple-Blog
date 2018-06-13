<div class="ananov-category-container">
  <h6 style="font-weight:700;">{{$category->title}}</h6>
  @forelse ($articles as $article)
      <a href="#spoiler-open-{{$article->id}}" id="spoiler-open-{{$article->id}}" class="spoiler_open text_size_adapt ananov-dark-text text-darken-2">
        <span class="" style="font-family: 'Roboto', sans-serif;">
          @if (isset((explode('>>>', $article->description))[1]))
                  {{strip_tags((explode('>>>', $article->description))[0])}}
          @else
                  {{mb_substr(strip_tags($article->description), 0, 101)}}
          @endif
          >>></span>
      </a>
      <a href="#spoiler-close-{{$article->id}}" id="spoiler-close-{{$article->id}}" class="spoiler_close text_size_adapt no_underlined ananov-dark-text text-darken-2" style="font-family: 'Roboto', sans-serif;">
        @if (isset((explode('>>>', $article->description))[1]))
          <span class="" style="font-weight:500;">{{strip_tags((explode('>>>', $article->description))[0])}}</span>{{strip_tags((explode('>>>', $article->description))[1])}}
        @else
          <span class="" style="font-weight:500;">{{mb_substr(strip_tags($article->description), 0, 101)}}</span>{!!mb_substr(strip_tags($article->description), 101,strlen($article->description),'UTF-8')!!}
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
    <h6 class="">В этой категории пусто</h6>
  @endforelse
</div>
