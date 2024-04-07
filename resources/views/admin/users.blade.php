<x-app-layout>
<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <!--menu list-->
            @include('layouts.admin_side_menu')
            <!--menu list-->
        </div>
        <div class="col-sm-9">
            <!--dashboard panel-->

            <!--banner-->
            <div class="px-3 py-3 rounded border text-center bg-white my-3">
                    <h2 class="fw-bold  custom-title-garamond m-0 p-0 py-3">All Users</h2>
            </div>
            <!--banner-->
        
            <!--dashboard panel-->
        </div>
    </div>
</div>
</x-app-layout>
