<x-guest-layout>
    <div class="container">
        <div class="row">
        <div class="col-sm-4">
        </div>
        <div class="col-sm-4">
            <div class="vh-100">
            <!--content-->
                 <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="flex items-center justify-end mt-4">
                        <!-- Email Address -->
                        <div class="mb-3">
                            <x-input-label for="email" :value="__('Email')" class="fw-bold"/>
                            <x-text-input id="email" class="block mt-1 w-full form-control" type="email" name="email" :value="old('email')" required autofocus />
                            <x-input-error :messages="$errors->get('email')" class="mt-2 form-control" />
                        </div>
                        <button class="btn custom-bg-highlight text-light border-0 shadow-sm py-2 px-4 inline-block fs-9 mt-1 me-3 fw-bold">
                            Email Password Reset Link
                        </button>
                        <div class="mb-4 mt-3 fs-8 text-sm text-gray-600 dark:text-gray-400">
                            <strong class='text-secondary'>Forgot your password? </strong>No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one
                        </div>
                    </div>
                </form>
                </div>
            <!--content-->
        </div>
        <div class="col-sm-4">
        </div>
    </div>
    </div>
</x-guest-layout>
