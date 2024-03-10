<x-app-layout>
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                @include('subscriber.side_menu')
            </div>
            <div class="col-sm-8">
                <!--banner-->
                <div class="px-3 py-3 rounded border text-center bg-white my-3">
                    <h2 class="fw-bold  custom-title-garamond m-0 p-0 py-3">Dashboard</h2>
                </div>
                <!--banner-->
                <div class="my-3 fs-9 text-secondary py-3">
                    Hi, {{Auth::user()->name}}, you can now save opportunities to your
                     <a href={{route('subscriber.bookmark')}} class="fw-bold text-decoration-none">bookmark</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
