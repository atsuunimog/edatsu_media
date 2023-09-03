<x-guest-layout>
    <div class="row">
        <div class="col-sm-12 text-center">
            <div class="py-5">
                 <!--logo-->
                 <a href='./'>
                    <img src="{{ asset('img/logo/trans/logo_trans_1.png')}}" width="90" class="img-fluid" alt="logo">
                    </a>
                <!--logo-->
                <h1 class='fw-bold mb-3'>Feedback</h1>
                <p class=''>
                    To share your thoughts, no how we can improve your experience, send us your feedback
                </p>
            </div>  
        </div>
    </div>

    <div class="container">
    
    <!--body-->
    <div class="row">
        <div class="col-sm-3 col-12">
        </div>
    
        <div class="col-sm-6 col-12">
            <!--feedback form-->
            <iframe src="https://docs.google.com/forms/d/e/1FAIpQLScxI0lzMomnkHklK2Yi3i_9BsqK8BQcQ0Dt3JA-K6fruNsKSQ/viewform?embedded=true" width="100%" height="500" frameborder="0" marginheight="0" marginwidth="0">Loading…</iframe>
            <!--feedback form-->
        </div>

        <div class="col-sm-3 col-12">
        <!--aside-->
        <div class='px-3 py-3 rounded border mb-3 bg-white'>
            <!--logo-->
            <a href='./'>
            <img src="{{ asset('img/logo/trans/logo_trans_1.png')}}" width="90" class="img-fluid d-block mx-auto" alt="logo">
            </a>
            <!--logo-->
            <h5 class='fw-bold m-0 mb-3'>Submit Events</h5>
            <p class="fs-9 text-secondary">
            Submit a tech event. It's free.
            </p>
            <a href="https://docs.google.com/forms/d/e/1FAIpQLSfxDBVx1cxmooAkjjTaErpGuuaPPP1eoFUhgfQtHjtyz3IbaA/viewform?usp=sf_link" 
            target="_blank"
            class='btn btn-dark w-100 fs-9 py-3 my-3'>Submit</a>
        </div>
        <!--aside-->
        </div>
    </div>
    </div>
    <!--body-->
    @include('components/fixed_mobile_menu')
    </x-guest-layout>
    