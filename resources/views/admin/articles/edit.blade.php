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
</div>

@endsection
