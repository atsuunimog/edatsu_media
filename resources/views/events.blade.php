<x-guest-layout>
<div class="row">
    <div class="col-sm-12 text-center">
        <div class="py-5">
            <h1 class='fw-bold'>Tech Events</h1>
            <p class='lead m-0 text-secondary'>Discover the Latest Tech Events in Africa</p>
        </div>  
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <ul class='list-inline m-0 py-3'>
            <?php $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';?>
                      
            <li class="list-inline-item"><a href='{{url('/')}}' 
                class='text-decoration-none bprder-0 btn btn-gray border-0 px-4  text-light py-2 shadow-sm mb-2
                {{(url()->current() == $protocol.$_SERVER['HTTP_HOST'])? 'bg-green' : 'bg-gray'}}'>Tech Opportunites</a>
            </li>

            <li class="list-inline-item "><a href='{{url('events')}}' 
                class='text-decoration-none bprder-0 btn btn-green border-0 px-4  text-light py-2 shadow-sm mb-2
                {{(url()->current() == $protocol.$_SERVER['HTTP_HOST'].'/events')? 'bg-green' : 'bg-gray'}}'>Tech Events</a></li>
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
    <div class="col-sm-8 col-12">

   

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

                        <div class="overflow-hidden truncate mb-3">
                            {!! $truncated_text = Str::limit(strip_tags($posts->description), 200); !!}
                           {{-- <span class='text-truncate bg-danger' style='min-width:500px;'>{!! $posts->description !!}</span> --}}
                        </div>

                        <p class='text-secondary'><i class="icon ion-android-pin align-middle " style='font-size:1.1em;'></i> {{$posts->location}}</p>

                        {{-- <p class='my-3 p-0 text-danger fw-bold'>Event Date: {{ date('d, M Y', strtotime($posts->event_date))}}</p> --}}

                        @isset($posts->event_date)
                        <p class='p-0 fw-bold'>{!! get_days_left($posts->event_date) !!}</p>
                        @endisset

                        <ul class="my-2 p-0 list-inline">
                            @isset( $posts->region)
                            <li class="mb-2">
                                <span class='data-labels'>
                                    {{ucwords(str_replace("_", " ", $posts->region));}}
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

                        <div class="d-flex justify-content-end">
                            <div class=''>
                                <a class='text-decoration-none bprder-0 btn btn-gray border-0 px-4 py-2 shadow-sm' 
                                    href='{{route('read.ev', ['id'=> $posts->id, 'title'=> Str::slug($posts->title, '-')])}}'>
                                    Event Details
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

            <!--google ads-->
            <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7365396698208751"
            crossorigin="anonymous"></script>
            <!-- Edatsu Media Horizontal Bar -->
            <ins class="adsbygoogle"
                style="display:block"
                data-ad-client="ca-pub-7365396698208751"
                data-ad-slot="5575131787"
                data-ad-format="auto"
                data-full-width-responsive="true"></ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
            <!--google ads-->

            </div>
        <!--main content-->
    </div>
    <div class="col-sm-4 col-12">
        <!--aside menu-->
        <div class="px-3 rounded">
            {{-- Side menu --}}

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
        <!--aside menu-->
    </div>
</div>
<!--body-->
</x-guest-layout>
