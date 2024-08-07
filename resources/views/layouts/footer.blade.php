<div class="container-fluid footer pt-5 pb-3">
<div class="container">
<footer class="row pb-5">
    <div class="col-sm-3">
        <div class='mb-3'>
            <!--logo-->
            <img src="{{ asset('img/logo/trans/logo_trans_4.png')}}" width="80"
            class="img-fluid d-block" alt="logo">
            <!--logo-->
            <p class="m-0 p-0 fs-8">
                The site design and logo of Edatsu Media are copyrighted properties of
                <a href='https://www.edatsu.com' target="_blank" 
                class='text-info text-decoration-none'>Edatsu Technology Limited</a>
            </p>
        </div>
    </div>

    <div class="col-sm-3">
        <h4 class="m-0 mb-2 p-0 fw-bold text-secondary">Quick Links</h4>
        <div class='fs-9'>
        <ul class='list-unstyled'>
            <!-- <li><a class='text-light text-decoration-none mb-1 d-inline-block' href="{{url('platforms')}}">Platforms</a></li> -->
            <li><a class='text-light text-decoration-none mb-1 d-inline-block' href="{{url('advertise')}}">Advertise</a></li>
            <!-- <li><a class='text-light text-decoration-none mb-1 d-inline-block' href="{{url('feedback')}}">Feedback</a></li> -->
            <li><a class='text-light text-decoration-none mb-1 d-inline-block' href="{{url('subscribe')}}">Subscribe</a></li>

        </ul>
        </div>
    </div>

    <div class="col-sm-3">
        <h4 class="m-0 mb-2 p-0 fw-bold text-secondary">Site Info</h4>
        <div class='fs-9'>
        <ul class='list-unstyled'>
            <li><a class='text-light text-decoration-none mb-1 d-inline-block' href="{{url('about-us')}}">About</a></li>
            <li><a class='text-light text-decoration-none mb-1 d-inline-block' href="{{url('terms')}}">Terms Of Use</a></li>
            <li><a class='text-light text-decoration-none mb-1 d-inline-block' href="{{url('sitemap.xml')}}">Sitemap</a></li>
            <li><a class='text-light text-decoration-none mb-1 d-inline-block' href="{{url('privacy-policy')}}">Privacy Policy</a></li>
            <!-- <li><a class='text-light text-decoration-none mb-1 d-inline-block' href="{{url('credits')}}">Credits</a></li> -->
            <!-- <li><a class='text-light text-decoration-none mb-1 d-inline-block' href="{{url('change-log')}}">Change log</a> <span class="badge bg-danger fw-bold py-1">Coming Soon</span></li> -->
        </ul>
        </div>
    </div>
 
    <div class="col-sm-3">
        <h4 class="m-0 mb-2 p-0 fw-bold text-secondary">Support</h4>
        <div class='fs-9'>
        <ul class='list-unstyled'>
            <li><a class='text-light text-decoration-none mb-1 d-inline-block' href="{{url('help')}}">Help Center</a></li>
            <li><a class='text-light text-decoration-none d-inline-block mb-1' href="mailto:info@edatsu.com">info@edatsu.com</a></li>
            <li><a class='text-light text-decoration-none d-inline-block mb-1' href="{{url('#')}}">
                Live Chat
                <span class="material-symbols-outlined align-middle text-info">
                    contact_support
                </span>
            </a></li>
        </ul>
        </div>
    </div>
</footer>
<footer class="row" style="border-top:1px dashed gray">
    <div class="col-sm-12">
        <div class="py-3">
            <span class="fs-9">Edatsu Media &copy; <?php echo date("Y"); ?></span>
        </div>
    </div>
</footer>
</div>
</nav>

<!--smooth scroll-->
<a href="#main">
<div class="smooth-scroll rounded bg-dark text-light d-flex align-items-center shadow-sm">
    <span class="material-symbols-outlined">
    arrow_upward
    </span>
</div>
</a>
<!--smooth scroll-->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<script src="js/main.js"></script>
<script>
    // JavaScript for smooth scrolling
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();

            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
</script>
</body>