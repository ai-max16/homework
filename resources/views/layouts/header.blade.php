<header>
  <nav class="navbar navbar-expand-md navbar-light shadow-sm todo-header-container">
    <div class="container">
      <a class="navbar-brand" href="{{ url('/') }}">
        {{ config('app.name', 'Laravel') }}
      </a>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ms-auto mr-5 mt-2">
          <!-- Authentication Links -->
          @guest
          <li class="nav-item mr-5">
            <a class="nav-link" href="{{ route('register') }}">{{ __('新規登録') }}</a>
          </li>
          <li class="nav-item mr-5">
            <a class="nav-link" href="{{ route('login') }}">{{ __('ログイン') }}</a>
          </li>
          <hr>
          <li class="nav-item mr-5">
            <a class="nav-link" href="{{ route('login') }}"><i class="far fa-heart"></i></a>
          </li>
          <li class="nav-item mr-5">
            <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-shopping-cart"></i></a>
          </li>
          @else
          <li class="nav-item mr-5">
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              ログアウト
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </li>
          @endguest
        </ul>
      </div>
    </div>
  </nav>
</header>