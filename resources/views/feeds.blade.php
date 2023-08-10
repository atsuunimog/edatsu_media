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
            Stay Up-to-Date with the Latest News!
          </p>
        </div>  
    </div>
</div>

<!--menu-->
@include('components/custom_nav')
<!--menu-->

<div class="row">
<div class="col-sm-3">
<!--trending-->
<div class="py-3 px-3 bg-white border rounded mb-3">
  <h5 class="fw-bold m-0 mb-3">
      <span class="material-symbols-outlined align-middle ">
          local_fire_department
      </span>
      Trending 
  </h5>
  <p class="fs-9">Top trending News</p>
</div>
<!--trending-->
</div>

<div class="col-sm-6">

<!--news filter-->
{{-- action="{{route('find.feeds')}}" --}}
<form onsubmit="fetchSingleFeed()">
<div class="row">
  <div class="col-sm-9">
    <select class="form-select py-3 mb-3" name="feeder" aria-label="Select News">
      <option selected value='' class='py-3'>All Channnels</option>
      <option value="https://disrupt-africa.com/feed/">Disrupt Africa</option>
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
  We have restricted the number of visible channel feeds at a time. Use the channel filter to find channels.
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
</script>
<script defer src='../js/minified-feeds.js'></script>
</x-guest-layout>
