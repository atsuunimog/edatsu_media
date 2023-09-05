<x-guest-layout>

<div class="row">
    <div class="col-sm-4">
        <div class=" px-3 py-3 rounded my-5">
        <h1 class='fw-bold'>Find life changing 
            <span style='color:#FB5607;'>opportunities</span> and <span style='color:#FB5607;'>events</span></h1>
        <h3>What you get for <span style='color:#FB5607;'>FREE</span></h3>
        <ul>
            <li class="mb-3"><strong class='d-block'>Instant notification</strong>
            Customize your notification and get them instantly.
            Never miss an event or opportunity
            (We usually target tech and entrepreneural opportunities and events)</li>
           
            <li class="mb-3"><strong class='d-block'>Bookmarking</strong>
            Save news from different media outlets around the world, and binge read them anytime
            </li>
    
        </ul>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="border px-3 py-3 rounded my-5 bg-white">
        <h3 class='fw-bold mb-3'>Sign up</h3>
        <p class='mb-3'>Never miss an opportunity or event that might change your life</li>
        <form method="POST" action="{{ route('subscriber-register') }}">
            @csrf
            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block form-control shadow-none mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block form-control shadow-none mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="block form-control shadow-none mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
    
            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                <x-text-input id="password_confirmation" class="block form-control shadow-none mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <p>Add Recaptcha</p>
    
            <div class="flex items-center justify-end mt-4">
                <a class="fs-9 text-decoration-none" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
                <input type="submit" value="Login" class="btn btn-dark py-3 rounded w-100 d-block mt-3 mb-3 border-0 px-5">
            </div>

            <small class="text-secondary d-block fs-8 mb-3">
                By signing up for edatsu medai, you agree to edatsu's 
                <a href='#' class="text-decoration-none">Terms of Service</a> & 
                <a href='#' class="text-decoration-none" >Privacy Policy</a>.
            </small>
        </form>

        <p class='fs-9'>Signup using social account</p>
        <!--social login-->
        <div class='d-flex'>
        <div class='border px-2 py-2 me-3 rounded'>
            <img width="40" height="40" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAAEy0lEQVR4nO2ZbUwbZQDHL45M5vygycRkL0YFlWw9oHdFYSsr69uItBksIYwOwiC8KKwq4EAY8TYYsoG8CIOFCduCzmiTQbveNSC4q7p9chlkEo0fTIxrC2uPFzcXoC885sggdYP2bj1ajP0n/y9N7+nvd9fnuadXCAommGB8DsBEIdMVaB5VjBDWTPTOuFIwNy4TuCx7Y4FFGAss+wQLEwp09q4KNdsK+QNUKT8XYFAIFOj8VQ7HUQXIDUsS6jTHxwI2tcgFTlsecmO6KjrG/+DVgjeoPPS2JUHACnpFEWEssB1BRmeOo+F+gZ/6EGk2SwQLvoI/JiIWuGY+QE6vGThoittky0F+4Rrc/EhtOcgIwNI2cgo/0wk/b1UhE2sNb37YaTW/lTN4cFEUak1Hrf6CpwoQEuIyVD7ys9/g8zmGny5B2lhNRDnqpPKRm1Ml/OqpkzGiexi65X5ZVJjtGCyhSmMwKhcZpZfPVc68kVP4mVo03CITuJiCT5UgXUwmnxlDn7Ed5V9yF6G4hqczqUZ+YgJvPYyY7tfxXmQ7Pr3uWzOQ8TWBB9/v2jE/DM9PlfGBebfHJe8W0EAboPUWBwmfdhhhQPfvc9FgXPL4HdeaiZrWJTzQpG2wG3mmJQG6c7ooYFWhbt95gZMqid4GrcfYjbx4d/jlXoPBvbqYxb3LpBrphtZr7Ea4akWBh31wIXoCqJOehtZr7CR8xZOAwwi3sRnvhXwj4KrJVT1/eP1Ah5E35lGAjEoKlMBbpd/Mev1AOwlPehKYJXdGBErgtWLCxURg3pMAIHc+GyiBbYXD4H8hMOlJYO6HqNcDJRBRRCz8xyexhtEk7vOyjLYHSuDt4z0mBgK8ytXg717jg1pc9qBJk7YJ4jiNvWWbee/pnJ4E3q1v0DMQgONWgh8ZfhNk6RRA0Z8CWgziC1wLqM/Ud3u7AjXtFSqvAwEAPWU38u4sgduNMOgfEIIU7YFFeLqHdQpnx0DCDq7g61sqXo4s1rs8wUcexZ0YiTF7mucwwvU0/AwZDWpw+TK4eyuuyi0kKfL58SBGYiHJlT0Wb2c/p7b1OuNBAQlv/21YYM/TJa8Iv9QTuGzUFwmMxELSsY4xb/BbC78DNZ99hLIavA6XjnqCX74Serml+9vdW9nCdw3teSm/sfZ3JqtP2sedY2zHh3SDCa9kahUuJhKZOoWzjUjswS5mh3obt3dQtrkFl3yu0ipcqX2p4OCpVo/w4UWGBexTjNXNczkdhLhZyUDAXaROLx05axBjXxEJ4iuD8WGXSdGWHsMeYbshseYELr9Jv8f9GGVfKshqxkBYAbmiQMGpxk7Il9QTkhGmAr40u+t9sP2doX/Bp1Sf/xXyNRpN2sZjuv3jfpHozQWRav0i/L7yL6gi7CyrjeOqIUnRc5V6ucUfEoe+VoGMmlYT1omFcQLvJhF6EpfdZjMnnqS1hHTEYFjD39xdhr0Nh7RKRqsTm2Zola5zRGID5I/06kQRdbj01kG37cWTNrX/wOJZvzwkfBXydy4NCtEzuPTHHG2yg/WE1Skcn+DS61/iMv//yfdoNADacB4XH2nCxfpKXPZngTZ5NkurcNFXiN4EpmuVC/Rr5Vf3mxoICdFlSMymj4GCCSYYyNf8A50RcaYC8geEAAAAAElFTkSuQmCC">
        </div>
        <div class='border px-2 py-2 rounded'>
            <img width="40" height="40" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAADK0lEQVR4nO2Zz08TQRTHNzM0MQHixaMnI2jE4Mmr/4A/okej3r0oAn+AiYke9IYkpDNFDAkRqokHL4bEEzFelIqAJP5IDPvetrXQAhXSsrRjplYMboGdnd0th/0m79TN7Pcz8+bN7KthRIoUKZJUbNg8Qxj0UYZJwnCGcsxTjpv1yBOGH2u/cbNXPmscCCVy7YRDP2XwmXIUSsFgXgIbg9m28I3fFS1yJinDZWXjDhBcIgzvyDHDMR/Hk4RjStv4f0EYThsJOBGodxqHS5RD0W/z9F9arVEOFwMxTxLWDcrBDsw8/xtgE25dD2LmQzCP2xCUwQV/3A+ZHX+WVs9U24glOiey4uzLn6LreVZ0jGfE4afWXhBFud98qDbeN2wLR3H1TV5Mpctis1IVjXR5cnn3jc3hg1Z1qpVKj+YPDVti4vuG2E9X9gCoQcSxx5v70XQr5ZDzCvBwpriveTcA8pyQB6aH2Yd+r+aPjmVEeZeUUQbg8oyAPmUAT9eDevS+W2lotlCuiPupNXFzqrAdx55l9h+TwbySeXnZ0qk4498a5/65VznPY8YS6dOhpI+Mt5myw/zs8qbn8ajqZpbXXp2XzeVtB8DY1w0tAMpwXGEF8JPOyxYKToDHc7/0VoBjSmUFlvwGGNAEoBxyKgDlgweApUAA7k2viXypsiO2GhwBpa2q47l8qSK6X2QDAXCdQo9cnriNVBVCtI9Y/qeQyibWAfhR3ApsEyfDAJiEUkBlVLZHQgAYUNjYhONt1wAxbnarfKgcGU3viC8rzirEFtYdz7U+cZv/KGIs3eUaoL4KswolLtgyyhQvc6ppFDQA4WZvqB80vgIwXPLcvZMds2YDEIa3DK2PeobTzQIgHN4bSUENLfHF45TBavgA4ENbpS7Z7lNpbOkDgE0T5nnDT8l2n1sIPQCwCcNrRhCS7T43XTrPAAxWfZ95hxh0yo6Z3wBEbtghs8MIRbI6xbFnt2u3GgDkaqVSu9p40WC2TZ7YhMOcKoC8qhB5wjblL6YGkpet2qpwnHhtlgqLRbuybleFDLNoVx6kVi15Ja61R4atU832GylSJONg6DekIcfGE7hs2QAAAABJRU5ErkJggg==">
        </div>
    </div>
    <!--social login-->
        </div>
    </div>
    <div class="col-sm-4"></div>
</div>
</x-guest-layout>
