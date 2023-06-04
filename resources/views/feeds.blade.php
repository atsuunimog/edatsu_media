<x-guest-layout>
  <div class="row">
    <div class="col-sm-12 text-center">
        <div class="py-5">
           <h1 class='fw-bold'>News Feed</h1>
           <p class='lead m-0 text-secondary'>
            "Stay Updated with the Latest News: Explore Our Dynamic News Feed!"
          </p>
        </div>  
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <ul class='list-inline m-0 py-3'>
            <?php $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';?>

            <li class="list-inline-item"><a href='{{url('feeds')}}' 
                class='text-decoration-none bprder-0 btn btn-green border-0 px-4  text-light py-2 shadow-sm mb-2
                {{(url()->current() == $protocol.$_SERVER['HTTP_HOST'].'/feeds')? 'bg-green' : 'bg-gray'}}'>News Feed</a>
            </li>

            <li class="list-inline-item"><a href='{{url('/')}}' 
                class='text-decoration-none btn  btn-gray border-0 px-4 py-2 shadow-sm mb-2
                {{(url()->current() == $protocol.$_SERVER['HTTP_HOST'])? 'bg-green' : 'bg-gray'}}'>Tech Opportunites</a>
            </li>

            <li class="list-inline-item ">
              <a href='{{url('events')}}' 
                  class='text-decoration-none btn  btn-gray border-0 px-4 py-2 shadow-sm mb-2
                  {{(url()->current() == $protocol.$_SERVER['HTTP_HOST'].'/events')? 'bg-green' : 'bg-gray'}}'>Tech Events
              </a>
            </li>

{{--               
            <li class="list-inline-item "><a href='{{url('directory')}}' 
                class='text-decoration-none btn  btn-gray border-0 px-4 py-2 shadow-sm mb-2
                {{(url()->current() == $protocol.$_SERVER['HTTP_HOST'].'/directory')? 'bg-primary' : 'bg-dark'}}'>Directory</a>
            </li>  --}}
             

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
<div class="col-sm-8">

<p>We have curated a list of premier news platforms for your reading pleasure. Stay informed with daily updates.</p>

<!--news filter-->
<form class="mb-3" method="GET" action="{{route('find.feeds')}}">
<div class="row">
  <div class="col-sm-9">
    <select class="form-select py-3" name="feeder" aria-label="Select News">
      <option selected value=''>All News Channnel</option>
      <option value="https://disrupt-africa.com/feed/">Disrupt Africa</option>
      <option value="https://techpoint.africa/feed/">Techpoint Africa</option>
      <option value="https://techcabal.com/feed/">TechCabal</option>
      <option value="https://technext24.com/feed/">Tech Next</option>
      <option value="https://ventureburn.com/feed/">Venture Burn</option>
      <option value="https://cointelegraph.com/rss">Coin Telegraph</option>
      <option value="https://www.coindesk.com/arc/outboundfeeds/rss/">Coin Desk</option>
      <option value="https://techcrunch.com/feed/">Tech Crunch</option>
    </select>
  </div>
  <div class="col-sm-3">
    <button class="text-decoration-none btn  btn-gray border-0 px-4 py-3 shadow-sm w-100">Get News</button>
  </div>
</div>
</form>
<!--news filter-->

<!--content-->
@foreach($data as $item)
    <div class='px-3 py-3 bg-white border rounded mb-3'>
        <h5 class="fw-bold">{{ $item['title'] }}</h5>
        <p>Posted on: {{ $item['date'] }}</p>
        <p>{!! $truncated_text = Str::limit(strip_tags($item['description']), 200); !!}</p>
        <a href="{{ $item['link'] }}" target="_blank"
        class='text-decoration-none btn  btn-gray border-0 px-4 py-2 shadow-sm mb-2'>Read More</a>
        
    </div>
@endforeach
<!--content-->
</div>
<div class="col-sm-4">
  <div class="px-3 py-3 bg-white border rounded">
        <!--google ads-->            
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7365396698208751"
        crossorigin="anonymous"></script>
    <!-- Edatsu Media Sidebar -->
        <ins class="adsbygoogle"
            style="display:block"
            data-ad-client="ca-pub-7365396698208751"
            data-ad-slot="1501242178"
            data-ad-format="auto"
            data-full-width-responsive="true"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
        <!--google ads-->
  </div>
</div>

</div>

<div id="pagination-container"></div>

<script>

</script>
</x-guest-layout>
