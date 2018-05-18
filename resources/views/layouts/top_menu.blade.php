@foreach ($categories as $category)
  @if ($category->children->where('published', 1)->count())
    <div class="w3-bar-item w3-card ananov-main-color" onclick="myAccFunc('menu_accordion_{{$category->id}}');event.preventDefault();SendGet('{{$category->slug}}');">
      <a href="{{url("/blog/category/$category->slug")}}" class="ananov-main-text-color">
        {!!$delimiter!!}{{$category->title}}<span class="caret"></span>
      </a>
    </div>
    <div id="menu_accordion_{{$category->id}}" class="w3-hide w3-card-4 ananov-main-color no_underlined">
        @include('layouts.top_menu', [
          'categories' => $category->children,
          'delimiter' => ' <i class="fa fa-chevron-right w3-tiny" aria-hidden="true"></i> '. $delimiter
         ])
    </div>
  @else
    <div class="" onclick="event.preventDefault();SendGet('{{$category->slug}}');closeLeftMenu();">
      <a href="{{url("/blog/category/$category->slug")}}" class="w3-bar-item w3-card ananov-main-color ananov-main-text-color no_underlined"> {!!$delimiter!!} {{$category->title}} </a>
    </div>
  @endif
@endforeach
