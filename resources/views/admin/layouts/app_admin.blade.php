<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Styles -->
  <link href="https://www.w3schools.com/w3css/4/w3.css" rel="stylesheet">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3mobile.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">


  <link href="{{ asset('css/app.css') }}" rel="stylesheet">


  <!-- font-awesome -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>

<body class="ananov-light">

  <div id="app">

    <!-- header -->
    <nav>
      <div class="nav-wrapper ananov-dark ">
        <a href="#" data-target="slide-out" class="sidenav-trigger ananov-light-text" style="display: block;"><i class="material-icons">menu</i></a><a href="{{route('index')}}" class="brand-logo ananov-light-text">9671731.org</a>
      </div>
    </nav>

    <!-- sidebar -->

    <ul id="slide-out" class="sidenav ananov-dark">
      <li>
        <div class="ananov-dark " style="padding-top:10px;">
          <a href="#" class="sidenav-close ananov-light-text"style="margin-left: 10px;width:40px;">
            <i class="ananov-side-icon material-icons">keyboard_arrow_left</i>
          </a>
          <!-- Authentication Link -->
          @guest
          <a href="{{ route('login') }}" class="ananov-light-text">
            <i class="ananov-side-icon material-icons">exit_to_app</i>
          </a>
          @else
          <a href="{{ route('admin.index') }}" title="{{ Auth::user()->name }}" class="ananov-light-text">
              <i class="ananov-side-icon material-icons">person</i>
          </a>
          <a href="{{ route('admin.index') }}" class="ananov-light-text">
            <i class="ananov-side-icon medium material-icons">settings</i>
          </a>
          <a href="{{ route('logout') }}" class="ananov-light-text" onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();" title="Выйти(Logout)">
            <i class="ananov-side-icon material-icons">directions_run</i></i>
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
          </form>
          @endguest
        </div>
      </li>
      @guest

      @else
      <li>
        <a href="#" class="ananov-light-text no_underlined z-depth-1">
          <strong>{{ Auth::user()->name }} <span class="caret"></span></strong>
        </a>
      </li>
      <li>
        <a href="{{route('admin.index')}}" class="ananov-light-text no_underlined z-depth-1">
          Панель состояния
        </a>
      </li>
      <li>
        <a href="{{route('admin.category.index')}}" class="ananov-light-text no_underlined z-depth-1">Категории</a>
      </li>
      <li>

        <a href="{{route('admin.article.index')}}" class="ananov-light-text no_underlined z-depth-1">Статьи</a>
      </li>
      <!--<li>
          <a href="{{route('admin.user_managment.user.index')}}" class="ananov-light-text no_underlined z-depth-3">Пользователи</a>
        </li>-->
      <li>
        <a href="{{route('index')}}" class="ananov-light-text no_underlined z-depth-1">Вернуться на сайт</a>
      </li>
      @endguest
    </ul>

    <!-- header -->
    <div >
      @yield('content')
    </div>
  </div>

  <!-- Scripts -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var elems = document.querySelectorAll('.sidenav');
      var instances = M.Sidenav.init(elems); // options);
    });
  </script>
  <script src="{{ asset('/vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
  <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
