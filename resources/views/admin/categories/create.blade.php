@extends('admin.layouts.app_admin')

@section('content')



    @component('admin.components.breadcrumb')
      @slot('title') Создание категории @endslot
      @slot('parent') Главная @endslot
      @slot('active') Категории @endslot
    @endcomponent



        <hr />
  <div class="container">
        <form class="from-horozontal" action="{{route('admin.category.store')}}" method="post">
          {{ csrf_field() }}
          <!-- Form include -->
          @include('admin.categories.partials.form')
        </form>
  </div>

@endsection
