@extends('admin.layouts.app_admin')

@section('content')

  <div class="container">

    @component('admin.components.breadcrumb')
      @slot('title') Создание статьи @endslot
      @slot('parent') Главная @endslot
      @slot('active') Сататьи @endslot
    @endcomponent



        <hr />

        <form class="from-horozontal" action="{{route('admin.article.store')}}" method="post">
          {{ csrf_field() }}

          <!-- Form include -->
          @include('admin.articles.partials.form')

          <input type="hidden" name="created_by" value="{{Auth::id()}}">
        </form>

  </div>

@endsection
