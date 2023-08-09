<x-guest-layout>
    <div class="row">
        <div class="col-sm-12 text-center">
            <div class="py-5">
               <h1 class='fw-bold'>Event</h1>
               <p class=''>
               Event Details
               </p>
            </div>  
        </div>
    </div>

    @include('components/custom_nav')

    <div class="row">
        <div class="col-sm-12">
            <ul class='list-inline m-0 py-3'>
                <li class="list-inline-item">
                    <button class="btn fs-9 text-primary fw-bold px-4" onclick="window.history.back();">
                        <span class="material-symbols-outlined align-middle">
                            undo
                        </span>
                        Go Back</button>
                </li>
            </ul>
        </div>
    </div>
    
    <div class="row">
        <div class="col-sm-8">
            <div class="px-3 py-3 bg-white rounded border">
                <!--main content-->
                <h5 class='fw-bold m-0 p-0'>{{$ev_posts->title}}</h5>

                <span class="mt-2 d-block text-sm text-secondary fs-9">Posted on: {{ date('D, M Y', strtotime($ev_posts->created_at))}}</span>
               
                <p class='my-3'>{!! $ev_posts->description !!}</p>

                <p class='mb-3 fs-9 fw-bold' style='color:#457b9d'>
                    <span class="material-symbols-outlined align-middle">
                        pin_drop
                    </span>
                    {{$ev_posts->location}}
                </p>

                <ul class=" p-0 list-inline mb-3">
                    @isset( $ev_posts->region)
                    <li class="mb-2">
                        <span class='data-labels'>
                            {{ucwords(str_replace("_", " ", $ev_posts->region));}}
                        </span>
                    </li>
                    @endisset

                    @isset( $ev_posts->country)
                    <li class="mb-2">
                        <span class='data-labels'>
                            {{ucwords(str_replace("_", " ", $ev_posts->country));}}
                        </span>
                    </li>
                    @endisset
                </ul>

                @isset($ev_posts->event_date)
                <p class='my-2 p-0 fw-bold text-dark'>Event Date: {{ date('d, M Y', strtotime($ev_posts->event_date))}}</p>
                @endisset

                @isset($ev_posts->event_date)
                <p class='p-0 fw-bold'>{!! get_days_left($ev_posts->event_date) !!}</p>
                @endisset

                <div class="d-flex justify-content-end">
                    <div class='position-relative'>
                        <div class="position-absolute share-panel border fs-9 rounded d-none">
                            <ul>
                                <li><a  class='text-decoration-none text-dark' href="https://api.whatsapp.com/send?text={{route('read.blog', ['id'=> $ev_posts->id, 'title'=> Str::slug($ev_posts->title, '-')])}}"
                                ><img width="30" src="{{asset('img/gif/icons8-whatsapp.gif')}}" alt="whatsapp" > Whatapp</a></li>
                                
                                <li><a  class='text-decoration-none text-dark' href="https://t.me/share/url?url={{route('read.blog', ['id'=> $ev_posts->id, 'title'=> Str::slug($ev_posts->title, '-')])}}"
                                ><img width="30" src="{{asset('img/gif/icons8-telegram.gif')}}" alt="telegram" > Telegram</a></li>
                                
                                {{-- <li><img width="30" src="{{asset('img/gif/icons8-linkedin.gif')}}" alt="linkedin" > Linkedin</li>
                                <li><img width="30" src="{{asset('img/gif/icons8-twitter.gif')}}" alt="twitter" > Twitter</li>
                                <li><img width="30" src="{{asset('img/gif/icons8-facebook.gif')}}" alt="facebook" > Facebook</li> --}}
                            </ul>
                        </div>
                        <button class='me-3 text-decoration-none bprder-0 btn fs-9  px-4 py-2 'onClick="console.log(this.previousElementSibling.classList.toggle('d-none'))">
                            Share
                            <span class="material-symbols-outlined align-middle">
                                share
                            </span>
                        </button>
                     </div>

                     <div class=''>
                        <a class='text-decoration-none  btn  px-4 py-2 fw-bold text-primary fs-9 ' 
                        href='{{$ev_posts->source_url}}' target='_blank'>
                        Apply
                        </a>
                         </div>
                </div>
                <!--main content-->
            </div>
        </div>

        <div class="col-sm-4">
            <div class="px-3 py-3 bg-white rounded border">
                <!--side content-->
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
                <!--side content-->
            </div>
        </div>
    </div>
    @include('components/fixed_mobile_menu')
    </x-guest-layout>
