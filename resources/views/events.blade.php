<x-guest-layout>
<div class="row d-sm-none d-md-none d-lg-none">
    <div class="col-sm-12 text-center">
        <div class="py-5 ">
             <!--logo-->
             <a href='./'>
                <img src="{{ asset('img/logo/trans/logo_trans_1.png')}}" width="90" class="img-fluid" alt="logo">
                </a>
            <!--logo-->
            <h1 class='fw-bold mb-3'>Discover Events</h1>
            <p class=''>Discover the Latest Events in Africa</p>
        </div>  
    </div>
</div>

{{-- @include('components/custom_nav') --}}

<div class="container">


    <!--body-->
    <div class="row">
        <div class="col-sm-3 col-12">

        <!--trending-->
        <div class="py-3 px-3 bg-white border rounded mb-3 d-none d-sm-block d-md-block d-lg-block">
            <h5 class="fw-bold m-0 mb-3">
                <span class="material-symbols-outlined align-middle ">
                    local_fire_department
                </span>
                Trending 
            </h5>
            <p class="fs-9">Top trending Events</p>
        </div>
        <!--trending-->
    
        <!--aside-->
        <div class="mb-3 bg-white d-none d-sm-block d-md-block d-lg-block">
            {{-- <small class="text-secondary d-block mb-3">Advertisement</small> --}}
            <a href="https://kol.jumia.com/api/click/link/d85c6dd6-5eec-47e9-b103-577be07cf3f6/0c7c436a-7891-435c-a9fc-3881f7125b11">
            <img src="{{asset('img/ads_img/oraimo_stores.png')}}" width="100%" class='img-fluid' alt="oraimo">
            </a>
        </div>
        <!--aside-->
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
                    <div class="col-sm-12">
                        <select class="form-select py-3 mb-3 text-secondary fs-9" name="event_type" id="event_type">
                            <option value="">Event Type</option>
                            <option value="in_person">In-Person Gatherings</option>
                            <option value="virtual">Virtual Gatherings</option>
                            <option value="hybrid">Hybrid Events (Combining Online and Offline)</option>
                        </select>  
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <select class="form-select py-3 mb-3 text-secondary fs-9" id="event_status" name="event_status"  aria-label="Select News">
                            <option value="">All Events</option>
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
    
            <div class="alert alert-info fs-9 d-flex border-0 align-items-center" role="alert">
                <p class='m-0'>
                <span class="material-symbols-outlined align-middle">
                info
                </span>
                </p>
                <p class='m-0 fs-9 px-3'>
                <strong>Feedback</strong>
                <span class='d-block'>To share your thoughts, no how we can improve your experience, please send us your feedback</span>
                <a href={{route('feedback')}} class='btn btn-dark inline-block fs-9 my-1'>Send feedback</a>
                </p>
            </div>
            
            <!--main content-->
            <div class="row">
                <div class="col-sm-12">
                    <span id="search-result"></span>
                    <span id="filter-entries"></span>
                    <div id="opportunity-feeds"></div>
                    <div id="pagination"></div>
                </div>
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
    <div class="bg-white">
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
    </div>
    <!--body-->
    
    
    
    @include('components/fixed_mobile_menu')
    
    
    <script>

function formatString(input) {
    if (typeof input !== 'string' || input.trim().length === 0) {
        return '';
    }

    let formatted = input.replace(/_/g, ' ');
    formatted = formatted.charAt(0).toUpperCase() + formatted.slice(1);
    formatted = formatted.replace(/\s/g, '');
    return formatted;
}
    
    function removeUnderscore(str) {
      if (typeof str !== 'string') {
      return str;
      }
      return str.replace(/_/g, ' ');
    }
    
    
    
    const imageSrc = '{{ asset('img/gif/cube_loader.gif') }}';
    
    //fetch api to access data 
    window.addEventListener("load", function(){
        document.querySelector('#opportunity-feeds').innerHTML = `<img src="${imageSrc}" class="img-fluid d-block mx-auto my-5" alt="loading..." />`;
        fetch('/search-events')
        .then((r)=> {
            document.querySelector('#opportunity-feeds').innerHTML = '';
            return r.json();
        })
        .then((d)=>{
            /**display pagination**/
            if(d.total > 10){
                displayPagination(d, "#pagination");
            }
            /**display profile**/
            displayResult(d,"#opportunity-feeds");   
        })
        .catch((e)=> console.log(e));
    })
    
    function formatDate(inputDate) {
      const date = new Date(inputDate);
      // Format day with suffix (e.g., "1st", "2nd", "3rd", "4th", etc.)
      const day = date.getDate();
      const dayWithSuffix = day + (
        (day === 1 || day === 21 || day === 31) ? "st" :
        (day === 2 || day === 22) ? "nd" :
        (day === 3 || day === 23) ? "rd" :
        "th"
      );
      // Format month using its name
      const monthNames = [
        "Jan", "Feb", "Mar", "Apr", "May", "Jun",
        "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
      ];
      const month = monthNames[date.getMonth()];
      // Format year
      const year = date.getFullYear();
      // Concatenate the formatted parts to get the final formatted date
      const formattedDate = `${dayWithSuffix}, ${month} ${year}`;
      return formattedDate;
    }
    
    /**truncate text**/
    function truncateText(text, limit) {
      // Remove HTML tags from the text using a regular expression
      const withoutTags = text.replace(/<\/?[^>]+(>|$)/g, '');
      // Truncate the text to the specified limit
      const truncatedText = withoutTags.substring(0, limit);
      // Add "..." at the end if the original text exceeds the limit
      if (withoutTags.length > limit) {
        return truncatedText + '...';
      }
      return truncatedText;
    }
    
    //return page url 
    function pageLink(title, id) {
      // Convert title to lowercase and replace spaces with hyphens
      const formattedTitle = title.toLowerCase().replace(/\s+/g, '-').replace(/[^a-zA-Z0-9'-]/g, '').replace(/--+/g, '-').replace(/^-|-$/g, '').trim();
      
      // Implement the logic to generate the post link
      let link = `ev/${id}/${encodeURIComponent(formattedTitle)}`;
      return link;
    }
    
    
    
    
    function getDaysLeft(deadline) {
      const deadlineTimestamp = new Date(deadline).getTime();
      const nowTimestamp = Date.now();
      const secondsLeft = Math.floor((deadlineTimestamp - nowTimestamp) / 1000);
    
      if (secondsLeft <= 0) {
        return "<span style='color: #c1121f;'>Expired</span>";
      } else {
        const daysLeft = Math.floor(secondsLeft / (60 * 60 * 24));
        if (daysLeft === 0) {
          return "<span style='color: #c1121f;'>Last day</span>";
        } else if (daysLeft === 1) {
          return "<span style='color: #c1121f;'>1 Day Left</span>";
        } else {
          const daysText = daysLeft + (daysLeft > 1 ? ' days' : ' day');
          if (daysLeft > 7) {
            return "<span style='color: #2a9d8f;'>" + daysText + " Left</span>";
          } else {
            return "<span style='color: #c1121f;'>" + daysText + " Left</span>";
          }
        }
      }
    }
    
    function generateListItems(data) {
      // Check if 'data' is a non-empty string
      if (typeof data === 'string' && data.trim() !== '') {
        // Split 'data' by commas to get individual items
        const items = data.split(',');
    
        // Generate list items for each item and join them together
        const listItems = items
          .map((item) => {
            // Convert 'item' to title case
            const titleCasedItem = item
              .trim()
              .replace(/_/g, ' ')
              .replace(/\w\S*/g, (word) => word.charAt(0).toUpperCase() + word.slice(1));
    
            // Create and return the list item as a string
            return `<li class="list-item"><span class="data-labels">${titleCasedItem}</span></li>`;
          })
          .join('');
    
        // Return the concatenated list items
        return listItems;
      } else {
        // Return an empty string if 'data' is not a valid string
        return '';
      }
    }
    
    
    /**
     * clear search filters
     * */
    
    function clearFilters(){
         // Clear the search keyword input
         document.getElementById("keyword").value = "";
    
        // Clear the selected option in each select element
        var selectElements = document.getElementsByTagName("select");
        for (var i = 0; i < selectElements.length; i++) {
            selectElements[i].selectedIndex = 0;
        }
    
        // Clear the output divs for regions, countries, and continents
        document.getElementById("outputRegionsList").innerHTML = "";
        document.getElementById("outputCountriesList").innerHTML = "";
        document.getElementById("outputContinentsList").innerHTML = "";
    
        // Clear the hidden input fields for regions, countries, and continents
        document.getElementById("selectedRegions").value = "";
        document.getElementById("selectedCountries").value = "";
        document.getElementById("selectedContinents").value = "";
    
        document.getElementById('filter-entries').innerHTML = "";
        document.getElementById("search-result").innerHTML = "";
    
        document.querySelector('#opportunity-feeds').innerHTML = `<img src="${imageSrc}" class="img-fluid d-block mx-auto my-5" alt="loading..." />`;
        fetch('/search-events')
        .then((r)=> {
            document.querySelector('#opportunity-feeds').innerHTML = '';
            document.querySelector('#pagination').innerHTML = '';
            return r.json();
        })
        .then((d)=>{
            /**display pagination**/
            if(d.total > 10){
                displayPagination(d, "#pagination");
            }
            /**display profile**/
            displayResult(d,"#opportunity-feeds");   
        })
        .catch((e)=> console.log(e));
    }
    
    /**
     * Submit search Query
        */
    
    function submitSearchQuery(){
       document.getElementById("pagination").innerHTML = "";
       event.preventDefault();
       let search_form = document.getElementById("search_keyword");
       let form_data = new FormData(search_form);
    
        // Create a URLSearchParams object and append the FormData entries
      const urlParams = new URLSearchParams();
      for (const [key, value] of form_data.entries()) {
        urlParams.append(key, value);
      }
    
    // Check if any of the values in urlParams is not empty
    const nonEmptyValuesSet = new Set();
    
    for (const value of urlParams.values()) {
      if (value !== "") {
        nonEmptyValuesSet.add(value);
      }
    }
    
    const nonEmptyValue = Array.from(nonEmptyValuesSet);
    document.getElementById('filter-entries').innerHTML = "";
    
      //set output if search quries are set
      if(nonEmptyValue.length > 0){
        document.getElementById('filter-entries').innerHTML ="<span class='d-inline-block mb-3 me-1'>Filters: <span>";
        for (let i = 0; i < nonEmptyValue.length; i++) {
            const value = nonEmptyValue[i];
            document.getElementById('filter-entries').innerHTML += `<span class='fs-9 d-inline-block me-3 text-secondary'> ${removeUnderscore(value)}</span>`;
        }
        document.getElementById('filter-entries').innerHTML += `<button class='btn btn-dark fs-8 mb-1' onclick='clearFilters()'>Clear filter</button>`;
      }
    
      // Construct the URL with the parameters
      const url = `search-events?${urlParams.toString()}`
    
       fetch(url).then((r)=> {
            document.querySelector('#opportunity-feeds').innerHTML = '';
            // console.log(r);
            return r.json();
        })
        .then((d)=>{
            console.log(d);
            /**display profile**/
    
            if(nonEmptyValue.length > 0){
                document.getElementById("search-result").innerHTML =   `<span class='d-block fs-9 mb-3'>${d.total} result found</span>`;
            }else{
                document.getElementById("search-result").innerHTML = '';
            }
    
            displayResult(d,"#opportunity-feeds");   
            if(d.total > 10){
                /**display pagination**/
                displayPagination(d, "#pagination", url);
            }else if(d.total > 0){
                document.getElementById("pagination").innerHTML = "";
            }else{
                document.getElementById("pagination").innerHTML = "<h4 class='fw-bold text-center my-5'>Oops... No content found!</h4>";
            }
        })
        .catch((e)=> console.log(e));
    
    }
    
    /**Display profile**/
    function displayResult(d, elem){
        d.data.map((o)=>{
        document.querySelector(elem)
        .innerHTML += `<div class='col-sm-12 mb-3'>
        <div class='px-3 py-3 border rounded feed-panel text-wrap w-100'>
            <a class='text-decoration-none text-gray' href='${pageLink(o.title, o.id)}'>
            <h6 class='fw-bold m-0 mb-1 p-0'>${o.title}</h6>
            </a>
            <p class="m-0 mb-2 d-block fs-9 text-sm text-secondary">
            Posted on: ${formatDate(o.created_at)}
            </p>

            <div class="overflow-hidden truncate">
            <p class='m-0 mb-2 md-block fs-9 text-sm text-secondary'>${truncateText(o.description, 200)}</p>
            </div>

            <ul class="m-0 mb-2 d-block p-0 label-list">
            ${
                generateListItems(o.continent)
            }
            ${
                generateListItems(o.region)
            }
            ${
                generateListItems(o.country)
            }
            ${
                generateListItems(o.category)
            }
            </ul>

            <div class='row fs-9'>
                <div class='col-sm-4'>
                    <div class='my-2'>
                        <span class="material-symbols-outlined align-middle">
                        face
                        </span>
                        ${formatString(o.event_type)}
                    </div>
                </div>

                <div class='col-sm-8'>
                    <div class='my-2'>
                        <span class='' style='color:#457b9d'>
                            <span class="material-symbols-outlined align-middle">
                                pin_drop
                            </span>
                        ${((o.location == null)? '' : o.location)}
                        </span>
                    </div>
                </div>
            </div>

            <div class='mt-2'>
                ${
                o.event_date
                    ? `<p class='m-0 fs-9'>${getDaysLeft(o.event_date)}</p>`
                    : ""
                }
            </div>
           

            <div class="d-flex justify-content-end">
            <div class='position-relative'>
            <div class="position-absolute share-panel border rounded d-none">
                <ul class='m-0 p-0 fs-9'>
                    <li><a class='text-decoration-none text-dark' href="https://api.whatsapp.com/send?text=https://media.edatsu.com/${pageLink(o.title, o.id)}"
                        target="_blank"><img width="30" src="{{asset('img/gif/icons8-whatsapp.gif')}}" alt="whatsapp"> WhatsApp</a></li>
    
                    <li><a class='text-decoration-none text-dark' href="https://t.me/share/url?url=https://media.edatsu.com/${pageLink(o.title, o.id)}"
                        target="_blank"><img width="30" src="{{asset('img/gif/icons8-telegram.gif')}}" alt="telegram"> Telegram</a></li>
                    
                    <li><a class='text-decoration-none text-dark' href="https://twitter.com/intent/tweet?url=https://media.edatsu.com/${pageLink(o.title, o.id)}"
                        target="_blank"><img width="30" src="{{asset('img/gif/icons8-twitter.gif')}}" alt="twitter"> Twitter</a></li>
                    
                    <li><a class='text-decoration-none text-dark' href="https://www.linkedin.com/sharing/share-offsite/?url=https://media.edatsu.com/${pageLink(o.title, o.id)}"
                        target="_blank"><img width="30" src="{{asset('img/gif/icons8-linkedin.gif')}}" alt="linkedin"> LinkedIn</a></li>
                </ul>
            </div>
            <button class='me-3 text-decoration-none bprder-0 btn fs-9 px-2 py-2' onClick="this.previousElementSibling.classList.toggle('d-none')">
                <span class="material-symbols-outlined align-middle">
                    share
                </span>
            </button>
            </div>
            <div class=''>
                <a class='text-decoration-none bprder-0 btn fs-9 px-2 py-2' href='${pageLink(o.title, o.id)}'>Read More</a>
            </div>
            </div>
        </div>
        </div>`;
            })
    }
    
    
    /**display pagination**/
    function displayPagination(d, elem){
    d.links.map((p)=>{
        // let active = "#FCCD29";
        let active_bg =  (p.active)? "#FB5607" : '';
        let active_txt = (p.active)? "#252422" : '';
        console.log(p);
            if(p.url !== null){
            document.querySelector(elem)
            .innerHTML +=  ` <a id='${p.url}' class='btn btn-dark border-0 me-2 mb-2 px-3  text-light' 
            style='background-color:${active_bg}; color:${active_txt}'
            onclick='callPagination(this.id);'>${p.label}</button> `;
            }  
    })
    }
    
    
    /***call pagination**/
    function callPagination(url){
        document.querySelector('#opportunity-feeds').innerHTML = "<i class='d-block mb-3'>Oops! No content found</i>";
        if(url == 'null'){
            return false;
        }else{
            document.querySelector('#opportunity-feeds').innerHTML =   `<img src="${imageSrc}" class="img-fluid d-block mx-auto my-5" alt="loading..." />`;
            fetch(url)
            .then((r)=> {
                document.querySelector('#opportunity-feeds').innerHTML = '';
                document.querySelector('#pagination').innerHTML = '';
                return  r.json();
            })
            .then((d)=>{
                /**display pagination**/
                console.log(d);
                displayPagination(d, "#pagination");
                /**display profile**/
                displayResult(d,"#opportunity-feeds");   
            })
            .catch((e)=> console.log(e));
        }
    }
    
    
    //toggle search filter 
    function toggleContent() {
      console.log('click');
      var element = document.getElementById("filter-toggle");
      var toggle_btn = document.getElementById("filter-panel");
      toggle_btn.classList.toggle('d-none');
      console.log(element.innerHTML);
      if (element.innerHTML.trim() === "toggle_off") {
        // console.log('toggle-on');
        element.innerHTML = "toggle_on";
      } else {
        // console.log('toggle-off')
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
                    listItem.classList.add('filter-label');
                    listItem.textContent = trimmedValue.replaceAll('_', ' ');
    
                    const deleteButton = document.createElement('button');
                    deleteButton.classList.add('filter-label-delete');
                    deleteButton.textContent = 'x';
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
    initializeSelect('category', 'selectedCategories', 'outputCategoryList');
    initializeSelect('region', 'selectedRegions', 'outputRegionsList');
    initializeSelect('country', 'selectedCountries', 'outputCountriesList');
    initializeSelect('continent', 'selectedContinents', 'outputContinentsList');
    
    </script>
    
    </x-guest-layout>
    