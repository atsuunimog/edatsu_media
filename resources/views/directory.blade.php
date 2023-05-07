<nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
      <span class="navbar-brand mb-0 h1 d-none d-sm-block d-md-block">
        <!--logo-->
        <img src="{{ asset('img/trans/trans_crop_2.png')}}" width="50" class="img-fluid" alt="logo">
        <!--logo-->
      </span>
    </div>
</nav>
<x-guest-layout>

<div class="row">
    <div class="col-sm-12 text-center">
        <div class="py-4">
            <img src="{{ asset('img/trans/trans_crop_4.png')}}" 
            width="200" class="img-fluid d-block mx-auto" alt="logo">
        </div>  
    </div>
</div>


<div class="row">
    <div class="col-sm-12">
        <ul class='list-inline m-0 py-3'>
            <?php $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';?>
                      
            <li class="list-inline-item"><a href='{{url('/')}}' 
                class='text-decoration-none btn border-0 btn-sm btn-dark px-3 shadow-sm 
                {{(url()->current() == $protocol.$_SERVER['HTTP_HOST'])? 'bg-primary' : 'bg-dark'}}'>Tech Opportunites</a>
            </li>

            <li class="list-inline-item "><a href='{{url('events')}}' 
                class='text-decoration-none bprder-0 btn btn-sm btn-dark border-0 px-3 shadow-sm 
                {{(url()->current() == $protocol.$_SERVER['HTTP_HOST'].'/events')? 'bg-primary' : 'bg-dark'}}'>Tech Events</a></li>
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
    <div class="col-sm-8">

   

        <!--main content-->
        <div class="row position-relative">
            @forelse($ev_posts as $posts)
                <div class='col-sm-12 mb-3'>
                    <div class='px-3 py-3 border rounded'>
                        <h5 class='fw-bold m-0 p-0'>{{$posts->title}}</h5>
                        <small class="mb-2 d-block text-sm text-secondary">Posted on: {{ date('D, M Y', strtotime($posts->created_at))}} 
                            <span></span>
                        </small>
                        <p class='mb-2 '>{{$posts->description}}</p>
                        <p class='mb-2 '><span class='fw-bold'>Venue:</span> {{$posts->location}}</p>
                        <p class='my-3 p-0 text-danger fw-bold'>Event Date: {{ date('d, M Y', strtotime($posts->event_date))}}</p>


                        <ul class="my-2 p-0 list-inline">
                            <li class="list-inline-item"><i class="icon ion-android-globe align-middle" style='font-size:1.1em;'></i> 
                                {{ucwords(str_replace("_", " ", $posts->region));}}
                            </li>
                            <li class="list-inline-item"><i class="icon ion-android-pin align-middle" style='font-size:1.1em;'></i> {{$posts->country}}</li>
                        </ul>

                        <a class='text-decoration-none btn border-0 btn-sm btn-primary px-3 shadow-sm ' 
                        target="_blank"
                        href='{{$posts->source_url}}'>
                        Apply
                        </a>
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
    <div class="col-sm-4">
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
<div class="container-fluid">
    @include('layouts.footer')
</div>