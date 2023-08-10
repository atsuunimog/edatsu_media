<x-guest-layout>
<div class="row">
    <div class="col-sm-12 text-center">
        <div class="py-5">
             <!--logo-->
             <a href='./'>
                <img src="{{ asset('img/logo/trans/logo_trans_1.png')}}" width="90" class="img-fluid" alt="logo">
                </a>
            <!--logo-->
            <h1 class='fw-bold mb-3'>Events</h1>
            <p class=''>Discover the Latest Events in Africa</p>
        </div>  
    </div>
</div>

<!--menu-->
@include('components/custom_nav')
<!--menu-->

<!--body-->
<div class="row">
    <div class="col-sm-3 col-12">
         <!--trending-->
    <div class="py-3 px-3 bg-white border rounded mb-3">
        <h5 class="fw-bold m-0 mb-3">
            <span class="material-symbols-outlined align-middle ">
                local_fire_department
            </span>
            Trending 
        </h5>
        <p class="fs-9">Top trending Events</p>
    </div>
    <!--trending-->
    </div>

    <div class="col-sm-6 col-12">

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
                        <button class="text-decoration-none btn btn-dark border-0 px-4 py-3 shadow-sm w-100">Search</button>
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
                            <option value="northern_africa">Northern Africa</option>
                            <option value="eastern_africa">Eastern Africa</option>
                            <option value="western_africa">Western  Africa</option>
                            <option value="central_africa">Central Africa</option>
                            <option value="southern_africa">Southern Africa</option>
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


        <!--main content-->
        <div class="row position-relative">
            @forelse($ev_posts as $posts)
                <div class='col-sm-12 mb-3'>
                    <div class='px-3 py-3 border rounded feed-panel'>
                        <a class='text-decoration-none text-gray' href='{{route('read.ev', ['id'=> $posts->id, 'title'=> Str::slug($posts->title, '-')])}}'>
                            <h5 class='fw-bold m-0 p-0'>{{$posts->title}}</h5>
                        </a>
    
                        <small class="my-2 d-block text-sm text-secondary">Posted on: {{ date('D, M Y', strtotime($posts->created_at))}} 
                            <span></span>
                        </small>

                        <div class="overflow-hidden truncate mb-2 text-secondary">
                            <p class='m-0 fs-9'>{!! $truncated_text = Str::limit(strip_tags($posts->description), 200); !!}</p>
                           {{-- <span class='text-truncate bg-danger' style='min-width:500px;'>{!! $posts->description !!}</span> --}}
                        </div>

                        <p class='mb-3 fs-9 fw-bold' style='color:#457b9d'>
                            <span class="material-symbols-outlined align-middle">
                                pin_drop
                            </span>
                            {{$posts->location}}
                        </p>

                        {{-- <p class='my-3 p-0 text-danger fw-bold'>Event Date: {{ date('d, M Y', strtotime($posts->event_date))}}</p> --}}

                        <ul class="mb-2 p-0 label-list">
                            @isset( $posts->region)
                            <li class="mb-2">
                                <span class='data-labels'>
                                    {{ucwords(str_replace("_", " ", $posts->region));}},
                                </span>
                            </li>
                            @endisset

                            @isset( $posts->country)
                            <li class="mb-2">
                                <span class='data-labels'>
                                    {{ucwords(str_replace("_", " ", $posts->country));}}
                                </span>
                            </li>
                            @endisset
                        </ul>

                        
                        @isset($posts->event_date)
                        <p class='p-0 fw-bold fs-9'>{!! get_days_left($posts->event_date) !!}</p>
                        @endisset

                        <div class="d-flex justify-content-end">
                            <div class='position-relative'>
                                <div class="position-absolute share-panel border rounded d-none">
                                    <ul class='fs-9'>
                                        <li><a  class='text-decoration-none text-dark' href="https://api.whatsapp.com/send?text={{route('read.blog', ['id'=> $posts->id, 'title'=> Str::slug($posts->title, '-')])}}"
                                        ><img width="30" src="{{asset('img/gif/icons8-whatsapp.gif')}}" alt="whatsapp" > Whatapp</a></li>
                                        
                                        <li><a  class='text-decoration-none text-dark' href="https://t.me/share/url?url={{route('read.blog', ['id'=> $posts->id, 'title'=> Str::slug($posts->title, '-')])}}"
                                        ><img width="30" src="{{asset('img/gif/icons8-telegram.gif')}}" alt="telegram" > Telegram</a></li>
                                        
                                        {{-- <li><img width="30" src="{{asset('img/gif/icons8-linkedin.gif')}}" alt="linkedin" > Linkedin</li>
                                        <li><img width="30" src="{{asset('img/gif/icons8-twitter.gif')}}" alt="twitter" > Twitter</li>
                                        <li><img width="30" src="{{asset('img/gif/icons8-facebook.gif')}}" alt="facebook" > Facebook</li> --}}
                                    </ul>
                                </div>
                                <button class='me-3 text-decoration-none bprder-0 btn fs-9  px-2 py-2 'onClick="console.log(this.previousElementSibling.classList.toggle('d-none'))">
                                    <span class="material-symbols-outlined align-middle">
                                        share
                                    </span>
                                </button>
                            </div>

                            <div class=''>
                                <a   href='{{route('read.ev', ['id'=> $posts->id, 'title'=> Str::slug($posts->title, '-')])}}'
                                class='text-decoration-none btn p-0 px-2 fs-9 py-2 mb-2 '>
                                Details
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @empty 
                <div class="col-sm-12">
                    <div class="alert alert-warning text-center my-3">
                        <span class="fw-bold">Oops! No content found</span>
                    </div>
                </div>
            @endforelse

            <!--pagination-->
            <div class="row">
                <div class="col-sm-12">
            {{$ev_posts->links()}}
                </div>
            </div>
            <!--pagination-->

            </div>
        <!--main content-->

    </div>
    <div class="col-sm-3 col-12">

        <!--aside-->
        {{-- <div class="px-3 py-3 border rounded mb-3 bg-white">
            <small class="text-secondary d-block mb-3">Advertisement</small>
            <a href="https://kol.jumia.com/api/click/link/d85c6dd6-5eec-47e9-b103-577be07cf3f6/0c7c436a-7891-435c-a9fc-3881f7125b11">
            <img src="{{asset('img/ads_img/oraimo_stores.png')}}" width="100%" class='img-fluid' alt="oraimo">
            </a>
        </div> --}}
        <!--aside-->

        <!--aside-->
        <div class='px-3 py-3 rounded border mb-3 bg-white'>
            <!--logo-->
            <a href='./'>
            <img src="{{ asset('img/logo/trans/logo_trans_1.png')}}" width="90" class="img-fluid d-block mx-auto" alt="logo">
            </a>
            <!--logo-->
            <h5 class='fw-bold m-0 mb-3'>Submit Events</h5>
            <p class="fs-9 text-secondary">
            Submit a tech event. It's free.
            </p>
            <a href="https://docs.google.com/forms/d/e/1FAIpQLSfxDBVx1cxmooAkjjTaErpGuuaPPP1eoFUhgfQtHjtyz3IbaA/viewform?usp=sf_link" 
            target="_blank"
            class='btn btn-dark w-100 fs-9 py-3 my-3'>Submit</a>
        </div>
        <!--aside-->

        <!--aside-->
        <div class="px-3 py-3 bg-white border rounded">
            <small class="text-secondary d-block mb-3">Advertisement</small>
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
        </div>
        <!--aside-->

    </div>
</div>

@include('components/fixed_mobile_menu')
<!--body-->
</x-guest-layout>
