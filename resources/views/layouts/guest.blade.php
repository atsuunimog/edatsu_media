<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="application-name" content="Edatsu Media">
        <link rel="icon" type="image/png" sizes="192x192" href="{{asset('img/icons/icon-192x192.png')}}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="apple-touch-icon" sizes="57x57" href="{{asset('img/icons/apple-icon-57x57.png')}}">
        <link rel="apple-touch-icon" sizes="60x60" href="{{asset('img/icons/apple-icon-60x60.png')}}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{asset('img/icons/apple-icon-72x72.png')}}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{asset('img/icons/apple-icon-76x76.png')}}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{asset('img/icons/apple-icon-114x114.png')}}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{asset('img/icons/apple-icon-120x120.png')}}">
        <link rel="apple-touch-icon" sizes="144x144" href="{{asset('img/icons/apple-icon-144x144.png')}}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{asset('img/icons/apple-icon-152x152.png')}}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{asset('img/icons/apple-icon-180x180.png')}}">
        <link rel="icon" type="image/png" sizes="192x192" href="{{asset('img/icons/android-icon-192x192.png')}}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{asset('img/icons/favicon-32x32.png')}}">
        <link rel="icon" type="image/png" sizes="96x96" href="{{asset('img/icons/favicon-96x96.png')}}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{asset('img/icons/favicon-16x16.png')}}">        
        <link rel="manifest" href="/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">
        <title>@yield('meta_title', 'Discover Global Opportunities & Events | Edatsu Media')</title>
        <meta name="description" content="@yield('meta_description', 'Discover funding opportunities, grants, and growth-focused events for entrepreneurs. Your one-stop platform to connect with resources that accelerate business success and innovation')">
        <meta name="keywords" content="@yield('meta_keywords', 'entrepreneur funding, business grants, startup events, entrepreneurship resources, business growth opportunities, startup financing, networking events, small business grants, entrepreneur community, business development resources, startup accelerators, venture capital connections, business pitch events, innovation funding, entrepreneur workshops')">
        <meta name="robots" content="index, follow">
        <link rel="canonical" href="{{dynamicCanon(url()->current())}}">
        <!--facebook open graph-->
        <meta property="og:url"                content="{{dynamicCanon(url()->current())}}" />
        <meta property="og:type"               content="website" />
        <meta property="og:title"              content="@yield('meta_title', 'Discover Global Opportunities & Events | Edatsu Media')" />
        <meta property="og:description"        content="@yield('meta_description', 'Discover funding opportunities, grants, and growth-focused events for entrepreneurs. Your one-stop platform to connect with resources that accelerate business success and innovation')" />
        <meta property="og:image"              content="{{asset('img/edatsu_logo/e_media_open_graph.png')}}" />
        <!--twitter open graph-->
        <meta name="twitter:card" content="@yield('blog_image', '')">
        <meta name="twitter:site" content="{{dynamicCanon(url()->current())}}">
        <meta name="twitter:title" content="@yield('meta_title', 'Discover Global Opportunities & Events | Edatsu Media')">
        <meta name="twitter:description" content="@yield('meta_description', 'Discover funding opportunities, grants, and growth-focused events for entrepreneurs. Your one-stop platform to connect with resources that accelerate business success and innovation')">
        <meta name="twitter:image" content="{{asset('img/edatsu_logo/e_media_open_graph.png')}}">
        <!--font awesome icons-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        {{-- google icons --}}
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@700&family=Montserrat:wght@300;400;600&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
        <!--alert notification-->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
        <link href={{asset('css/style-02.css')}} rel="stylesheet">
        <!-- Scripts -->
        {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-1YPZVXB93H"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', 'G-1YPZVXB93H');
        </script>
        <!--microsoft clarity-->
        <script type="text/javascript">
            (function(c,l,a,r,i,t,y){
                c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
                t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
                y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
            })(window, document, "clarity", "script", "lpdlomf74u");
        </script>
    </head>
    <body>
        @if(Auth::check())
            @if(Auth::user()->role == 'admin')
                @include('layouts.admin_navigation')
            @else
                @include('layouts.subscriber_header')
            @endif
        @else
            @include('layouts.header')
        @endif
        <div class="container-fluid">
        {{ $slot }}
        @include('layouts.social-footer')
        </div>
        @include('layouts.footer')
    </body>
</html>
