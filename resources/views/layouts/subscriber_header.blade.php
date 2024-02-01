<nav class="navbar navbar-expand-lg header border-0 m-0 fs-9 custom-title">
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
        <ul class="navbar-nav mb-2 mb-lg-0 ">
          <li class="nav-item">
            <a href="{{ url('news-feed') }}" class="nav-link text-decoration-none me-3  text-light {{ getHighlightClass('/news-feed', 'custom-link-highlight', 'text-secondary') }}">
              News Feed
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/opportunities') }}" class="nav-link  text-decoration-none  me-3 text-light {{ getHighlightClass('/opportunities', 'custom-link-highlight', 'text-secondary') }}">
              Opportunities
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('events') }}" class="nav-link  text-decoration-none me-3 text-light {{ getHighlightClass('/events', 'custom-link-highlight', 'text-secondary') }}">
            Discover Events
            </a>
          </li>

          {{-- <li class="nav-item">
            <a href="{{ url('subscribe') }}" class="nav-link text-decoration-none me-3 text-light {{ getHighlightClass('/subscribe', 'custom-link-highlight', 'text-secondary') }}">
            
              <span class="material-symbols-outlined align-middle">
                mark_email_unread
              </span>

              Subscribe
            </a>
          </li> --}}


          @if (Auth::check())
            @auth
            

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{ Auth::user()->name}}
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item fs-9" href="{{route('subscriber.dashboard')}}">Dashboard</a></li>
                <li>
                    <!-- Authentication -->
                    
                    <form method="POST" action="{{ route('logout') }}">
                      @csrf
                      <x-responsive-nav-link :href="route('logout')"
                      class="dropdown-item fs-9" 
                              onclick="event.preventDefault();
                                          this.closest('form').submit();">
                          {{ __('Log Out') }}
                      </x-responsive-nav-link>
                    </form>
                </li>
                <li><hr class="dropdown-divider"></li>
                <li><span class='text-secondary fs-8 px-3'>&copy; edatsu media</s></li>
              </ul>
            </li> 
           

            
            @endauth
          @else
            <li class="nav-item">
              <a class="btn custom-bg-highlight text-light border-0 shadow-sm py-2 px-4 inline-block fs-9 mt-1 me-3 fw-bold" 
              href="{{ route('login') }}" >
              Login</a>
            </li>
    
            <li class="nav-item">
              <a class="btn custom-bg-highlight text-light border-0 px-4 shadow-sm py-2 inline-block fs-9 mt-1 fw-bold" href="{{ route('subscriber-register') }}" >
              Sign Up</a>
              {{-- <a class="btn brand-color border-0 px-3 inline-block fs-9 mt-1" href="{{ route('admin-register') }}" >
                Admin Sign up</a> --}}
            </li>
          @endif
          
        </ul>
      </div>
      </div>
    </div>
  </nav>
