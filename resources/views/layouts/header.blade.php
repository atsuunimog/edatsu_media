<nav class="navbar navbar-expand-lg header mb-3">
    <div class="container">
        <!--logo-->
        <a href="https://media.edatsu.com">
        <img src="{{ asset('img/logo/trans/logo_trans_4.png')}}" width="50" class="img-fluid" alt="logo">
        </a>
        <!--logo-->
      <button class="navbar-toggler d-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse " id="navbarSupportedContent">
        <div class="d-flex justify-content-between w-100">
        <form class="d-flex" role="search">
            {{-- <input class="form-control me-2 border-0 fs-9" type="search" placeholder="Search" aria-label="Search"> --}}
            {{-- <button class="btn btn-outline-light" type="submit">Search</button> --}}
          </form>

        <ul class="navbar-nav mb-2 mb-lg-0 fs-9">
          <li class="nav-item">
            <a href="{{ url('news-feed') }}" class="nav-link text-decoration-none me-3  text-light {{ getHighlightClass('/news-feed', 'brand-link', 'text-secondary') }}">
              News Feed
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/') }}" class="nav-link text-decoration-none  me-3 text-light {{ getHighlightClass('/', 'brand-link', 'text-secondary') }}">
              Opportunities
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('events') }}" class="nav-link text-decoration-none me-3 text-light {{ getHighlightClass('/events', 'brand-link', 'text-secondary') }}">
             Discover Events
            </a>
          </li>

          <li class="nav-item me-3">
            @if (isset(Auth::user()->role))
            <a href="{{ url('/dashboard') }}" class="text-decoration-none text-light">Dashboard</a>
            @else
            @auth
            <a href="{{ route('login') }}" class="text-decoration-none text-light">Login</a>
            @endauth
            @endif
        </li>

          <li class="nav-item">
            <a class="btn brand-color border-0 px-3" href="{{ url('subscribe') }}" >
              Subscribe</a>
          </li>

          

          {{-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Support
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li> --}}
        </ul>
      </div>
      </div>
    </div>
  </nav>