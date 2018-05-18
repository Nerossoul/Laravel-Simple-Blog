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

    <style>

    .underlined {
      text-decoration:underline;
    }

    .no_underlined{
      text-decoration:none;
    }

    .no_underlined:hover {
      text-decoration:none;
    }
    .spoiler_open, .spoiler_close {
        display: block;
        width: 100%;
        padding-top: 15px;
        background: #fff;
        color: #000;
        cursor: default;
        text-decoration:none;
    }

    .spoiler_close {
        display: none;
    }
    .spoiler_desc {
        display: none;
        width: 100%;
        background: #fff;
        text-decoration: none;
        color: #000;
        cursor: default;
    }
    .spoiler_open:target {
        display: none;
    }
    .spoiler_open:target + .spoiler_close,
    .spoiler_open:target + .spoiler_close + .spoiler_desc {
        display: block;
    }

    #leftMenu {
      width:66%;
      max-width: 400px;
      opacity: 1;
      text-transform: uppercase;
      transition-property: width, opacity;
      transition-duration: .3s;
    }

    .ananov-main-color {
      background-color: #42505D !important;
      color: #F9D5A6 !important;
    }

    .ananov-second-color {
      background-color: #F9D5A6 !important;
      color: #42505D !important;
    }

    .ananov-main-text-color {
      color: #F9D5A6 !important;
    }

    .ananov-second-text-color {
      color: #42505D !important;
    }
    </style>

    <!-- font-awesome -->
    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

</head>
<body class="ananov-second-color">

    <div id="app">
      <nav class="navbar navbar-default navbar-static-top">
      <!-- sidebar -->
              <div class="ananov-main-color w3-sidebar w3-animate-left ananov-main-color w3-card" style="display:none;" id="leftMenu">
                <div class="w3-bar ananov-main-color  w3-xxlarge w3-margin-bottom">
                  <a href="#" class="w3-bar-item w3-button" onclick="closeLeftMenu()"><i class="fa fa-arrow-left"></i></a>
                  <!-- Authentication Link -->
                  @guest
                      <a href="{{ route('login') }}" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
                  @else
                    <a href="{{ route('admin.index') }}" title="{{ Auth::user()->name }}" class="w3-bar-item w3-button">
                      <i class="fa fa-user"></i>
                    </a>
                    <a href="{{ route('admin.index') }}" class="w3-bar-item w3-button"><i class="fa fa-cog"></i></a>
                    <a href="{{ route('logout') }}" class="w3-bar-item w3-button" onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out" aria-hidden="true"></i>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>

                  @endguest

                </div>
                <div class="w3-bar-block w3-card ananov-main-color" style="text-decoration: none;">
                  @guest

                  @else
                  <div class="w3-bar-item w3-card ananov-main-color" onclick="myAccFunc('menu_accordion_1')">
                      <a href="#" class="ananov-main-text-color no_underlined">
                          <strong>{{ Auth::user()->name }} <span class="caret"></span></strong>
                      </a>
                  </div>
                  <div id="menu_accordion_1" class="w3-bar-item w3-hide w3-card-4">
                      <a href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();" class="ananov-main-text-color" class="ananov-main-text-color no_underlined">
                          Logout
                      </a>
                  </div>
                  <div class="w3-bar-item w3-card ananov-main-color">
                      <a href="#" class="ananov-main-text-color">
                          <a href="{{route('admin.index')}}" class="ananov-main-text-color no_underlined">Панель состояния</a>
                      </a>
                  </div>
                  <div class="w3-bar-item w3-card ananov-main-color">
                      <a href="#" class="ananov-main-text-color">
                          <a href="{{route('admin.category.index')}}" class="ananov-main-text-color no_underlined">Категории</a>
                      </a>
                  </div>
                  <div class="w3-bar-item w3-card ananov-main-color">
                      <a href="#" class="ananov-main-text-color">
                          <a href="{{route('admin.article.index')}}" class="ananov-main-text-color no_underlined">Статьи</a>
                      </a>
                  </div>
                  <!--div class="w3-bar-item w3-card ananov-main-color">
                      <a href="#" class="ananov-main-text-color">
                          <a href="{{route('admin.user_managment.user.index')}}" class="ananov-main-text-color no_underlined">Пользователи</a>
                      </a>
                  </div-->
                  <div class="w3-bar-item w3-card ananov-main-color">
                  <a href="{{route('index')}}" class="ananov-main-text-color no_underlined">Вернуться на сайт</a>
                  </div>
                  @endguest
                </div>
              </div>

      <!-- header -->
            <div class="w3-row w3-padding  w3-xlarge ananov-main-color">
                <h2><button class="w3-button w3-xlarge w3-left" onclick="openLeftMenu()" style='background-color:#42505D'>&#9776;</button> <a href="{{route('admin.index')}}" class="no_underlined ananov-main-text-color">Панель управления</a></h2>
            </div>


      </nav>
      <div onclick="closeLeftMenu()">
          @yield('content')
      </div>
    </div>

    <!-- Scripts -->
    <script>
    function openLeftMenu() {
      sidebar =   document.getElementById("leftMenu");
        sidebar.style.display = "block";
    }
    function closeLeftMenu() {
        sidebar.style.width = '50px';
        sidebar.style.opacity = 0;
        setTimeout(function() {
          sidebar.style.display = "none";
          sidebar.style.width = '66%';
          sidebar.style.opacity = 1;
        }, 300);
    }
    function myAccFunc(id) {
        var x = document.getElementById(id);
        //console.log('elem: ' + x);
        if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
          //  x.previousElementSibling.className += " ananov-second-color";
        } else {
            x.className = x.className.replace(" w3-show", "");
          //  x.previousElementSibling.className.replace(" ananov-second-color", "");
        }
    }
    </script>
     <script src="{{ asset('/vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
