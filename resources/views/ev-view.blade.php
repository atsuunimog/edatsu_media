<x-guest-layout>
    <div class="row d-sm-none d-md-none d-lg-none">
        <div class="col-sm-12 text-center">
            <div class="py-5">
                <h1 class='fw-bold'>Event</h1>
                <p class=''>
                Event Details
                </p>
            </div>  
        </div>
    </div>
 @php
     
function processDates($inputString) {
    $dates = explode(',', $inputString);
    $numDates = count($dates);

    if ($numDates > 1) {
        foreach ($dates as $date) {
            $timestamp = strtotime(trim($date));
            if ($timestamp !== false) {
                $formattedDate = date("F j, Y", $timestamp);
                echo $formattedDate . "<br>";
            }
        }
    } else {
        echo  trim($inputString) . "\n";
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
                <h5 class='fw-bold m-0 mb-1 p-0'>{{$ev_posts->title}}</h5>

                <span class="mb-2 d-block text-sm text-secondary fs-9">Posted on: {{ date('D, M Y', strtotime($ev_posts->created_at))}}</span>
               
                <p class='mb-2 fs-9' style='color:#457b9d'>
                    <span class="material-symbols-outlined align-middle">
                        pin_drop
                    </span>
                    {{$ev_posts->location}}
                </p>

                <p class='m-0'>{!! $ev_posts->description !!}</p>


                <ul class="p-0 list-inline mb-2">
                    @isset( $ev_posts->region)
                    <li class="mb-2">
                        <span class='data-labels'>
                            {{ucwords(str_replace("_", " ", $ev_posts->region))}}
                        </span>
                    </li>
                    @endisset

                    @isset( $ev_posts->country)
                    <li class="mb-2">
                        <span class='data-labels'>
                            {{ucwords(str_replace("_", " ", $ev_posts->country))}}
                        </span>
                    </li>
                    @endisset
                </ul>

                <div class="row fs-9">
                    <div class="col-sm-4">
                        @isset($ev_posts->event_time)
                        <p class='my-3 p-0 text-dark'>
                        <span class="material-symbols-outlined align-middle me-2">
                        schedule
                        </span>
                        Time: {{ date("g:i A", strtotime($ev_posts->event_time)) }}</p>
                        @endisset
                    </div>

                    <div class="col-sm-8">
                        @isset($ev_posts->event_date)
                        <p class='my-3 p-0 text-dark'>
                        <span class="material-symbols-outlined align-middle me-2">
                        event
                        </span>
                        Date: {{ date('d, M Y', strtotime($ev_posts->event_date))}}</p>
                        @endisset
                    </div>
                </div>

                @isset($ev_posts->alternate_dates)
                <p class='mb-3 p-0 text-dark fs-9'>
                <span class="material-symbols-outlined align-middle me-2">
                event_upcoming
                </span>
                Other dates: <br> {{processDates($ev_posts->alternate_dates)}}</p>
                @endisset

                @isset($ev_posts->event_date)
                <p class='p-0'>{!! get_days_left($ev_posts->event_date) !!}</p>
                @endisset

                <div class="d-flex justify-content-end">
                    <div class='position-relative'>
                        <div class="position-absolute share-panel border fs-9 rounded d-none">
                            <ul>
                                <li><a class='text-decoration-none text-dark' href="https://api.whatsapp.com/send?text={{route('read.ev', ['id'=> $ev_posts->id, 'title'=> Str::slug($ev_posts->title, '-')])}}"
                                    target="_blank"><img width="30" src="{{asset('img/gif/icons8-whatsapp.gif')}}" alt="whatsapp"> WhatsApp</a></li>
                            
                                <li><a class='text-decoration-none text-dark' href="https://t.me/share/url?url={{route('read.ev', ['id'=> $ev_posts->id, 'title'=> Str::slug($ev_posts->title, '-')])}}"
                                    target="_blank"><img width="30" src="{{asset('img/gif/icons8-telegram.gif')}}" alt="telegram"> Telegram</a></li>
                                
                                <li><a class='text-decoration-none text-dark' href="https://www.linkedin.com/sharing/share-offsite/?url={{route('read.ev', ['id'=> $ev_posts->id, 'title'=> Str::slug($ev_posts->title, '-')])}}"
                                    target="_blank"><img width="30" src="{{asset('img/gif/icons8-linkedin.gif')}}" alt="linkedin"> LinkedIn</a></li>
                                
                                <li><a class='text-decoration-none text-dark' href="https://twitter.com/intent/tweet?url={{route('read.ev', ['id'=> $ev_posts->id, 'title'=> Str::slug($ev_posts->title, '-')])}}"
                                    target="_blank"><img width="30" src="{{asset('img/gif/icons8-twitter.gif')}}" alt="twitter"> Twitter</a></li>
                            </ul>                            
                        </div>
                        <button class='me-3 text-decoration-none bprder-0 btn fs-9  px-4 py-2 'onClick="console.log(this.previousElementSibling.classList.toggle('d-none'))">
                            <span class="material-symbols-outlined align-middle">
                                share
                            </span>
                        </button>
                     </div>

                     <div class=''>
                        <a class='text-decoration-none  btn  px-4 py-2 fw-bold text-primary fs-9 ' 
                        href='{{$ev_posts->source_url}}' target='_blank'>
                        Event Details
                        </a>
                         </div>
                </div>
                <!--main content-->
            </div>
        </div>

        <div class="col-sm-4">

            <div class="px-3 py-3 border rounded mb-3 bg-white">
                <p class="fs-9">
                    Hi, 
                    <a href='https://twitter.com/unimog2' target='_blank'>I'm Atsu Dominic</a>
                    , and I manage posts at Edatsu Media. I strive to keep you up-to-date with the latest in tech, entrepreneurial opportunities, and ☕️ keep you informed about the latest entrepreneurial events. Your support means the world to us! 💙 #StayInformed #TechEnthusiast
                </p>
                <script type="text/javascript" src="https://cdnjs.buymeacoffee.com/1.0.0/button.prod.min.js" data-name="bmc-button" data-slug="atsudominic" data-color="#FFDD00" data-emoji="☕"  data-font="Cookie" data-text="Buy me a coffee" data-outline-color="#000000" data-font-color="#000000" data-coffee-color="#ffffff" ></script>
            </div>
            
            <div class="mb-3 bg-white border rounded">
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
