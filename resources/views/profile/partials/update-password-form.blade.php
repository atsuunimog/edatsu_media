<section class="border-bottom bg-white border rounded mb-3 py-3 px-3">
    <header>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400 fs-9">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <div class="row">
        <div class="col-sm-6">
            <!--------xxxxx-------->
            <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                @csrf
                @method('put')

                <div>
                <x-input-label for="current_password" :value="__('Current Password')" />
                <x-text-input id="current_password" name="current_password" type="password"
                class="mt-1 block w-5 shadow-none mb-2 border fs-9  form-control" autocomplete="current-password" />
                <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                </div>

                <div>
                <x-input-label for="password" :value="__('New Password')" />
                <x-text-input id="password" name="password" type="password" 
                class="mt-1 block w-5 shadow-none mb-2 border fs-9  form-control" autocomplete="new-password" />
                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                </div>

                <div>
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                <x-text-input id="password_confirmation" name="password_confirmation" type="password" 
                class="mt-1 block w-5 shadow-none mb-2 border fs-9  form-control" autocomplete="new-password" />
                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="flex items-center gap-4">
                <x-primary-button class="btn btn-dark text-sm fw-bold text-light mt-3">{{ __('Save') }}</x-primary-button>

                @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
                @endif
                </div>
            </form>
            <!--------xxxxx-------->
        </div>
        <div class="col-sm-6">

        </div>
    </div>

</section>
