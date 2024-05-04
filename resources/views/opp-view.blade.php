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

            <!--jumia ads-->
            <a href="https://kol.jumia.com/api/click/link/d85c6dd6-5eec-47e9-b103-577be07cf3f6/5c9bfd65-61f6-44be-93ab-c30e85df5a43">
                <img class="img-fluid mb-3" src="https://kol.jumia.com/banners/7t5DPmvsrP9uH2298X3T30DM2uGHyL7GpgA4n0XU.jpeg" 
            alt="Computing Category"/>
            </a>
            <!--jumia ads-->


            <div class="px-3 py-3 bg-white rounded border mb-3">
                <!--main content-->
                <h5 class='fw-bold m-0 mb-1'>{{$opp_posts->title}}</h5>
                <span class="mb-2 d-block text-sm text-dark fs-9">Posted on: {{ date('D, M Y', strtotime($opp_posts->created_at))}}</span>
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

              
            </div>
        </div>

        <div class="col-sm-4">

            <div class="px-3 py-3 border rounded mb-3 bg-white">
                <p class="fw-bold mb-0">Hey there!</p>
                <p class="fs-9">
                    If you've found value in the insightful articles, useful resources, and uplifting events shared on Edatsu Media, consider showing your support! Your contribution helps fuel the dedication and passion of our talented authors, enabling us to continue providing invaluable support to businesses like yours.
                </p>
                <script type="text/javascript" src="https://cdnjs.buymeacoffee.com/1.0.0/button.prod.min.js" data-name="bmc-button" data-slug="atsudominic" data-color="#FFDD00" data-emoji="☕"  data-font="Cookie" data-text="Support the Author" data-outline-color="#000000" data-font-color="#000000" data-coffee-color="#ffffff" ></script>
            </div>

            <!--jumia ads-->

            <a href="https://kol.jumia.com/api/click/link/d85c6dd6-5eec-47e9-b103-577be07cf3f6/20970e75-bb01-4c19-aa7a-66228871409c">
            <img src="https://kol.jumia.com/banners/TevxSeaiZkwhV911xSUQgD0Ydagz5GGEV2ALMJZF.jpg" 
            class="img-fluid mb-3"
            alt="ITEL OFFICIAL STORE"/></a>

            <!--jumia ads-->

            <!-- <div class="px-3 py-3 border rounded mb-3 bg-white">
                <p class="fw-bold mb-0">Dear Valued Community</p>
                <p class="fs-9">
                    By supporting us on Patreon, you not only help us sustain and grow our platform but also become an integral part of our journey towards creating something truly special. Your contributions directly impact our ability to enhance features, develop new content, and maintain the high quality of service you've come to expect.
                </p>
                <a href="https://www.patreon.com/bePatron?u=7842396" 
                class="text-decoration-none btn btn-sm rounded border fw-bold px-4" 
                data-patreon-widget-type="become-patron-button">
                <img width="30" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAACZUlEQVR4nO2UPYvUQByHF18uFr4i9trJoqjYmOxeZpNskskmm02yl+K+gMIh9wU8sBNBsL7GTgQFGxErOS3FQkSbA4srPb1MZmbPSou/xLsrFJHN7kwWjzzwNCkyv4fZTaNRU1NTs6/Z9tKLI3dhheOFtREero/w8Nuu6zvP0lvbdnxB6KHKZRP+Zpl3UCcxuDN8y90hjCNzkzcjnKKZB2yF4THuJE/HHc7/1EmefEHp0ZkEUDs9x5zkI3cSmEbmJB+oOzhbaQC3otPcjj9NO57vaScbI5yeqSQArl4/zOz4NbdjEGo3WgOEDkkP4Ha8LHy8vSOz4yWpAcUfjnajTdaNQIbUGnzNMD4uLYBb8TKzIpCqGd2UFsDM8BWzBiBVM3wpJSDvpieoOfjBzOIQeVIz/F7qZzRuALXCK8wMoQpzw78k/gY6oU+NEKqQmIEnPIAY/UVq9KEKidFfFB5AO4FFO32oRKNvCg/IzLBJOwFU4RYKzgsPAIwVigJOUQBS1QMGzXROeEBBjvzHFPkgVd1/NPb4sgFZ21/IdR9kSvVeIi0AGrcPkPneu1zvgQyJ7r0vzpAWUEDaPZzP90CGme7ZpcZPElCQt7z7edsDwd4rPX7SAEjTg3kbvxA2vuU9L95ZWcCviGY6RzT3AWlhmMas5T7cQOjIROOnCdgjV/FSpmFCNAxlzDSckWvujYmHiwooYG3/VKa5d4nmbhLNhX/rfCaqc4cidHLq8aICfvvMqo6WqfZKpjqrmeo823W1eEY0Vy39mawyYCYodcCMUeobmDFKfQMzRvnfb6CmpqampjEmPwGJluhB13jPawAAAABJRU5ErkJggg==">
                &nbsp; Become a member
                </a>
            </div> -->


            <div class="mb-3">
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
    </div>

 
@include('components/fixed_mobile_menu')
</x-guest-layout>
    
