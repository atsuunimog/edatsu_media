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
                   <p class="m-0">Hi, <strong>{{Auth::user()->name}}</strong>,</p> 
                </div>
                <!--subsection-->
                <div class="row">
                    <div class="col-6 col-sm-6">
                        <a href="{{route('subscriber.bookmark')}}" class="text-decoration-none text-dark">
                        <div class="border bg-white px-3 py-3 mb-3 rounded text-center">
                            <span class="material-symbols-outlined" style="font-size:2em;">
                            collections_bookmark
                            </span>
                            <span class="d-block">Bookmark</span>
                        </div>
                        </a>
                    </div>
                    <div class="col-6 col-sm-6 ">
                        <a href="{{route('profile.edit')}}" class="mb-3 text-decoration-none text-dark">
                        <div class="border bg-white px-3 py-3 rounded text-center mb-3">
                            <span class="material-symbols-outlined" style="font-size:2em;">
                            settings
                            </span>
                            <span class="d-block">Settings</span>
                        </div>
                        </a>
                    </div>
                </div>
                <!--subsection-->
            </div>
        </div>
    </div>
</x-app-layout>
