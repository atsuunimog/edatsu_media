<x-app-layout>
<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <!--menu list-->
            @include('layouts.admin_side_menu')
            <!--menu list-->
        </div>
        <div class="col-sm-9">

            <!--banner-->
            <div class="px-3 py-3 rounded border text-center bg-white my-3">
                <h2 class="fw-bold  custom-title-garamond m-0 p-0 py-3">Admin Dashboard</h2>
            </div>
            <!--banner-->

            <!--dashboard panel-->
            <div class="row">
                <div class="col-sm-3">
                    <div class="px-3 py-3 borer rounded text-center border my-3 bg-white">
                        <h3 class='fw-bold m-0'>{{$total_users}}</h3>
                        <span class='d-block fs-9 text-secondary'>Users</span>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="px-3 py-3 borer rounded text-center border my-3 bg-white">
                        <h3 class='fw-bold m-0'>0</h3>
                        <span class='d-block fs-9 text-secondary'>Verified Users</span>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="px-3 py-3 borer rounded text-center border my-3 bg-white">
                        <h3 class='fw-bold m-0'>0</h3>
                        <span class='d-block fs-9 text-secondary'>Active Users</span>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="px-3 py-3 borer rounded text-center border my-3 bg-white">
                        <h3 class='fw-bold m-0'>{{$total_oppty}}</h3>
                        <span class='d-block fs-9 text-secondary'>Opportunites</span>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="px-3 py-3 borer rounded text-center border my-3 bg-white">
                        <h3 class='fw-bold m-0'>{{$total_events}}</h3>
                        <span class='d-block fs-9 text-secondary'>Events</span>
                    </div>
                </div>
            </div>
            <!--dashboard panel-->
        </div>
    </div>
</div>
</x-app-layout>
