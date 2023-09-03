<x-guest-layout>
    <div class="row d-sm-none d-md-none d-lg-none">
        <div class="col-sm-12 text-center">
            <div class="py-5">
            <h1 class='fw-bold'>Opportunities</h1>
            <p class=''>Program Details</p>
            </div>  
        </div>
    </div>

@php
function processCountries($countriesString) {
    $countries = explode(',', $countriesString);
    $cleanedCountries = array_map('trim', $countries);

    if (count($cleanedCountries) === 1) {
        echo"
            <li class=''>
                        <span class='data-labels'>
                            ".ucwords(str_replace("_", " ", $cleanedCountries[0]))."
                        </span>
            </li>";
    } else {
        foreach ($cleanedCountries as $country) {
            echo"
            <li class=''>
                        <span class='data-labels'>
                            ".ucwords(str_replace("_", " ", $country))."
                        </span>
            </li>";
        }
    }
}

@endphp

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
                <h5 class='fw-bold m-0 mb-1'>{{$opp_posts->title}}</h5>
                <span class="mb-2 d-block text-sm text-secondary fs-9">Posted on: {{ date('D, M Y', strtotime($opp_posts->created_at))}}</span>
                <p class='m-0'>{!! $opp_posts->description !!}</p>

                <ul class="m-0 p-0 label-list mb-2">
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

                <div class="row">
                    <div class="col-sm-4">
                        @isset($opp_posts->deadline)
                        <p class='p-0 my-2 fs-9'>{!! get_days_left($opp_posts->deadline) !!}</p>
                        @endisset
                        </div>
                    <div class="col-sm-8">
                        @isset($opp_posts->deadline)
                        <p class='my-2 p-0 fs-9 text-dark'>Deadline: {{ date('d, M Y', strtotime($opp_posts->deadline))}}</p>
                        @endisset
                    </div>
                </div>

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

                <!--add disqus here-->
                <div id="disqus_thread" class="mt-5"></div>
                <!--add disqus here-->
            </div>
        </div>

        <div class="col-sm-4">
            <div class=" bg-white mb-3">
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
             <div class=" mb-3 bg-white">
                <a href="https://kol.jumia.com/api/click/link/d85c6dd6-5eec-47e9-b103-577be07cf3f6/0c7c436a-7891-435c-a9fc-3881f7125b11">
                <img src="{{asset('img/ads_img/oraimo_stores.png')}}" width="100%" class='img-fluid' alt="oraimo">
                </a>
            </div>
            <!--aside-->

        </div>
    </div>
    </div>

 
  
<script>
    /**
    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
    /*
    var disqus_config = function () {
    this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
    this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };
    */
    (function() { // DON'T EDIT BELOW THIS LINE
    var d = document, s = d.createElement('script');
    s.src = 'https://media-edatsu-com.disqus.com/embed.js';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

@include('components/fixed_mobile_menu')
</x-guest-layout>
    
