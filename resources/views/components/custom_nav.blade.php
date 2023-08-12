<div class="row d-none d-sm-block d-md-block d-lg-block d-none mb-5">
        <div class="col-sm-12">
            <!--nav-->
            <ul class='menu-list d-block'>
                <li class="d-inline-block me-3 pe-3 ps-0">
                    <a href="{{ url('news-feed') }}" class="text-decoration-none {{ getHighlightClass('/news-feed', 'text-orange fw-bold', 'text-secondary') }}">News Feed</a>
                </li>

                <li class="d-inline-block me-3 pe-3">
                    <a href="{{ url('/') }}" class="text-decoration-none  {{ getHighlightClass('/', 'text-orange fw-bold', 'text-secondary') }}">Opportunities</a>
                </li>

                <li class="d-inline-block me-3 pe-3">
                    <a href="{{ url('events') }}" class="text-decoration-none {{ getHighlightClass('/events', 'text-orange fw-bold', 'text-secondary') }}">Events</a>
                </li>

                <li class="d-inline-block me-3  pe-3">
                    <a href="{{ url('subscribe') }}" class="text-decoration-none {{ getHighlightClass('/subscribe', 'text-orange fw-bold', 'text-secondary') }}">Subscribe</a>
                </li>

                <li class="d-inline-block me-3">
                    @if (isset(Auth::user()->role))
                    <a href="{{ url('/dashboard') }}" class="text-decoration-none">Dashboard</a>
                    @else
                    @auth
                    <a href="{{ route('login') }}" class="text-decoration-none">Login</a>
                    @endauth
                    @endif
                </li>
            </ul>
            <!--nav-->
        </div>
    </div><!-- Close the div tag for "row" -->

