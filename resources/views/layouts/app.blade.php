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

  <!-- Styles
    <link href="https://www.w3schools.com/w3css/4/w3.css" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3mobile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body class="ananov-light">
  <div id="app">
    @include('layouts.header')

    <div id="ajax_category_target" style="margin:auto; min-width: 300px; max-width:490px;">
      @yield('content')
    </div>
    @guest
    @else
    <div style="margin:auto; width:340px; margin-top:15px;margin-bottom:15px;">
      <a href="{{route('admin.article.create')}}" class="waves-effect waves-light btn-small ananov-dark ananov-light-text"><i class="material-icons left">add</i> статья</a>
      <a href="{{route('admin.category.create')}}" class="waves-effect waves-light btn-small ananov-dark ananov-light-text"><i class="material-icons left">add</i> категория</a>
    </div>
    @endguest
  </div>

  <!-- Scripts -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var elems = document.querySelectorAll('.sidenav');
      var instances = M.Sidenav.init(elems); // options);
    });
  </script>

  <script>
    function myAccFunc(id) {
      var x = document.getElementById(id);
      //console.log('elem: ' + x);
      if (x.className.indexOf("ananov-show") == -1) {
        x.className += " ananov-show";
        //  x.previousElementSibling.className += " ananov-second-color";
      } else {
        x.className = x.className.replace(" ananov-show", "");
        //  x.previousElementSibling.className.replace(" ananov-second-color", "");
      }
    }
  </script>


  <script>
    function SendGet(slug) {

      'use strict';

      // находим необходимый селектор
      var target_div = document.getElementById('ajax_category_target');

      // устанавливаем запрос
      var request = new XMLHttpRequest();

      // отслеживаем запрос
      request.onreadystatechange = function() {
        // проверяем вернулись запрошенные данные
        if (request.readyState === 4) {
          // проверяем успешен ли запрос
          if (request.status === 200) {
            // обнавляем элемент HTML
            target_div.innerHTML = request.responseText;
          } else {
            // иначе выводим сообщение об ошибке
            target_div.innerHTML = 'Произошла ошибка при запросе: ' + request.status + ' ' + request.statusText;
          }
        }
      }
      // определяем тип запроса
      request.open('Get', "{{url('ajax_category')}}" + '/' + slug);
      request.send();
    };
  </script>
  <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
