<x-app-layout>
    <!--banner-->
    <div class="px border row">
        <div class="col-sm-12">
            <div class="px-3 py-5">
                <h3 class="fw-bold text-center">Admin Dashbord</h3>
            </div>
        </div>
    </div>
    <!--banner-->
    <div class="row">
        <div class="col-sm-2">
            <!--menu list-->
            @include('layouts.admin_side_menu')
            <!--menu list-->
        </div>
        <div class="col-sm-10">
            <!--dashboard panel-->
            <div class="row">
                <div class="col-sm-4">
                    <div class="px-3 py-3 borer rounded text-center border my-3">
                        <h1 class='fw-bold'>0</h1>
                        <span class='d-block fs-9 text-secondary'>Total Users</span>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="px-3 py-3 borer rounded text-center border my-3">
                        <h1 class='fw-bold'>{{$total_events}}</h1>
                        <span class='d-block fs-9 text-secondary'>Total Events</span>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="px-3 py-3 borer rounded text-center border my-3">
                        <h1 class='fw-bold'>{{$total_oppty}}</h1>
                        <span class='d-block fs-9 text-secondary'>Total Opportunities</span>
                    </div>
                </div>
            </div>
            <!--dashboard panel-->
        </div>
    </div>
</x-app-layout>
