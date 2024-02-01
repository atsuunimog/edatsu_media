<x-app-layout>

<div class="container">
    <div class="row">
        <div class="col-sm-4">
            @include('subscriber.side_menu')
        </div>
        <div class="col-sm-8">
            <!--banner-->
            <div class="px-3 py-3 rounded border text-center bg-white my-3">
                <h2 class="fw-bold  custom-title-garamond m-0 p-0 py-3">Settings</h2>
            </div>
            <!--banner-->

            <!--profile update-->
            <div class="my-3">
                <p class="fw-bold">Update Profile</p>
                @include('profile.partials.update-profile-information-form')
            </div>

            <div class="my-3">
                <p class="fw-bold">Update Password</p>
                @include('profile.partials.update-password-form')
            </div>

            <div class="my-3">
                <p class="fw-bold">Delete Account</p>
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</div>
</x-app-layout>
