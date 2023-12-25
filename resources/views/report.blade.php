<x-guest-layout>
    <div class="row">
        <div class="col-sm-12 text-center">
            <div class="py-5">
                 <!--logo-->
                 <a href='./'>
                    <img src="{{ asset('img/logo/trans/logo_trans_1.png')}}" width="90" class="img-fluid" alt="logo">
                    </a>
                <!--logo-->
                <h1 class='fw-bold mb-3'>Report</h1>
                <p class=''>
                    Report any erroneous or wrong job post. We'll make 
                    changes within a few minutes
                </p>
            </div>  
        </div>
    </div>
    <!--body-->
    <div class="row">
        <div class="col-sm-3 col-12">
            <!--aside-->
            <!--aside-->
        </div>
        <div class="col-sm-6 col-12">
        <!--subscribe-->
            <div class='px-3 py-3 bg-white border rounded'>
                <form method="post" action="">
                    <textarea min="100" class="form-control mb-3">Hi, what's your report?</textarea>
                    <input type="hidden"  value={{$post_id}}>
                    <button class="btn btn-dark fw-bold py-3 d-block w-100">Submit Report</button>
                </form>
            </div>
        <!--subscribe-->
        </div>
        <div class="col-sm-3 col-12">
        <!--aside-->
        <!--aside-->
        </div>
    </div>
    <!--body-->
    @include('components/fixed_mobile_menu')
    </x-guest-layout>
    