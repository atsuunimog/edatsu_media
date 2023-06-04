<x-guest-layout>
<div class="row">
    <div class="col-sm-12 text-center">
        <div class="py-5">
           <h1 class='fw-bold'>Tech Opportunities</h1>
           <p class='lead m-0 text-secondary'>Discover the Latest Financing Opportunities in African Tech</p>
        </div>  
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <ul class='list-inline m-0 py-3'>
            <?php $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';?>

            <li class="list-inline-item"><a href='{{url('feeds')}}' 
                class='text-decoration-none btn  btn-gray border-0 px-4 py-2 shadow-sm mb-2'
                {{(url()->current() == $protocol.$_SERVER['HTTP_HOST'].'/feeds')? 'bg-green' : 'bg-gray'}}'>News Feed</a>
            </li>

            <li class="list-inline-item"><a href='{{url('/')}}' 
                class='text-decoration-none bprder-0 btn btn-green border-0 px-4  text-light py-2 shadow-sm mb-2'
                {{(url()->current() == $protocol.$_SERVER['HTTP_HOST'])? 'bg-green' : 'bg-gray'}}'>Tech Opportunites</a>
            </li>

            <li class="list-inline-item "><a href='{{url('events')}}' 
                class='text-decoration-none btn  btn-gray border-0 px-4 py-2 shadow-sm mb-2
                {{(url()->current() == $protocol.$_SERVER['HTTP_HOST'].'/events')? 'bg-green' : 'bg-gray'}}'>Tech Events
            </a></li>

                {{-- 
                <li class="list-inline-item "><a href='{{url('directory')}}' 
                    class='text-decoration-none btn btn-sm btn-dark border-0 px-3 shadow-sm 
                    {{(url()->current() == $protocol.$_SERVER['HTTP_HOST'].'/directory')? 'bg-primary' : 'bg-dark'}}'>Directory</a>
                </li> 
                --}}

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
        <div class="row">
            @forelse($opp_posts as $posts)
                <div class='col-sm-12 mb-3'>
                    <div class='px-3 py-3 border rounded feed-panel text-wrap w-100'>
                       
                        <a class='text-decoration-none text-gray' href='{{route('read.blog', ['id'=> $posts->id, 'title'=> Str::slug($posts->title, '-')])}}'>
                        <h5 class='fw-bold m-0 p-0'>{{$posts->title}}</h5>
                        </a>

                        <small class="my-2 d-block text-sm text-secondary">
                        Posted on: {{ date('D, M Y', strtotime($posts->created_at)) }}
                        </small>
                       
                        <div class="overflow-hidden truncate mb-3">
                            {!! $truncated_text = Str::limit(strip_tags($posts->description), 200); !!}
                            {{-- <span class='text-truncate bg-danger' style='min-width:500px;'>{!! $posts->description !!}</span> --}}
                        </div>
                        
                        <ul class="m-0 p-0 label-list mb-2">
                            @isset( $posts->continent)
                            <li class="">
                                <span class='data-labels'>
                                    {{ucwords(str_replace("_", " ", $posts->continent));}}
                                </span>
                            </li>
                            @endisset

                            @isset( $posts->region)
                            <li class="">
                                <span class='data-labels'>
                                {{ucwords(str_replace("_", " ", $posts->region));}}
                                </span>
                            </li>
                            @endisset

                            @isset($posts->country)
                            <li class="">
                                <span class='data-labels'>
                                {{$posts->country}}
                                </span>
                            </li>
                            @endisset
                        </ul>

                        @isset($posts->deadline)
                        <p class='p-0 fw-bold'>{!! get_days_left($posts->deadline) !!}</p>
                        @endisset

                    <div class="d-flex justify-content-end">
                        <div class=''>
                            <a class='text-decoration-none bprder-0 btn btn-gray border-0 px-4 py-2 shadow-sm' 
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
        <div class="px-3 rounded py-3 bg-white border">
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
