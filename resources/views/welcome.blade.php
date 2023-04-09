<nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
      <span class="navbar-brand mb-0 h1 d-none d-sm-block d-md-block">
        <!--logo-->
        <img src="{{ asset('e_stack_logo/trans/trans_crop_2.png')}}" width="50" class="img-fluid" alt="logo">
        <!--logo-->
      </span>
    </div>
</nav>
<x-guest-layout>

<div class="row">
    <div class="col-sm-12 text-center">
        <div class="py-4">
            <img src="{{ asset('e_stack_logo/trans/trans_crop_4.png')}}" 
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
        <div class="row">
            @forelse($opp_posts as $posts)
                <div class='col-sm-12 mb-3'>
                    <div class='px-3 py-3 border rounded'>
                        <p class='fw-bold mb-2 p-0'>{{$posts->title}}</p>
                        <p class='m-0 text-secondary'>{{$posts->description}}</p>
                        <ul class="my-2 p-0 list-inline">
                            <li class="list-inline-item"><i class="icon ion-android-globe align-middle" style='font-size:1.1em;'></i> 
                                {{ucwords(str_replace("_", " ", $posts->region));}}
                            </li>
                            <li class="list-inline-item"><i class="icon ion-android-pin align-middle" style='font-size:1.1em;'></i> {{$posts->country}}</li>
                        </ul>
                        <a class='d-inline-block text-decoration-none' 
                        target="_blank"
                        href='{{$posts->source_url}}'>
                        {{str_replace(array("http://", "https://"), "", $posts->source_url);}}
                        &nbsp;
                        <i class="icon ion-android-open"></i>
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
            {{$opp_posts->links()}}
                </div>
            </div>
            <!--pagination-->

            </div>
        <!--main content-->
    </div>
    <div class="col-sm-4">
        <!--aside menu-->
        <div class="px-3 border rounded py-3">
            {{-- Side menu --}}
        </div>
        <!--aside menu-->
    </div>
</div>
<!--body-->

</x-guest-layout>
<div class="container-fluid">
    @include('layouts.footer')
</div>