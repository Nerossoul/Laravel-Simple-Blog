@foreach ($categories as $category)
@if ($category->children->where('published', 1)->count())
<li class="ananov-dark z-depth-3" onclick="myAccFunc('menu_accordion_{{$category->id}}');event.preventDefault();SendGet('{{$category->slug}}');">
  <a href="{{url(" /blog/category/$category->slug")}}" class="ananov-light-text" style="white-space:nowrap;">
        {!!$delimiter!!}&nbsp;<span class="tiny material-icons" style="font-size:14px;">arrow_drop_down</span>&nbsp;{{mb_strtoupper($category->title)}}
      </a>
</li>
<div id="menu_accordion_{{$category->id}}" class="ananov-hide ananov-main-color">
  <ul>
    @include('layouts.top_menu', [ 'categories' => $category->children, 'delimiter' => '<i class="tiny material-icons ananov-light-text" style="margin:0px; width: 10px;">keyboard_arrow_right</i>'. $delimiter ])
  </ul>
</div>
@else
<li class="sidenav-close z-depth-3 ananov-dark" style="" onclick="event.preventDefault();SendGet('{{$category->slug}}');">
  <a href="{{url(" /blog/category/$category->slug")}}" class=" ananov-light-text" style="white-space:nowrap;"> {!!$delimiter!!}&nbsp;{{mb_strtoupper($category->title)}}</a>
</li>
@endif
@endforeach
