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
      <a href="#" class="sidenav-close ananov-light-text"><i class="ananov-side-icon material-icons">keyboard_arrow_left</i></a>
      <!-- Authentication Link -->
      @guest
        <a href="{{ route('login') }}" class="ananov-light-text"><i class="ananov-side-icon material-icons">exit_to_app</i></a>
      @else
        <a href="{{ route('admin.index') }}" title="{{ Auth::user()->name }}" class="ananov-light-text">
            <i class="ananov-side-icon material-icons">person</i>
          </a>
        <a href="{{ route('admin.index') }}" class="ananov-light-text"><i class="ananov-side-icon medium material-icons">settings</i></a>
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
      @include('layouts.top_menu', ['categories' => $categories ])
</ul>
