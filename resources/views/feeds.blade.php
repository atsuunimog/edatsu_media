<x-guest-layout>
  <div class="row">
    <div class="col-sm-12 text-center">
        <div class="py-5">
            <!--logo-->
              <a href='./'>
              <img src="{{ asset('img/logo/trans/logo_trans_1.png')}}" width="90" class="img-fluid" alt="logo">
              </a>
            <!--logo-->
           <h1 class='fw-bold mb-3'>Daily News Feed</h1>
           <p class=''>
            Stay Up-to-Date with the Latest Tech and Business News!
          </p>
        </div>  
    </div>
</div>

<!--menu-->
@include('components/custom_nav')
<!--menu-->

<div class="row">
<div class="col-sm-3">
  <div class="px-3 py-3">
  </div>
</div>

<div class="col-sm-6">

<!--news filter-->
{{-- action="{{route('find.feeds')}}" --}}
<form onsubmit="fetchSingleFeed()">
<div class="row">
  <div class="col-sm-9">
    <select class="form-select py-3 mb-3" name="feeder" aria-label="Select News">
      <option selected value='' class='py-3'>All Channnels</option>
      <option value="https://techpoint.africa/feed/">Techpoint Africa</option>
      <option value="https://techcabal.com/feed/">TechCabal</option>
      <option value="https://technext24.com/feed/">Tech Next</option>
      <option value="https://www.techcityng.com/feed/">Tech City</option>
      <option value="https://www.benjamindada.com/rss/">Benjamindada</option>
      <option value="https://nairametrics.com/feed/">Nairametrics</option>
      <option value="https://businessday.ng/feed/">Business Day</option>
      <option value="https://techmoran.com/feed/">Tech Moran</option>
      <option value="https://www.itnewsafrica.com/feed/">IT News Africa</option>
      <option value="https://ventureburn.com/feed/">Venture Burn</option>
      <option value="https://africa.businessinsider.com/rss">Business Insider Africa</option>
      <option value="https://www.appsafrica.com/feed/">AppsAfrica</option>
      <option value="https://technovagh.com/feed/">TechNova</option>
      <option value="https://kenyanwallstreet.com/feed/">Kenya Wallstreet</option>
      <option value="https://www.paymentsdive.com/feeds/news/">Payments Dive</option>
      <option value="https://techcrunch.com/feed/">Tech Crunch</option>
      <option value="https://www.wired.com/feed/">Wired</option>
      <option value="https://www.zdnet.com/news/rss.xml">ZDNet</option>
      <option value="https://cointelegraph.com/rss">Coin Telegraph</option>
      <option value="https://www.coindesk.com/arc/outboundfeeds/rss/">Coin Desk</option>
    </select>
  </div>
  <div class="col-sm-3">
    <button class="text-decoration-none btn btn-dark border-0 px-4 py-3 mb-3 shadow-sm w-100">Filter</button>
  </div>
</div>
</form>
<!--news filter-->

<div class="alert alert-info fs-9 d-flex  align-items-center" role="alert">
  <p class='m-0'>
  <span class="material-symbols-outlined align-middle">
  info
  </span>
  </p>
  <p class='m-0 px-3'>
  We have restricted the number of visible channel feeds at a time. Utilize the channel filter to discover more channels.
  </p>
</div>

<div id="news-feed" class="mb-3"></div>
<div id="pagination-container"></div>

<!--content-->
</div>
<div class="col-sm-3">

  <!--aside-->
  {{-- <div class="px-3 py-3 border rounded mb-3 bg-white">
    <small class="text-secondary d-block mb-3">Advertisement</small>
    <a href="https://kol.jumia.com/api/click/link/d85c6dd6-5eec-47e9-b103-577be07cf3f6/0c7c436a-7891-435c-a9fc-3881f7125b11">
      <img src="{{asset('img/ads_img/oraimo_stores.png')}}" width="100%" class='img-fluid' alt="oraimo">
    </a>
  </div> --}}
  <!--aside-->

  <!--aside-->
  {{-- <div class="px-3 py-3 border rounded mb-3 bg-white">
    <small class="text-secondary d-block mb-3">Advertisement</small>
    <a href="https://www.a2hosting.com/refer/335959" target="_blank">
      <img src="{{asset('img/ads_img/a2_horizontal_ads.webp')}}" class='img-fluid' alt="">
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
    <h5 class='fw-bold m-0 mb-3'>Submit Opportunities</h5>
    <p class='fs-9 text-secondary'>
      Submit tech and entrepreneurial opportunities. It's free.
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
      class="pagination-link btn px-3  me-2  mb-2" style='${bg_color}' id='${i}' 
      onClick="nextFeed(${i});">${i}</a>`;
      paginationElement.innerHTML += pageLink;
    }
  }else{
    //pagination for single feed
    for (let i = 1; i <= lastPage; i++) {
      bg_color = (currentPage === i) ? 'background-color:#FB5607; color:white;' : 'background-color:#252422; color:white;';
      const pageLink = `<a  
      class="pagination-link btn px-3 me-2  mb-2" style='${bg_color}' id='${i}' 
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
