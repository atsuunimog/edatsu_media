@section('meta_description', $opp_posts->meta_description)
@section('meta_keywords', $opp_posts->meta_keywords)
@section('meta_title', $opp_posts->title.' | Edatsu Media')
@section('blog_image', $opp_posts->cover_img)
<x-guest-layout>
    <div class="container">
    <div class="row">
        <div class="col-sm-12">
            <ul class='list-inline m-0 py-3'>
                <li class="list-inline-item">
                    <button class="btn d-flex align-items-center fw-bold" onclick="window.history.back();">
                    <span class="material-symbols-outlined pe-3">
                    arrow_back
                    </span>
                    Go Back</button>
                </li>
            </ul>
        </div>
    </div>
    
    <div class="row">
        <div class="col-sm-8">
            <div class="px-3 py-3 bg-white rounded border mb-3">
                <h1 id="main" class='fw-bold m-0 mb-3'>{{$opp_posts->title}}</h1>
                <p class="m-0 mb-2 d-block text-sm text-dark fs-9">Posted on: {{ date('D, M Y', strtotime($opp_posts->created_at))}}</p>
                @if($opp_posts->cover_img != '')
                <img src="{{asset('storage/uploads/channels/'.$opp_posts->cover_img)}}" 
                width="800px" height="800px" class="img-fluid" alt="image_home">
                @endif
                <div class="row my-3">
                    <div class="col-sm-4">
                        @isset($opp_posts->deadline)
                        <p class='p-0 my-2 fw-bold text-uppercase fs-9'>{!! get_days_left($opp_posts->deadline) !!}</p>
                        @endisset
                    </div>
                    <div class="col-sm-4">
                        @isset($opp_posts->deadline)
                        <p class='my-2 p-0 fw-bold fs-9 text-dark'>Deadline: {{ date('d, M Y', strtotime($opp_posts->deadline))}}</p>
                        @endisset
                    </div>
                    <div class="col-sm-4">
                    </div>
                </div>

                <p class='m-0'>{!! $opp_posts->description !!}</p>

                <ul class="m-0 p-0 label-list my-3">
                    @isset( $opp_posts->continent)
                    {{processCountries($opp_posts->continent)}}
                    @endisset

                    @isset( $opp_posts->region)
                    {{processCountries($opp_posts->region)}}
                    @endisset

                    @isset($opp_posts->country)
                    {{processCountries($opp_posts->country)}}
                    @endisset

                    @isset($opp_posts->category)
                    {{processCountries($opp_posts->category)}}
                    @endisset
                </ul>

                <div class="row mt-4">
                    <div class="col-sm-4">
                    <div class='position-relative mb-3'>
                        <div class="position-absolute share-panel border rounded fs-9 d-none"  style="left:0px;">
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
                        <button class='w-100 me-3 text-center text-decoration-none btn btn-lg fs-9 px-4 py-2'onClick="console.log(this.previousElementSibling.classList.toggle('d-none'))">
                            <span class="material-symbols-outlined align-middle">
                                share
                            </span>
                        </button>
                    </div>
                    </div>
                    <!--main content-->
                    @if($opp_posts->source_url)
                    <div class="col-sm-4">
                        <a class='btn btn-lg w-100 btn-primary text-decoration-none px-4 py-2 fs-9 mb-3 text-light' 
                        href='{{$opp_posts->source_url}}' target='_blank'>
                        Learn More
                        </a>
                    </div>
                    @endif

                    @if($opp_posts->direct_link)
                    <div class="col-sm-4">
                        <a class='w-100 btn btn-lg btn-primary text-decoration-none px-4 py-2 fs-9 text-light' 
                        href='{{$opp_posts->direct_link}}' target='_blank'>
                        Apply Directly
                        </a>
                    </div>
                    @endif
                </div>
                <!--main content-->
            </div>

            <!--cavet-->
            <div class="my-5">
                <div>
                    <p class="fw-bold">Disclaimer</p>
                    <p class="fs-8 text-secondary">
                    Edatsu Media is focused on aggregating helpful business information and hereby declares that it is not directly affiliated or associated with any events, awards, sponsorships, or competitions unless explicitly stated otherwise. While we strive to provide accurate and up-to-date information, any references or mentions of such events, awards, sponsorships, or competitions within our content are purely for informational purposes and should not be construed as endorsement or sponsorship by Edatsu Media. 
                    </p>
                </div>

                <!--ads-->
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
                <!--ads-->
            </div>
            <!--caveat-->



            <!--slider for related content-->

            <!--slider for related content-->
        </div>

        <div class="col-sm-4">
        
        @include('components/subscription_box')

 <!--custom ads-->
 <a href="https://cart.hostinger.com/pay/41d249ec-3cf3-4b85-b256-73c594037852?_ga=GA1.3.942352702.1711283207" target="_blank" class="d-block my-3">
    <img src="{{asset('img/defaults/hosting_banner_cloud.png')}}" class="img-fluid border" width="800px" height="800px" />
    </a>
    <!--custom ads-->

    <!--aside-->
    <div class="mb-3" style="width:100%; height:800px">
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
</div>

@include('components/fixed_mobile_menu')
</x-guest-layout>
