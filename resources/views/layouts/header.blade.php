<nav class="navbar navbar-default navbar-static-top">
<!-- sidebar -->
        <div class="anonov-main-color w3-sidebar w3-animate-left anonov-main-color w3-card" style="display:none;" id="leftMenu">
          <div class="w3-bar anonov-main-color  w3-xxlarge w3-margin-bottom">
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
          <div class="w3-bar-block w3-card anonov-main-color" style="text-decoration: none;">
              @include('layouts.top_menu', ['categories' => $categories ])
          </div>
        </div>

<!-- header -->
      <div class="w3-container w3-card anonov-main-color">
        <h2><button class="w3-button w3-xlarge w3-left" onclick="openLeftMenu()" style='background-color:#42505D'>&#9776;</button> Wisdom</h2>
      </div>

</nav>
