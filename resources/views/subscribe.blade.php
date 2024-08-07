<x-guest-layout>
    <div class="row">
        <div class="col-sm-12 text-center">
            <div class="py-5">
                 <!--logo-->
                 <a href='./'>
                    <img src="{{ asset('img/logo/trans/logo_trans_1.png')}}" width="90" class="img-fluid" alt="logo">
                    </a>
                <!--logo-->
                <h1 class='fw-bold mb-0 p-0'>Never Miss Out</h1>
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
        <div class="mb-3">
            @include('components/subscription_box')
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
    