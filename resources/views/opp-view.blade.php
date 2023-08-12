<x-guest-layout>
    <div class="row d-sm-none d-md-none d-lg-none">
        <div class="col-sm-12 text-center">
            <div class="py-5">
            <h1 class='fw-bold'>Opportunities</h1>
            <p class=''>Program Details</p>
            </div>  
        </div>
    </div>

    {{-- @include('components/custom_nav') --}}

    <div class="container">

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
            <div class="px-3 py-3 bg-white rounded border mb-3">
                <!--main content-->
                <h5 class='fw-bold m-0 p-0'>{{$opp_posts->title}}</h5>
                <small class="my-2 d-block text-sm text-secondary">Posted on: {{ date('D, M Y', strtotime($opp_posts->created_at))}}</small>
                <p class='mt-0 mb-3'>{!! $opp_posts->description !!}</p>

                <ul class="m-0 p-0 label-list mb-2">
                    @isset( $opp_posts->continent)
                    <li class="">
                        <span class='data-labels'>
                            {{ucwords(str_replace("_", " ", $opp_posts->continent));}}
                        </span>
                    </li>
                    @endisset

                    @isset( $opp_posts->region)
                    <li class="">
                        <span class='data-labels'>
                        {{ucwords(str_replace("_", " ", $opp_posts->region));}}
                        </span>
                    </li>
                    @endisset

                    @isset($opp_posts->country)
                    <li class="">
                        <span class='data-labels'>
                        {{$opp_posts->country}}
                        </span>
                    </li>
                    @endisset
                </ul>

                @isset($opp_posts->deadline)
                <p class='my-2 p-0 fw-bold text-dark'>Deadline: {{ date('d, M Y', strtotime($opp_posts->deadline))}}</p>
                @endisset

                @isset($opp_posts->deadline)
                <p class='p-0 fw-bold'>{!! get_days_left($opp_posts->deadline) !!}</p>
                @endisset

                <div class="d-flex justify-content-end">
                    <div class='position-relative'>
                        <div class="position-absolute share-panel border rounded fs-9 d-none">
                            <ul>
                                <li><a class='text-decoration-none text-dark' href="https://api.whatsapp.com/send?text={{route('read.blog', ['id'=> $opp_posts->id, 'title'=> Str::slug($opp_posts->title, '-')])}}"
                                    target="_blank"><img width="30" src="{{asset('img/gif/icons8-whatsapp.gif')}}" alt="whatsapp"> WhatsApp</a></li>
                            
                                <li><a class='text-decoration-none text-dark' href="https://t.me/share/url?url={{route('read.blog', ['id'=> $opp_posts->id, 'title'=> Str::slug($opp_posts->title, '-')])}}"
                                    target="_blank"><img width="30" src="{{asset('img/gif/icons8-telegram.gif')}}" alt="telegram"> Telegram</a></li>
                                
                                <li><a class='text-decoration-none text-dark' href="https://www.linkedin.com/sharing/share-offsite/?url={{route('read.blog', ['id'=> $opp_posts->id, 'title'=> Str::slug($opp_posts->title, '-')])}}"
                                    target="_blank"><img width="30" src="{{asset('img/gif/icons8-linkedin.gif')}}" alt="linkedin"> LinkedIn</a></li>
                                
                                <li><a class='text-decoration-none text-dark' href="https://twitter.com/intent/tweet?url={{route('read.blog', ['id'=> $opp_posts->id, 'title'=> Str::slug($opp_posts->title, '-')])}}"
                                    target="_blank"><img width="30" src="{{asset('img/gif/icons8-twitter.gif')}}" alt="twitter"> Twitter</a></li>
                            </ul>                            
                        </div>
                        <button class='me-3 text-decoration-none btn fs-9 px-4 py-2'onClick="console.log(this.previousElementSibling.classList.toggle('d-none'))">
                            <span class="material-symbols-outlined align-middle">
                                share
                            </span>
                        </button>
                     </div>

                     <div class=''>
                        <a class='text-decoration-none btn btn-gray px-4 py-2 fs-9 fw-bold text-primary' 
                        href='{{$opp_posts->source_url}}' target='_blank'>
                        Apply
                        </a>
                         </div>
                </div>
                <!--main content-->
            </div>
        </div>

        <div class="col-sm-4">
            <div class="px-3 py-3 bg-white rounded border mb-3">
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

             <!--aside-->
             <div class="px-3 py-3 border rounded mb-3 bg-white">
                <small class="text-secondary d-block mb-3">Advertisement</small>
                <a href="https://kol.jumia.com/api/click/link/d85c6dd6-5eec-47e9-b103-577be07cf3f6/0c7c436a-7891-435c-a9fc-3881f7125b11">
                <img src="{{asset('img/ads_img/oraimo_stores.png')}}" width="100%" class='img-fluid' alt="oraimo">
                </a>
            </div>
            <!--aside-->

        </div>
    </div>
    </div>
    @include('components/fixed_mobile_menu')
    </x-guest-layout>
    
