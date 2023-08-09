<!--mobile menu-->
{{-- d-sm-none d-md-none d-lg-none --}}
<div class="fixed-footer-bar rounded text-center d-sm-none d-md-none d-lg-none">
     <!--mail notification-->
     <div id="subscription-alert" class="subscription-alert alert alert-warning position-absolute alert-dismissible fade show">
            <h5 class='fw-bold'>Subscribe</h5>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"
             onclick="setSubscriptionDNDCookie()"></button>
            <p class="mb-2 p-0 fs-9 text-left">
                🔔 Subscribe to stay up-to-date! 🚀 Don't miss out on the latest tech and business opportunities and events.
                #TechBusinessInsights #StayInformed 💼🌐
            </p>
        <a href="subscribe" class="btn btn-dark fs-9 float-end px-4 py-2">Subscribe</a>
    </div>
    <!--mail notification-->
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
                <!--alert indicator-->
                <div class='position-relative'>
                    <div class="alert-indicator"></div>
                    <!--alert indicator-->
                    <a href="{{ url('subscribe') }}" class="text-decoration-none {{ getHighlightClass('/subscribe', 'text-light-orange fw-bold', 'text-light') }}">
                    <span class="material-symbols-outlined align-middle" style='font-size:1.5em;'>
                    mail
                    </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--mobile menu-->