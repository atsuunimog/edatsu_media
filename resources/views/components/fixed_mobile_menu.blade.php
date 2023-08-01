<!--mobile menu-->
<div class="fixed-footer-bar rounded text-center d-sm-none d-md-none d-lg-none">
    <div class="container-fluid">
        <div class="row">
            <div class="col-3">
                <a href="{{ url('news-feed') }}" class="text-decoration-none {{ getHighlightClass('/news-feed', 'text-light-orange fw-bold', 'text-light') }}">
                <span class="material-symbols-outlined align-middle" style='font-size:1.5em;'>
                full_coverage
                </span>
                </a>
            </div>
            <div class="col-3">
                <a href="{{ url('/') }}" class="text-decoration-none {{ getHighlightClass('/', 'text-light-orange fw-bold', 'text-light') }}">
                <span class="material-symbols-outlined align-middle" style='font-size:1.5em;'>
                wb_sunny
                </span>
                </a>
            </div>
            <div class="col-3">
                <a href="{{ url('events') }}" class="text-decoration-none {{ getHighlightClass('/events', 'text-light-orange fw-bold', 'text-light') }}">
                <span class="material-symbols-outlined align-middle" style='font-size:1.5em;'>
                event_available
                </span>
                </a>
            </div>
            <div class="col-3">
                <a href="{{ url('subscribe') }}" class="text-decoration-none {{ getHighlightClass('/subscribe', 'text-light-orange fw-bold', 'text-light') }}">
                <span class="material-symbols-outlined align-middle" style='font-size:1.5em;'>
                mail
                </span>
                </a>
            </div>
        </div>
    </div>
</div>
<!--mobile menu-->