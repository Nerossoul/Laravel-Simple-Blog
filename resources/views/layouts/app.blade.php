<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <meta name="keywords" content="@yield('meta_keyword')">
    <meta name="description" content="@yield('meta_description')">

    <!-- Styles -->
    <link href="https://www.w3schools.com/w3css/4/w3.css" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3mobile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
<style>

.underlined {
/*  text-decoration:underline;
  font-weight: bold;/*|bolder|lighter|normal|100|200|300|400|500|600|700|800|900*/
  color: black;
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
    /*background: #fff;*/
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
    /*background: #fff;*/
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
  color: #edd8bb !important;/*#F9D5A6 !important;*/
}

.ananov-second-color {
  background-color: #F9D5A6 !important;*/
  color: #42505D !important;*/
}

.ananov-main-text-color {
  color: #F9D5A6 !important;
}

.ananov-second-text-color {
  color: #2b343d !important;/*#42505D !important;*/
}

.ananov-category-container {
  padding: 0.01em 10px;
}
</style>
</head>
<body class="ananov-second-color">
    <div id="app">

        @include('layouts.header')
    <div style="width:100%" onclick="closeLeftMenu()">
      <div id="ajax_category_target"  style="margin:auto; min-width: 450px; max-width:450px;">
          @yield('content')
      </div>
    </div>
    @guest
    @else
      <div style="margin:auto; min-width: 240px; max-width:300px; margin-top:15px;margin-bottom:15px;">
        <a href="{{route('admin.article.create')}}" class="btn btn-default ananov-main-color">Создать статью</a>
        <a href="{{route('admin.category.create')}}" class="btn btn-default ananov-main-color">Создать категорию</a>
      </div>
    @endguest
    </div>

    <!-- Scripts -->
    <script>
    function openLeftMenu() {
      sidebar =   document.getElementById("leftMenu");
        sidebar.style.display = "block";
    }
    function closeLeftMenu() {
      sidebar =   document.getElementById("leftMenu");
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

<script>
console.log('before');

function SendGet(slug) {

  'use strict';

  // находим необходимый селектор
  var target_div = document.getElementById('ajax_category_target');

  // устанавливаем запрос
  var request = new XMLHttpRequest();

  // отслеживаем запрос
  request.onreadystatechange = function() {
    // проверяем вернулись запрошенные данные
    if(request.readyState === 4) {
      // проверяем успешен ли запрос
      if(request.status === 200) {
        // обнавляем элемент HTML
        target_div.innerHTML = request.responseText;
      } else {
        // иначе выводим сообщение об ошибке
        target_div.innerHTML = 'Произошла ошибка при запросе: ' +  request.status + ' ' + request.statusText;
      }
    }
  }
  // определяем тип запроса
  request.open('Get', "{{url('ajax_category')}}"+'/'+slug);
  request.send();
};

</script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
