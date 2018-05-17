
<div class="w3-container w3-content w3-padding">
    @forelse ($articles as $article)
        <a href="#spoiler-open-{{$article->id}}" id="spoiler-open-{{$article->id}}" class="spoiler_open w3-padding anonov-second-text-color">
          <span class="underlined ">{{$article->description_short}}</span>
        </a>
        <a href="#spoiler-close-{{$article->id}}" id="spoiler-close-{{$article->id}}" class="spoiler_close w3-padding no_underlined anonov-second-text-color">
          <span class="underlined">{{strip_tags(mb_substr($article->description, 0, 104))}}</span>{!!strip_tags(mb_substr($article->description, 104,strlen($article->description),'UTF-8'))!!}
        </a>
    @empty
      <h2 class="text-centre">Пусто</h2>
    @endforelse
</div>
