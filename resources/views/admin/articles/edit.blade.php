@extends('admin.layouts.app_admin')

@section('content')



    @component('admin.components.breadcrumb')
      @slot('title') Редактирование статьи @endslot
      @slot('parent') Главная @endslot
      @slot('active') Статьи @endslot
    @endcomponent
        <hr />
<div class="container">
        <form class="from-horozontal" action="{{route('admin.article.update', $article)}}" method="post">
          <input type="hidden" name="_method" value="put">
          {{ csrf_field() }}

          <!-- Form include -->
          @include('admin.articles.partials.form')

          <input type="hidden" name="modified_by" value="{{Auth::id()}}">
        </form>
        <h5>Предпросмотр</h5>
          </div>
            <div id="ajax_category_target" style="margin:auto; min-width: 300px; max-width:490px; margin-bottom:40px;">
                <div class="ananov-category-container">
                      <a href="#spoiler-open-1" id="spoiler-open-1" class="spoiler_open text_size_adapt ananov-second-text-color">
                        <span id="spoiler-1" class="underlined" style="font-family: 'Roboto Mono', monospace;"></span>
                      </a>
                      <a href="#spoiler-close-1" id="spoiler-close-1" class="spoiler_close text_size_adapt no_underlined ananov-dark-text text-darken-1" style="font-family: 'Roboto Mono', monospace;">
                          <span id="spoiler-2" class="underlined"></span><span id="full_text"></span>
                      </a>
                </div>
            </div>

@endsection
<script>
document.addEventListener('DOMContentLoaded', function(){
      var article = document.getElementById("description-1");
      var shortDescription = '';
      var description = '';
      if(article.value.indexOf('>>>') + 1)
      {
        textArray=article.value.split('>>>',2);
        shortDescription = textArray[0];
        description = textArray[1];
      }
      else
      {
        shortDescription = article.value.substring(0, 75);
        description = article.value.substring(75, 10000000);
      };
      document.getElementById("spoiler-1").innerHTML = shortDescription+'>>>';
      document.getElementById("spoiler-2").innerHTML = shortDescription;
      document.getElementById("full_text").innerHTML = description;

      article.oninput = function() {
          var shortDescription = '';
          var description = '';

          if(article.value.indexOf('>>>') + 1)
          {
            textOnly = article.value.replace(/<[^>]+>/g,'');
            textArray=textOnly.split('>>>',2);
            shortDescription = textArray[0];
            description = textArray[1];
          }
          else
          {
            textOnly = article.value.replace(/<[^>]+>/g,'');
            shortDescription = textOnly.substring(0, 75);
            description = textOnly.substring(75, 10000000);
          };
          document.getElementById("spoiler-1").innerHTML = shortDescription+'>>>';
          document.getElementById("spoiler-2").innerHTML = shortDescription;
          document.getElementById("full_text").innerHTML = description;
      };
});
</script>
