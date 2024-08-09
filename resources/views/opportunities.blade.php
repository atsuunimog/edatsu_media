<x-guest-layout >
    <div class="container-fluid container-lg  container-sm">
    <!--body-->
    <div class="row">
        <div class="col-sm-8 col-12 mt-3">
        <!--news filter-->
            <form class="" method="GET" id="search_keyword" onsubmit='submitSearchQuery()'>
                <div class="row">
                    <div class="col-sm-9 col-12">
                        <div class='mb-3'>
                        <input type='text' class="form-control py-3 fs-9 text-secondary" name="search_keyword" placeholder="Search Keywords" id="keyword">
                        </div>
                    </div>
                    <div class="col-sm-3 col-12">
                        <div class='mb-3'>
                        <button class="text-decoration-none fw-bold btn btn-dark border-0 px-4 py-3 shadow-sm w-100">Search</button>
                        </div>
                    </div>
                </div>
    
                <div  class="py-3 px-3 border mb-3 bg-white rounded d-flex justify-content-between">
                    <span class="fs-9 text-dark d-block">
                    Use filters to improve search
                    </span>
                    <span class="material-symbols-outlined cursor d-block align-middle" 
                    style='cursor:pointer' id="filter-toggle" onclick="toggleContent()">
                    toggle_off
                    </span>
                </div>
    
                <div  id="filter-panel" class="bg-white border rounded px-3 py-3 mb-3 d-none">
                <span class="fs-9 text-primary d-block my-3">
                    <span class="material-symbols-outlined align-middle">
                        info
                    </span>
                    All search filter values are optional
                </span>
                <div class="row">
                    <div class="col-sm-6">
                        <select class="form-select py-3 mb-3 text-secondary fs-9" id="event_status" name="event_status"  aria-label="Select News">
                            <option value="">All Opportunites</option>
                            <option value="on_going">Ongoing</option>
                            <option value="up_coming">Upcoming</option>
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <select class="form-select py-3 mb-3 text-secondary fs-9" id="category">
                            @include('components.categorylist')
                        </select>
                        <input type="hidden" name="category" id="selectedCategories" readonly>
                        <div id="outputCategoryList"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <select class="form-select py-3 mb-3 text-secondary fs-9" id="date_posted" name="date_posted" aria-label="Select News">
                            <option value="">Date Posted</option>
                            <option value="one_day">24 hours Ago</option>
                            <option value="one_week">1 Week Ago</option>
                            <option value="two_weeks">2 Weeks Ago</option>
                            <option value="one_month">1 Month Ago</option>
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <select class="form-select py-3 mb-3 text-secondary fs-9" id="region" name="region" aria-label="Select News">
                            <option value="">Select Region</option>
                            <option value="north_africa">North Africa</option>
                            <option value="west_africa">West Africa</option>
                            <option value="central_africa">Central Africa</option>
                            <option value="east_africa">East Africa</option>
                            <option value="southern_africa">Southern Africa</option>
                            <option value="sahel_region">Sahel Region</option>
                        </select>
                        <input type="hidden" name="region" id="selectedRegions" readonly>
                        <div id="outputRegionsList"></div>
                    </div>
                </div>
    
                <div class="row">
                    <div class="col-sm-6">
                        <select class="form-select py-3 mb-3 text-secondary fs-9" id="country" >
                            @include('components.countrylist')
                        </select>
                        <input type="hidden" name="country" id="selectedCountries" readonly>
                        <div id="outputCountriesList"></div>
                    </div>
    
                    <div class="col-sm-6">
                        <select class="form-select py-3 mb-3 text-secondary fs-9" id="continent" >
                            <option value="">Select Continent</option>
                            <option value="global">Global</option>
                            <option value="africa">Africa</option>
                            <option value="antarctica">Antarctica</option>
                            <option value="asia">Asia</option>
                            <option value="europe">Europe</option>
                            <option value="north_america">North America</option>
                            <option value="australia">Australia (or Oceania/Australasia)</option>
                            <option value="south_america">South America</option>
                        </select>
                        <input type="hidden" name="continent" id="selectedContinents" readonly>
                        <div id="outputContinentsList"></div>
                    </div>
                </div>
    
                <div class="row">
                    <div class="col-sm-6">
                        <select class="form-select py-3 mb-3 text-secondary fs-9" name="month" aria-label="Select News">
                            <option value="">Select Month</option>
                            <option value="january">January</option>
                            <option value="february">February</option>
                            <option value="march">March</option>
                            <option value="april">April</option>
                            <option value="may">May</option>
                            <option value="june">June</option>
                            <option value="july">July</option>
                            <option value="august">August</option>
                            <option value="september">September</option>
                            <option value="october">October</option>
                            <option value="november">November</option>
                            <option value="december">December</option>
                        </select>
                    </div>
    
                    <div class="col-sm-6">
                        <select class="form-select py-3 mb-3 text-secondary fs-9" name="year" aria-label="Select News">
                            <option value="">Year</option>
                            @php
                                $currentYear = date("Y");
                            @endphp
                            @for ($i = $currentYear; $i <= $currentYear + 5; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <button class="text-decoration-none btn btn-dark border-0 px-4 py-3 shadow-sm w-100">Search</button>
                </div>
            </form>
            <!--news filter-->
            
            <!--sign up banner-->
            <a id="main" href="subscriber-register" >
                <div class="my-3">
                <img src="img/ads_img/sign_up_banner.jpg" alt="signup-banner" class="img-fluid">
                </div>
            </a>
            <!--sign up banner-->

            <span id="search-result"></span>
            <span id="filter-entries"></span>
            <div  id="opportunity-feeds"></div>
            <div  id="pagination"></div>

            <!--cavet-->
            <div class="my-5">
                <div>
                    <p class="fw-bold">Disclaimer</p>
                    <p class="fs-8 text-secondary">
                        Edatsu Media is focused on aggregating helpful business information and hereby declares that it is not directly affiliated or associated with any events, awards, sponsorships, or competitions unless explicitly stated otherwise. While we strive to provide accurate and up-to-date information, any references or mentions of such events, awards, sponsorships, or competitions within our content are purely for informational purposes and should not be construed as endorsement or sponsorship by Edatsu Media. 
                    </p>
                </div>
            </div>
            <!--caveat-->
            <!--main content-->
        </div>
    <div class="col-sm-4 col-12">

    <div class="my-3">
    @include('components/subscription_box')
    </div>

    <!--custom ads-->
    <a href="https://cart.hostinger.com/pay/852ad684-6352-4a43-b1ae-42747759f3cb?_ga=GA1.3.942352702.1711283207" target="_blank" class="d-block my-3">
    <img src="{{asset('img/defaults/hosting_banner_web.png')}}" class="img-fluid border" width="800px" height="800px" />
    </a>
    <!--custom ads-->

    <!--aside-->
    <div class="mb-3 border rounded px-3 py-3" style="width:100%; height:800px">
        <!--google ads-->
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7365396698208751"
        crossorigin="anonymous"></script>
    <!-- Square Ads -->
    <ins class="adsbygoogle"
        style="display:block"
        data-ad-client="ca-pub-7365396698208751"
        data-ad-slot="1848837203"
        data-ad-format="auto"
        data-full-width-responsive="true"></ins>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
        <!--google ads-->
    <span class="d-block mt-2 fs-8">Ads</span>
    </div>
    <!--aside-->
    </div>
</div>
</div>
<!--body-->
@include('components/fixed_mobile_menu')

<script id="dsq-count-scr" src="https://media-edatsu-com.disqus.com/count.js" async></script>
<script>
const imageSrc = '{{ asset('img/gif/cube_loader.gif') }}';
</script>
<script defer src='../js/opp.js'></script>
</x-guest-layout>
    