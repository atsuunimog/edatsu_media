<x-guest-layout>
<div class="row">
    <div class="col-sm-12 text-center">
        <div class="py-5">
            <!--logo-->
            <a href='./'>
            <img src="{{ asset('img/logo/trans/logo_trans_1.png')}}" width="90" class="img-fluid" alt="logo">
            </a>
            <!--logo-->
            <h1 class='fw-bold'>Opportunities</h1>
            <p class=' m-0 text-secondary'>Discover the Latest Tech & Business Financing Opportunities in Africa</p>
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
        <div class="py-3 px-3 bg-white border rounded mb-3">
            <h5 class="fw-bold m-0 mb-3">
                <span class="material-symbols-outlined align-middle ">
                    local_fire_department
                </span>
                Trending 
            </h5>
            <p>Top trending opportunites</p>
            <ul class="list-unstyled">
                {{-- <li>Trending opportunites..</li> --}}
            </ul>
        </div>
    </div>


    <div class="col-sm-6 col-12">

    <!--news filter-->
        <form class="" method="GET" id="search_keyword">
            <div class="row">
                <div class="col-sm-9 col-12">
                    <div class='mb-3'>
                    <input type='text' class="form-control py-3 fs-9 text-secondary" name="keyword" placeholder="Search Keywords" id="keyword">
                    </div>
                </div>
                <div class="col-sm-3 col-12">
                    <div class='mb-3'>
                    <button class="text-decoration-none btn btn-gray border-0 px-4 py-3 shadow-sm w-100">Search</button>
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
                    <input type="hidden" name="continent" id="selectedContinents" readonly>
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
            <div class="col-sm-12">
                <div id="opportunity-feeds"></div>
                <div id="pagination"></div>
            </div>
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
const imageSrc = '{{ asset('img/gif/cube_loader.gif') }}';

//fetch api to access data 
window.addEventListener("load", function(){
    document.querySelector('#opportunity-feeds').innerHTML = `<img src="${imageSrc}" class="img-fluid d-block mx-auto my-5" alt="loading..." />`;
    fetch('/opp-feeds')
    .then((r)=> {
        document.querySelector('#opportunity-feeds').innerHTML = '';
        console.log(r);
        return r.json();
    })
    .then((d)=>{
        console.log(d);
        /**display pagination**/
        displayPagination(d, "#pagination");
        /**display profile**/
        displayProfile(d,"#opportunity-feeds");   
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
  // Implement the logic to generate the post link
  let link = `op/${id}/${encodeURIComponent(title)}`;
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

//append list items
function generateListItem(data) {
    if (data !== undefined && data !== null && typeof data === 'string' && data.trim() !== ''){
// Convert 'data' to title case
const titleCasedData = data
    .replace(/_/g, ' ')
    .replace(/\w\S*/g, (word) => word.charAt(0).toUpperCase() + word.slice(1));

// Create and return the list item as a string
return `<li class=""><span class='data-labels fs-9 fw-bold'>${titleCasedData}</span></li>`;
}

  // Return an empty string if there is no data
return '';
}




/**Display profile**/
function displayProfile(d, elem){
    d.data.map((o)=>{
    document.querySelector(elem)
    .innerHTML += `<div class='col-sm-12 mb-3'>
    <div class='px-3 py-3 border rounded feed-panel text-wrap w-100'>
        <a class='text-decoration-none text-gray' href='${pageLink(o.title, o.id)}'>
        <h5 class='fw-bold m-0 p-0'>${o.title}</h5>
        </a>
        <p class="my-2 d-block fs-9 text-sm text-secondary">
        Posted on: ${formatDate(o.created_at)}
        </p>
        <div class="overflow-hidden truncate mb-2">
        <p class='m-0 fs-9 text-secondary'>${truncateText(o.description, 200)}</p>
        </div>
        <ul class="mb-2 p-0 label-list">
        ${
            generateListItem(o.continent)
        }
        ${
            generateListItem(o.region)
        }
        ${
            generateListItem(o.country)
        }
        </ul>
        ${
        o.deadline
            ? `<p class='m-0 fw-bold fs-9'>${getDaysLeft(o.deadline)}</p>`
            : ""
        }
        
        <div class="d-flex justify-content-end">
        <div class='position-relative'>
        <div class="position-absolute share-panel border rounded shadow d-none">
            <ul class='m-0 p-0 fs-9'>
                <li><a  class='text-decoration-none text-dark' href="https://api.whatsapp.com/send?text=${pageLink(o.title, o.id)}"
                ><img width="30" src="{{asset('img/gif/icons8-whatsapp.gif')}}" alt="whatsapp" > Whatapp</a></li>
                
                <li><a  class='text-decoration-none text-dark' href="https://t.me/share/url?url=${pageLink(o.title, o.id)}"
                ><img width="30" src="{{asset('img/gif/icons8-telegram.gif')}}" alt="telegram" > Telegram</a></li>
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
    let active_bg = (p.active)? "#FB5607" : '';
    let active_txt = (p.active)? "#252422" : '';
    if(p.url !== null){
        document.querySelector(elem)
        .innerHTML +=  ` <a id='${p.url}' class='btn btn-dark border-0 me-3 mb-3 px-3 fw-bold text-light shadow' 
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
            displayPagination(d, "#pagination");
            /**display profile**/
            displayProfile(d,"#opportunity-feeds");   
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
