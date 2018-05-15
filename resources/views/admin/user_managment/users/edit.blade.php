@extends('admin.layouts.app_admin')

@section('content')

  <div class="container">

    @component('admin.components.breadcrumb')
      @slot('title') Редактирование пользователя @endslot
      @slot('parent') Главная @endslot
      @slot('active') Пользователь @endslot
    @endcomponent
        <hr />
        <form class="from-horozontal" action="{{route('admin.user_managment.user.update', $user)}}" method="post">
          {{ method_field('PUT')}}
          {{ csrf_field() }}

          <!-- Form include -->
          @include('admin.user_managment.users.partials.form')
        </form>

  </div>

@endsection
