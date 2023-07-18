<x-guest-layout>
  <div class="row">
    <div class="col-sm-12 text-center">
        <div class="py-5">
            <!--logo-->
              <a href='./'>
              <img src="{{ asset('img/logo/trans/logo_trans_1.png')}}" width="90" class="img-fluid" alt="logo">
              </a>
            <!--logo-->
           <h1 class='fw-bold'>Daily News Feed</h1>
           <p class=' m-0 text-secondary p-0'>
            Stay Up-to-Date with the Latest Tech News!
          </p>
        </div>  
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <ul class='list-inline m-0 py-3'>
            <?php $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';?>

            <li class="list-inline-item"><a href='{{url('news-feed')}}' 
                class='text-decoration-none border-0 btn btn-green fs-9  px-4  text-light py-2 shadow-sm mb-2
                {{(url()->current() == $protocol.$_SERVER['HTTP_HOST'].'/news-feed')? 'bg-green' : 'bg-gray'}}'>News Feed</a>
            </li>

            <li class="list-inline-item"><a href='{{url('/')}}' 
                class='text-decoration-none btn  btn-gray border-0 fs-9 px-4  py-2 shadow-sm mb-2
                {{(url()->current() == $protocol.$_SERVER['HTTP_HOST'])? 'bg-green' : 'bg-gray'}}'>Tech Opportunites</a>
            </li>

            <li class="list-inline-item ">
              <a href='{{url('events')}}' 
                  class='text-decoration-none btn  btn-gray border-0 px-4 fs-9  py-2 shadow-sm mb-2
                  {{(url()->current() == $protocol.$_SERVER['HTTP_HOST'].'/events')? 'bg-green' : 'bg-gray'}}'>Tech Events
              </a>
            </li>

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

<div class="row">
<div class="col-sm-3">
  <div class="px-3 py-3">
  </div>
</div>

<div class="col-sm-6">
<p class='text-secondary'>
Select News Channels
</p>

<!--news filter-->
{{-- action="{{route('find.feeds')}}" --}}
<form onsubmit="fetchSingleFeed()">
<div class="row">
  <div class="col-sm-9">
    <select class="form-select py-3 mb-3" name="feeder" aria-label="Select News">
      <option selected value='' class='py-3'>All Channnels</option>
      {{-- <option value="https://disrupt-africa.com/feed/">Disrupt Africa</option> --}}
      <option value="https://techpoint.africa/feed/">
        Techpoint Africa - Nigeria
      </option>
      <option value="https://techcabal.com/feed/">TechCabal - Nigeria</option>
      <option value="https://technext24.com/feed/">Tech Next - Nigeria</option>
      <option value=" https://www.techcityng.com/feed/">Tech City - Nigeria</option>
      <option value="https://ventureburn.com/feed/">Venture Burn - SouthAfrica</option>
      <option value="https://cointelegraph.com/rss">Coin Telegraph - USA</option>
      <option value="https://www.coindesk.com/arc/outboundfeeds/rss/">Coin Desk - USA</option>
      <option value="https://techcrunch.com/feed/">Tech Crunch - USA</option>
    </select>
  </div>
  <div class="col-sm-3">
    <button class="text-decoration-none btn btn-gray border-0 px-4 py-3 mb-3 shadow-sm w-100">Filter</button>
  </div>
</div>
</form>
<!--news filter-->

<div id="news-feed" class="mb-3"></div>
<div id="pagination-container"></div>
{{-- <div id="site-metadata" data-meta="{{$data[0]['domain_name']}}"></div> --}}

<!--content-->
{{-- @foreach($data as $item)
    <div class='px-3 py-3 bg-white border rounded mb-3'>
        <h5 class="fw-bold">{{ $item['title'] }}</h5>
        @if($item['date'] !== '')
        <p class='text-secondary fs-9 p-0 m-0 my-2'>Posted on: {{ $item['date'] }}</p>
        @endif

        <p class=' p-0 m-0 my-2 fs-9 text-secondary'>
          {!! $truncated_text = Str::limit(strip_tags($item['description']), 200); !!}
        </p>
      
        <p class='p-0 m-0 fw-bold link-color'>
          <span class="material-symbols-outlined align-middle">
            full_coverage
          </span>
          {{ $item['domain_name'] }}</p>

        <div class="d-flex justify-content-end">
          <div class=''>
            <a href="{{ $item['link'] }}" target="_blank"
            class='text-decoration-none btn p-0  fs-9 px-3 py-1  mb-2 '>
            Read more
            </a>
          </div>
      </div>
    </div>
@endforeach --}}


<!-- Laravel Blade Template -->

<!--content-->
</div>
<div class="col-sm-3">

  <!--aside-->
  <div class="px-3 py-3 border rounded mb-3 bg-white">
    <small class="text-secondary d-block mb-3">Advertisement</small>
    <a href="https://kol.jumia.com/api/click/link/d85c6dd6-5eec-47e9-b103-577be07cf3f6/0c7c436a-7891-435c-a9fc-3881f7125b11">
      <img src="{{asset('img/ads_img/oraimo_stores.png')}}" width="100%" class='img-fluid' alt="oraimo">
    </a>
  </div>
  <!--aside-->

  <!--aside-->
  <div class="px-3 py-3 border rounded mb-3 bg-white">
    <small class="text-secondary d-block mb-3">Advertisement</small>
    <a href="https://www.a2hosting.com/refer/335959" target="_blank">
      <img src="{{asset('img/ads_img/a2_horizontal_ads.webp')}}" class='img-fluid' alt="">
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


<script>

  const imageSrc = '{{ asset('img/gif/cube_loader.gif') }}';

  const showLoadingIndicator = () => {
    const loadingMarkup = `<img src="${imageSrc}" class="img-fluid d-block mx-auto my-5" alt="loading..." />`;
    document.querySelector("#news-feed").innerHTML = loadingMarkup;
  };

  /*reusable call*/
  const fetchData = async (page = 1) => {
    
  try {
    showLoadingIndicator();

    const response = await fetch(`/feeds?page=${page}`);
    const data = await response.json();

    return data;
  } catch (error) {
    console.error('Error fetching data:', error);
    throw error;
  }
};

// Function to handle the fetched data and update the UI
const handleData = (data, singleFeed, feeder_url = '') => {
  const feeds = data.data; // Array of feed items

  // Process and display the feed items
  const newsFeedElement = document.querySelector("#news-feed");
  newsFeedElement.innerHTML = '';

  feeds.forEach(feed => {
    // Display each feed item in the UI

    const dateMarkup = feed.date ? `<p class="text-secondary fs-9 p-0 m-0 my-2">Posted on: ${feed.date}</p>` : '';
    const feedMarkup = `
      <div class="px-3 py-3 bg-white border rounded mb-3">
        <h5 class="fw-bold">${feed.title}</h5>
        ${dateMarkup}
        <p class="p-0 m-0 my-2 fs-9 text-secondary d-block">
        ${feed.description}
        </p>
        <p class="p-0 m-0 fw-bold link-color">
          <span class="material-symbols-outlined align-middle">full_coverage</span>
          ${feed.domain_name}
        </p>
        <div class="d-flex justify-content-end">
          <div>
            <a href="${feed.link}" target="_blank" class="text-decoration-none btn p-0 fs-9 px-3 py-1 mb-2">
              Read more
            </a>
          </div>
        </div>
      </div>
    `;

    newsFeedElement.innerHTML += feedMarkup;
  });

  // Handle pagination links
  const paginationLinks = data.links; // Pagination links
  const currentPage = data.current_page; // Current page
  const lastPage = data.last_page; // Last page

  // Update the UI with pagination links
  const paginationElement = document.querySelector("#pagination-container");
  paginationElement.innerHTML = '';

  console.log(currentPage);

  let bg_color = "background-color:#252422; color:white;";

  if(singleFeed == 0){
    //gagination for all feeds
    for (let i = 1; i <= lastPage; i++) {
      bg_color = (currentPage === i) ? 'background-color:#FB5607; color:white;' : 'background-color:#252422; color:white;';
      const pageLink = `<a  
      class="pagination-link btn px-3 fw-bold me-3 shadow mb-3" style='${bg_color}' id='${i}' 
      onClick="nextFeed(${i});">${i}</a>`;
      paginationElement.innerHTML += pageLink;
    }
  }else{
    //pagination for single feed
    for (let i = 1; i <= lastPage; i++) {
      bg_color = (currentPage === i) ? 'background-color:#FB5607; color:white;' : 'background-color:#252422; color:white;';
      const pageLink = `<a  
      class="pagination-link btn px-3 fw-bold me-3 shadow mb-3" style='${bg_color}' id='${i}' 
      onClick="nextSingleFeed(${i}, '${feeder_url}')">${i}</a>`;
      paginationElement.innerHTML += pageLink;
    }
  }


};

//Example usage: Fetch data for the first page
const fetchAndHandleData = async (page = 1) => {
  showLoadingIndicator();
  try {
    const data = await fetchData(page);
    handleData(data, 0);
  } catch (error) {
    const errorMarkup = `
      <div class="px-3 py-3 bg-white border rounded mb-3 text-center">
        <h5 class="fw-bold">Oops! Something went wrong</h5>
        <p class="text-secondary fs-9">Try refreshing your feeds or checking your internet connection</p>
        <button class="btn btn-dark px-4 fw-bold" onClick='window.location.reload()'>Refresh Feed</button>
      </div>
    `;
    document.querySelector("#news-feed").innerHTML = errorMarkup;
  }
};

// Example usage: Fetch data for the first page
fetchAndHandleData();


// paginate to the next feed
const nextFeed = async (page = 1) => {
  showLoadingIndicator();
  event.preventDefault();
  try {
    const data = await fetchData(page);
    handleData(data, 0);
  } catch (error) {
    const errorMarkup = `
      <div class="px-3 py-3 bg-white border rounded mb-3 text-center">
        <h5 class="fw-bold">Oops! Something went wrong</h5>
        <p class="text-secondary fs-9">Try refreshing your feeds or checking your internet connection</p>
        <button class="btn btn-dark px-4 fw-bold" onClick='window.location.reload()'>Refresh Feed</button>
      </div>
    `;
    document.querySelector("#news-feed").innerHTML = errorMarkup;
  }
};

// paginate to the next feed
const nextSingleFeed = async (page = 1, feeder_url) => {
  showLoadingIndicator();
  event.preventDefault();
  try {
    // const data = await fetchData(`/feeds?page=${page}&feeder=${feeder_url}`);
   
    const response = await fetch(`/feeds?page=${page}&feeder=${feeder_url}`);
    const data = await response.json();
    // Handle data 
    handleData(data, 1, feeder_url);
  } catch (error) {
    const errorMarkup = `
      <div class="px-3 py-3 bg-white border rounded mb-3 text-center">
        <h5 class="fw-bold">Oops! Something went wrong</h5>
        <p class="text-secondary fs-9">Try refreshing your feeds or checking your internet connection</p>
        <button class="btn btn-dark px-4 fw-bold" onClick='window.location.reload()'>Refresh Feed</button>
      </div>
    `;
    document.querySelector("#news-feed").innerHTML = errorMarkup;
  }
};

/**
 * get single feed
 * */
const fetchSingleFeed = async (page=1) => {
  showLoadingIndicator();
  event.preventDefault();
  const selectElement = document.querySelector("select[name='feeder']");
  const selectedValue = selectElement.value;
  try {

    const response = await fetch(`/feeds?page=${page}&feeder=${selectedValue}`);
    const data = await response.json();
    // Handle data 
    if(selectedValue == ''){
      handleData(data, 0, selectedValue);
    }else{
      handleData(data, 1, selectedValue);
    }
    // Handle the data as needed
  } catch (error) {
    console.error("Error fetching data:", error);
    const errorMarkup = `
      <div class="px-3 py-3 bg-white border rounded mb-3 text-center">
        <h5 class="fw-bold">Oops! Something went wrong</h5>
        <p class="text-secondary fs-9">Try refreshing your feeds or checking your internet connection</p>
        <button class="btn btn-dark px-4 fw-bold" onClick='window.location.reload()'>Refresh Feed</button>
      </div>
    `;
    document.querySelector("#news-feed").innerHTML = errorMarkup;
  }
};



</script>
</x-guest-layout>
