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
  text-decoration:underline;
}

.no_underlined{
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

.anonov-main-color {
  background-color: #42505D !important;
  color: #F9D5A6 !important;
}

.anonov-second-color {
  background-color: #F9D5A6 !important;
  color: #42505D !important;
}

.anonov-main-text-color {
  color: #F9D5A6 !important;
}

.anonov-second-text-color {
  color: #42505D !important;
}
</style>
</head>
<body>
    <div id="app">

        @include('layouts.header')

        @yield('content')
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
          //  x.previousElementSibling.className += " anonov-second-color";
        } else {
            x.className = x.className.replace(" w3-show", "");
          //  x.previousElementSibling.className.replace(" anonov-second-color", "");
        }
    }
    </script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
