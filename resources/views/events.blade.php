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
    
            <div class="alert alert-warning fs-9 d-flex border-0 align-items-center rounded-0" role="alert">
                <p class='m-0'>
                <span class="material-symbols-outlined align-middle">
                info
                </span>
                </p>
                <p class='m-0 fs-9 px-3'>
                    <span class='d-block'>How should we improve this service? 
                    <a class="text-decoration-none fw-bold" href={{route('feedback')}}>
                        Send Feedback
                    </a>
                </p>
            </div>

            <h3 class="m-0 fw-bold mb-3 text-secondary">Events</h3>
            
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

             <!--cavet-->
             <div class="my-5">
                <div>
                    <p class="fw-bold">Disclaimer</p>
                    <p class="fs-8 text-secondary">
                        Edatsu Media, as a media company focused on aggregating helpful business information, hereby declares that it is not directly affiliated or associated with any events, awards, sponsorships, or competitions unless explicitly stated otherwise. While we strive to provide accurate and up-to-date information, any references or mentions of such events, awards, sponsorships, or competitions within our content are purely for informational purposes and should not be construed as endorsement or sponsorship by Edatsu Media. 
                    </p>
                </div>
            </div>

            <!--caveat-->
        </div>




        <div class="col-sm-4 col-12">
    
        <!--aside-->
        {{-- <div class="px-3 py-3 border rounded mb-3 bg-white">
            <small class="text-secondary d-block mb-3">Advertisement</small>
            <a href="https://kol.jumia.com/api/click/link/d85c6dd6-5eec-47e9-b103-577be07cf3f6/0c7c436a-7891-435c-a9fc-3881f7125b11">
            <img src="{{asset('img/ads_img/oraimo_stores.png')}}" width="100%" class='img-fluid' alt="oraimo">
            </a>
        </div> --}}
        <!--aside-->


    <!--aside-->
    <div class='px-3 py-3 rounded border mb-3 bg-white mt-3'>
        <!--logo-->
        <a href='./'>
        <img src="{{ asset('img/logo/trans/logo_trans_1.png')}}" width="90" class="img-fluid d-block mx-auto" alt="logo">
        </a>
        <!--logo-->
        <h5 class='fw-bold m-0 mb-3'>Submit Events</h5>
        <p class='fs-8 text-secondary'>
            Submit tech and entrepreneurial events; while we accept only a limited number of posts each week, our service is free. 
            Please read our <a href="" class="fw-bold text-primary text-decoration-none">terms and conditions</a> to understand the criteria for your submission
        </p>
        <a href="https://docs.google.com/forms/d/e/1FAIpQLSfxDBVx1cxmooAkjjTaErpGuuaPPP1eoFUhgfQtHjtyz3IbaA/viewform?usp=sf_link" 
        target="_blank"
        class='btn btn-dark w-100 fs-9 py-3 my-3'>Submit</a>
    </div>
    <!--aside-->

            <!--aside-->
    <div class="bg-white mb-3 border rounded">
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


       <!--whats app channel-->
       {{-- <div class="container mb-3 py-3 rounded bg-white border">
        <div class="row">
            <div class="col-sm-3">
                <img class="img-fluid" src="data:image/png;base64,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">
            </div>
            <div class="col-sm-9">
                <h6 class="mb-1 fw-bold">Follow our whatsapp channel</h6>
                <span class="fs-8 text-secondary d-block">
                    Follow us on whatsapp for updates and instant notifications
                </span>
            </div>
        </div>
    </div> --}}
    <!--whats app channel-->
       

    
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
    

    
        </div>
    </div>
    </div>
    <!--body-->
    

        <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
  <!--close modal-->
    
    
    
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
        .innerHTML += `<div class='col-sm-12 mb-4'>
        <div class='px-3 py-3 border rounded feed-panel text-wrap w-100 position-relative'>

            @auth
        <div class='position-absolute custom-toggle-menu d-none'>
            <div class="dropdown">
            <button class="btn btn-light shadow-sm p-0 border bg-white rounded-circle" 
            style='width:40px; height:40px;' type="button" 
            data-bs-toggle="dropdown" aria-expanded="false">

            <span class="material-symbols-outlined align-middle">
            list
            </span>
            </button>
            <ul class="dropdown-menu fs-9">
                
                <li class="dropdown-item">
                        <a class="d-flex align-items-center 
                        text-decoration-none justify-content-between" href="/admin-edit-opportunity/${o.id}">
                        <div>Edit</div>
                        <div>
                            <span class='material-symbols-outlined align-middle me-2'>
                            edit_note
                            </span>
                        </div>
                        </a>
                    </li>


                <li class="dropdown-item d-flex align-items-center 
                        text-decoration-none justify-content-between" data-bs-toggle="modal" data-bs-target="#exampleModal" >
                        <div>Report</div>
                        <div>
                            <span class='material-symbols-outlined align-middle me-2'>
                            flag
                            </span>
                        </div>
                    </li>

                    <li class="dropdown-item d-flex align-items-center 
                        text-decoration-none justify-content-between">
                        <div>Bookmark</div>
                        <div>
                            <span class='material-symbols-outlined align-middle me-2'>
                            bookmark
                            </span>
                        </div>
                    </li>

                    <li class="dropdown-item d-flex align-items-center justify-content-between">
                        <div>Share</div>
                        <div>
                            <span class='material-symbols-outlined align-middle me-2'>
                            share
                            </span>
                        </div>
                    </li>


            </ul>
            </div>
        </div>
        @endauth

            <a class='text-decoration-none text-gray' href='${pageLink(o.title, o.id)}'>
                <h5 class="fw-bold inline-block m-0 pe-5" style="font-size:1em;">${o.title}</h5>
            </a>
            
            <ul class="list-unstyled my-2  d-block fs-8 text-sm">
                <li class="p-0 m-0 my-2">
                    Posted on: ${formatDate(o.created_at)}
                </li>
            </ul>

            <div class="overflow-hidden truncate">
            <p class="p-0 m-0 fs-8 m-0 text-secondary d-block">${truncateText(o.description, 200)}</p>
            </div>

            <p class='my-2 fs-8 text-uppercase fw-bold'>Deadline: ${
                o.event_date
                ? `${getDaysLeft(o.event_date)}`
                : "<span class='fw-bold'>Unspecified</span>"
            }</p>


            <ul class="block p-0 mt-3 label-list mb-0">
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
    