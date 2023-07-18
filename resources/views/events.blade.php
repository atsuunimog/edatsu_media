<x-guest-layout>
<div class="row">
    <div class="col-sm-12 text-center">
        <div class="py-5">
             <!--logo-->
             <a href='./'>
                <img src="{{ asset('img/logo/trans/logo_trans_1.png')}}" width="90" class="img-fluid" alt="logo">
                </a>
            <!--logo-->
            <h1 class='fw-bold'>Tech Events</h1>
            <p class=' m-0 text-secondary'>Discover the Latest Tech & Entrepreneurial Events in Africa</p>
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
                class=' text-decoration-none btn fs-9 btn-gray border-0 px-4 py-2 shadow-sm mb-2'
                {{(url()->current() == $protocol.$_SERVER['HTTP_HOST'])? 'bg-green' : 'bg-gray'}}>Tech Opportunites</a>
            </li>
            
            <li class="list-inline-item "><a href='{{url('events')}}' 
                class='text-decoration-none fs-9 bprder-0 btn btn-green border-0 px-4  text-light py-2 shadow-sm mb-2
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
    </div>

    <div class="col-sm-6 col-12">
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

                        <p class='mb-2 fs-9 fw-bold' style='color:#457b9d'>
                            <span class="material-symbols-outlined align-middle">
                                pin_drop
                            </span>
                            {{$posts->location}}
                        </p>

                        {{-- <p class='my-3 p-0 text-danger fw-bold'>Event Date: {{ date('d, M Y', strtotime($posts->event_date))}}</p> --}}

                        <ul class="mb-2 p-0 label-list">
                            @isset( $posts->region)
                            <li class="mb-2">
                                <span class='data-labels fs-9 text-secondary'>
                                    {{ucwords(str_replace("_", " ", $posts->region));}},
                                </span>
                            </li>
                            @endisset

                            @isset( $posts->country)
                            <li class="mb-2">
                                <span class='data-labels fs-9  text-secondary'>
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
                                <div class="position-absolute share-panel border rounded shadow d-none">
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
            <h5 class='fw-bold m-0 mb-3'>Submit Events</h5>
            <p class="fs-9 text-secondary">
                We want to hear from you! Submit your tech event proposals today
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
</x-guest-layout>
