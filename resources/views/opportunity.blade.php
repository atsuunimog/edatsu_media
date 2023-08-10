<x-guest-layout>
    <div class="row">
        <div class="col-sm-12 text-center">
            <div class="py-5">
                <!--logo-->
                <a href='./'>
                <img src="{{ asset('img/logo/trans/logo_trans_1.png')}}" width="90" class="img-fluid" alt="logo">
                </a>
                <!--logo-->
                <h1 class='fw-bold'>Tech Opportunities</h1>
                <p class=' m-0 text-secondary'>Discover the Latest Tech & Financing Opportunities in Africa</p>
            </div>  
        </div>
    </div>
    
    <div class="row">
        <div class="col-sm-12">
            <ul class='list-inline m-0 py-3'>
                <?php $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';?>
    
                <li class="list-inline-item"><a href='{{url('news-feed')}}' 
                    class='text-decoration-none btn fs-9  btn-gray border-0 px-4 py-2 shadow-sm mb-2'
                    {{(url()->current() == $protocol.$_SERVER['HTTP_HOST'].'/news-feed')? 'bg-green' : 'bg-gray'}}>News Feed</a>
                </li>
    
                <li class="list-inline-item"><a href='{{url('/')}}' 
                    class='text-decoration-none fs-9 bprder-0 btn btn-green border-0 px-4  text-light py-2 shadow-sm mb-2'
                    {{(url()->current() == $protocol.$_SERVER['HTTP_HOST'])? 'bg-green' : 'bg-gray'}}>Opportunites</a>
                </li>
    
                <li class="list-inline-item "><a href='{{url('events')}}' 
                    class='text-decoration-none btn fs-9 btn-gray border-0 px-4 py-2 shadow-sm mb-2
                    {{(url()->current() == $protocol.$_SERVER['HTTP_HOST'].'/events')? 'bg-green' : 'bg-gray'}}'>Tech Events
                </a></li>
    
                <li class="list-inline-item">
                        @if (isset(Auth::user()->role))
                        <a href="{{ url('/dashboard') }}" class="text-decoration-none">Dashboard</a>
                    @else
                        @auth
                        <a href="{{ route('login') }}" class="text-decoration-none">Login</a>
                        @endauth
                    @endif
            </li>
            </ul>
        </div>
    </div>
    
    <!--body-->
    <div class="row">
        <div class="col-sm-3 col-12">
            <div class="py-3 px-3 bg-white border rounded">
                <h5 class="fw-bold m-0 mb-3">
                    <span class="material-symbols-outlined align-middle ">
                        local_fire_department
                    </span>
                    Trending 
                </h5>
                <p>Top trending opportunites</p>
                <ul class="list-unstyled">
                </ul>
            </div>
        </div>
    
        <div class="col-sm-6 col-12">
    
        <!--news filter-->
            <form class="" method="GET" id="search_keyword">
                <div class="row">
                    <div class="col-sm-9">
                    <input type='text' class="form-control py-3 mb-3 fs-9 text-secondary" name="keyword" placeholder="Search Keywords" id="keyword">
                    </div>
                    <div class="col-sm-3 ">
                        <button class="text-decoration-none btn btn-gray border-0 px-4 py-3 shadow-sm w-100">Search</button>
                    </div>
                </div>
    
                <div  class="py-3 px-3 border mb-3 bg-white rounded">
                <span class="material-symbols-outlined align-middle cursor" style='cursor:pointer' id="filter-toggle" onclick="toggleContent()">toggle_off</span>
                <span class="fs-9">Use filters to improve search</span>
                </div>
    
                <div  id="filter-panel" class="bg-white border rounded px-3 py-3 mb-3 d-none">
                <div class="row">
                    <div class="col-sm-6">
                        <select class="form-select py-3 mb-3 text-secondary fs-9" name="opp_status" aria-label="Opportunity Status">
                            <option selected value=''>Select Status</option>
                            <option value='active'>Active</option>
                            <option value='expired'>Expired</option>
                        </select>
                    </div>
    
                    <div class="col-sm-6">
                        <select class="form-select py-3 mb-3 text-secondary fs-9" id="region" name="feeder" aria-label="Select News">
                            <option value="">Select Region</option>
                            <option value="northern_africa">Northern Africa</option>
                            <option value="eastern_africa">Eastern Africa</option>
                            <option value="western_africa">Western  Africa</option>
                            <option value="central_africa">Central Africa</option>
                            <option value="southern_africa">Southern Africa</option>
                        </select>
                        <input type="text" name="region" id="selectedRegions" readonly>
                        <div id="outputRegionsList"></div>
                    </div>
                </div>
    
                <div class="row">
                    <div class="col-sm-6">
                        <select class="form-select py-3 mb-3 text-secondary fs-9" id="country" >
                            @include('components.countrylist')
                        </select>
                        <input type="text" name="country" id="selectedCountries" readonly>
                        <div id="outputCountriesList"></div>
                    </div>
    
                    <div class="col-sm-6">
                        <select class="form-select py-3 mb-3 text-secondary fs-9" id="continent" >
                            <option selected="selected" value="">Select Continent</option>
                            <option value="global">Global</option>
                            <option value="africa">Africa</option>
                            <option value="antarctica">Antarctica</option>
                            <option value="asia">Asia</option>
                            <option value="europe">Europe</option>
                            <option value="north_america">North America</option>
                            <option value="australia">Australia (or Oceania/Australasia)</option>
                            <option value="south_america">South America</option>
                        </select>
                        <input type="text" name="continent" id="selectedContinents" readonly>
                        <div id="outputContinentsList"></div>
                    </div>
                </div>
    
                <div class="row">
                    <div class="col-sm-6">
                        <select class="form-select py-3 mb-3 text-secondary fs-9" name="feeder" aria-label="Select News">
                            <option selected value="">Select Month</option>
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
                        <select class="form-select py-3 mb-3 text-secondary fs-9" name="feeder" aria-label="Select News">
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
                </div>
            </form>
            <!--news filter-->
            
            <!--main content-->
            <div class="row">
                @forelse($opp_posts as $posts)
                    <div class='col-sm-12 mb-3'>
                        <div class='px-3 py-3 border rounded feed-panel text-wrap w-100'>
                           
                            <a class='text-decoration-none text-gray' href='{{route('read.blog', ['id'=> $posts->id, 'title'=> Str::slug($posts->title, '-')])}}'>
                            <h5 class='fw-bold m-0 p-0'>{{$posts->title}}</h5>
                            </a>
    
                            <p class="my-2 d-block fs-9 text-sm text-secondary">
                            Posted on: {{ date('D, M Y', strtotime($posts->created_at)) }}
                            </p>
                           
                            <div class="overflow-hidden truncate mb-2">
                               <p class='m-0 fs-9 text-secondary'> {!! $truncated_text = Str::limit(strip_tags($posts->description), 200); !!}</p>
                                {{-- <span class='text-truncate bg-danger' style='min-width:500px;'>{!! $posts->description !!}</span> --}}
                            </div>
                            
                            <ul class="mb-2 p-0 label-list">
                                @isset( $posts->continent)
                                <li class="">
                                    <span class='data-labels fs-9   fw-bold'>
                                        {{ucwords(str_replace("_", " ", $posts->continent));}}
                                    </span>
                                </li>
                                @endisset
    
                                @isset( $posts->region)
                                <li class="">
                                    <span class='data-labels fs-9   fw-bold'>
                                    {{ucwords(str_replace("_", " ", $posts->region));}}
                                    </span>
                                </li>
                                @endisset
    
                                @isset($posts->country)
                                <li class="">
                                    <span class='data-labels fs-9  fw-bold'>
                                    {{$posts->country}}
                                    </span>
                                </li>
                                @endisset
                            </ul>
    
                            @isset($posts->deadline)
                            <p class='m-0 fw-bold fs-9'>{!! get_days_left($posts->deadline) !!}</p>
                            @endisset
    
                        <div class="d-flex justify-content-end">
                            <div class='position-relative'>
                                <div class="position-absolute share-panel border rounded shadow d-none">
                                    <ul class='m-0 p-0 fs-9'>
                                        <li><a  class='text-decoration-none text-dark' href="https://api.whatsapp.com/send?text={{route('read.blog', ['id'=> $posts->id, 'title'=> Str::slug($posts->title, '-')])}}"
                                        ><img width="30" src="{{asset('img/gif/icons8-whatsapp.gif')}}" alt="whatsapp" > Whatapp</a></li>
                                        
                                        <li><a  class='text-decoration-none text-dark' href="https://t.me/share/url?url={{route('read.blog', ['id'=> $posts->id, 'title'=> Str::slug($posts->title, '-')])}}"
                                        ><img width="30" src="{{asset('img/gif/icons8-telegram.gif')}}" alt="telegram" > Telegram</a></li>
                                        
                                        {{-- <li><img width="30" src="{{asset('img/gif/icons8-linkedin.gif')}}" alt="linkedin" > Linkedin</li>
                                        <li><img width="30" src="{{asset('img/gif/icons8-twitter.gif')}}" alt="twitter" > Twitter</li>
                                        <li><img width="30" src="{{asset('img/gif/icons8-facebook.gif')}}" alt="facebook" > Facebook</li> --}}
                                    </ul>
                                </div>
                                <button class='me-3 text-decoration-none bprder-0 btn fs-9 px-2 py-2' onClick="console.log(this.previousElementSibling.classList.toggle('d-none'))">
                                    <span class="material-symbols-outlined align-middle">
                                        share
                                    </span>
                                </button>
                             </div>
    
                            <div class=''>
                                <a class='text-decoration-none bprder-0 btn fs-9 px-2 py-2' 
                                    href='{{route('read.blog', ['id'=> $posts->id, 'title'=> Str::slug($posts->title, '-')])}}'>
                                    Read More
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
                    {{$opp_posts->links()}}
                    </div>
                </div>
                <!--pagination-->
    
                </div>
            <!--main content-->
        </div>
        <div class="col-sm-3 col-12">
    
        <!--aside-->
        <div class="px-3 py-3 border rounded mb-3 bg-white">
            <small class="text-secondary d-block mb-3">Advertisement</small>
            <a href="https://kol.jumia.com/api/click/link/d85c6dd6-5eec-47e9-b103-577be07cf3f6/0c7c436a-7891-435c-a9fc-3881f7125b11">
            <img src="{{asset('img/ads_img/oraimo_stores.png')}}" width="100%" class='img-fluid' alt="oraimo">
            </a>
        </div>
        <!--aside-->
          
        <!--aside-->
        <div class='px-3 py-3 rounded border mb-3 bg-white'>
            <!--logo-->
            <a href='./'>
            <img src="{{ asset('img/logo/trans/logo_trans_1.png')}}" width="90" class="img-fluid d-block mx-auto" alt="logo">
            </a>
            <!--logo-->
            <h5 class='fw-bold m-0 mb-3'>Submit Opportunities</h5>
            <p class='fs-9 text-secondary'>
                Let's unlock opportunities together! Share helpful tech and entrepreneurial opportunities. It's free.
            </p>
            <a href="https://docs.google.com/forms/d/e/1FAIpQLSd-1Nwy3SUnsjvseBtjmQQSxTEobuMDu2_CXWPMDpxWz2n4mQ/viewform?usp=sf_link" 
            target="_blank"
            class='btn btn-dark w-100 fs-9 py-3 my-3'>Submit</a>
        </div>
        <!--aside-->
    
    <!--aside-->
    {{-- <div class='px-3 py-3 rounded border mb-3 bg-white d-none'>
        <!--logo-->
        <p class='fw-bold m-0 mb-2'>Trending</p>
        <p class='m-0 fs-9 text-secondary'>
            Let's unlock opportunities together! Share helpful tech and entrepreneurial prospects. 
            Collaboration amplifies our impact
        </p>
    </div> --}}
    <!--aside-->
    
    <!--aside-->
    <div class="px-3 py-3 bg-white border rounded">
        <small class="text-secondary d-block mb-3">Advertisement</small>
        <!--google ads-->
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7365396698208751"
           crossorigin="anonymous"></script>
      <!-- edatsu side nav -->
      <ins class="adsbygoogle"
           style="display:block"
           data-ad-client="ca-pub-7365396698208751"
           data-ad-slot="6157758086"
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
    <!--body-->
    <script>
    
    //toggle search filter 
    function toggleContent() {
      console.log('click');
     
      var element = document.getElementById("filter-toggle");
      var toggle_btn = document.getElementById("filter-panel");
      toggle_btn.classList.toggle('d-none');
      if (element.innerHTML === "toggle_off") {
        console.log('toggle-on');
        element.innerHTML = "toggle_on";
      } else {
        console.log('toggle-off')
        element.innerHTML = "toggle_off";
      }
    }
    
    
    /**select multiple options tags**/
    function initializeSelect(selectId, inputId, outputId) {
        const selectElement = document.getElementById(selectId);
        const inputField = document.getElementById(inputId);
        const outputList = document.getElementById(outputId);
    
    
        function updateInputField() {
            console.log('works');
            const selectedOptions = Array.from(selectElement.selectedOptions).map(option => option.value);
            const existingValues = inputField.value.split(',').map(value => value.trim());
            const uniqueValues = [...new Set([...existingValues, ...selectedOptions])];
            inputField.value = uniqueValues.filter(Boolean).join(', ');
            updateOutputList(uniqueValues);
        }
    
        function updateOutputList(values) {
            outputList.innerHTML = '';
    
            values.forEach(value => {
                const trimmedValue = value.trim();
    
                if (trimmedValue !== '') {
                    const listItem = document.createElement('div');
                    listItem.textContent = trimmedValue;
    
                    const deleteButton = document.createElement('button');
                    deleteButton.textContent = 'Delete';
                    deleteButton.addEventListener('click', () => {
                        removeItem(trimmedValue);
                        listItem.remove();
                    });
    
                    listItem.appendChild(deleteButton);
                    outputList.appendChild(listItem);
                }
            });
        }
    
        function removeItem(value) {
            const existingValues = inputField.value.split(',').map(val => val.trim());
            const updatedValues = existingValues.filter(val => val !== value);
            inputField.value = updatedValues.join(', ');
            updateOutputList(updatedValues);
    
            // Set the selectId to a default option
            selectElement.selectedIndex = 0;
        }
    
        selectElement.addEventListener('change', updateInputField);
    }
    
    // Example usage
    initializeSelect('region', 'selectedRegions', 'outputRegionsList');
    initializeSelect('country', 'selectedCountries', 'outputCountriesList');
    initializeSelect('continent', 'selectedContinents', 'outputContinentsList');
    
    </script>
    
    </x-guest-layout>
    