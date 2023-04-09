<x-app-layout>
    <!--banner-->
    <div class="px border row">
        <div class="col-sm-12">
            <div class="px-3 py-3">
                <h3 class="fw-bold text-center">Admin Dashbord</h3>
            </div>
        </div>
    </div>
    <!--banner-->

    <div class="row">
        <div class="col-sm-3">
            <!--menu list-->
            @include('layouts.admin_side_menu')
             <!--menu list-->
        </div>
        <div class="col-sm-9">
            {{-- main --}}
            <!--dashboard panel-->
            <div class="row">
                <div class="col-sm-6 ">
                    <div class="px-3 py-3 borer rounded text-center">
                        <span class='d-block '>Total Number of Events</span>
                        <h1 class='fw-bold'>{{$total_events}}<h1>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="px-3 py-3 borer rounded text-center">
                        <span class='d-block '>Total Number of Opportunites</span>
                        <h1 class='fw-bold'>{{$total_oppty}}<h1>
                    </div>
                </div>
            </div>
            
            <!--dashboard panel-->
        </div>
    </div>
</x-app-layout>
