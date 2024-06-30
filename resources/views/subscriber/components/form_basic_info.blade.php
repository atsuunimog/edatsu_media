<!--switch form contact-->
<div id='tab-panel' class="border display-panel rounded tab-active tab px-3 py-3 mb-3">

<!--image-->
<div class='avatar-container position-relative'>
    <div class="avatar border">
    @if(isset($profile_data->profile_picture))
    <img id='profile-picture' src="{{$profile_data->profile_picture}}" class="img-fluid">
    @else
    <img id='profile-picture' src="{{asset('assets/img/hemba_business/hemba_business_1.png')}}" class="img-fluid">
    @endif
    </div>
    <div class="validation-badge">
    {{-- <img width="30" height="30" 
    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAADOUlEQVR4nO2Zz2sTQRTHl3pQ/wXRiydBLCgetBVEhHbeS1tPKYJQpHdRVPAYj9mZ9NdBUbCleuihgkevbeatv+OxtggeRGn9BaII2pZm5aVNm+ZXZ9uZNKk+eIfsTt58vrNvZmfned5/28EmCa8rgmteI5rSsfNKw5LUmJUEPV4jmR/gGUn4RxGG7FLjQioda/fqwVLptgOS4J0kGEqROJUIE02F9/sm4Ygk+J6HX3UNP/10x7HieElqP6wIbkrCqeSE2O9cgCLsLgSThLNKwx2pUaSedBxSBHMl8KsOc9yG2+b+Qzhb1KbbuQCpcbAy4BZdw4BzAYrghSsBkuC5U/i+p/G9SsO8MwEaF7gPZwJ40jpLH8qLgFbr4ImJ03s4sCQYcy6AYIz74j43DewHXfsUiU5JkFSEgSL87RpclfoiL62S4C6/CPspdtBYgNI4sw3A4QapNW0ugNCvNeCtTHyj1EoaC0ilsaWW8CNTPeHLpf7w0YcrlQUEHSeNBfD2oPob1T58JhzMeTkRUuPn4i3Lxmmkcdg1/Oibi+Gr7Bo8O/++/Xp9OkkN9yLB59IoiHXVcuQzK/AsqrS96IwsQGrRXOuRHy0Lz09ANEeC9wM4znlXD/CKXcM340mc0uKs1PijbuBp5SkQ/lIEUB0+EBd4Q2Vr7bYFr9Z80SfRWx6e4DJ/w5oGe/j+kjGAJfhweT5gVlHsxpYEMLwpiE14VU2AaQrxGm0KZBteVUuhKJO43BqeyQ6E92d63Y08GUziKMtoNRHWR15HWEajvMgqgVpOmzDyiywnII3nTIKXfRIW4RVhyNua6AIIR0w7qCTCBrzKpRAOR4LnravU8ClKJ8UirMHT8nZ6fDy+y3z0NbRupqO8CJvwKp9GaWyJkD4gN9sRg9uGV8vuN/RHvSJ4++8cqzT8wZbtye1sska1ocdid2HlxbprmHcy8oXGR+DO0kfjM8+1cRHCYf73b0OJCb5Kgge8auXKR6Vlo0L/wm34mJ5rbFLDx/WxYvHaFPk0TPMS20fiRPGJWWpSHC33PcHX+F5h20SYaOIYHItjcmyvXsusMhBtXiOZauRCd96khqvsqxf+2w60v6BxFO3k3vUtAAAAAElFTkSuQmCC"> --}}
    </div>
</div>
<!--image--->

    <!--section-->
    <p class='fw-bold'>Basic Info</p>
    
    <div class="mb-3">
    <label for="profile_picture" class="form-label">Profile Picture</label>
        <small class="text-secondary d-block mb-3"><span class="fw-bold text-danger">Important:</span>
        Upload your profile picture. Allowed image format jpg, jpeg, png, gif
        </small>
        <input type="file" class="form-control"  id="profile_picture">
        <input type="hidden" class="form-control" name="profile_picture" id="profile-picture-output" value="{{isset($profile_data->profile_picture)? $profile_data->profile_picture : ''}}">
        <small class='font-monospace fw-bold d-block my-2 text-success'>
            {{isset($profile_data->profile_picture)? '1. Profile Img' : ''}}
        </small>
    </div>


    <div class="mb-3">
    <label for="full_name" class="form-label">Fullname</label>
    <small class="text-secondary d-block mb-3"><span class="fw-bold text-danger">Important:</span>
        Enter your fullname
    </small>
    <input type="text" class="form-control" name="full_name" id="full_name" 
    value="{{isset($profile_data->full_name)? $profile_data->full_name : ''}}">
    </div>


    <div class="mb-3">
    <label for="about" class="form-label">About </label>
    <small class="text-secondary d-block mb-3"><span class="fw-bold text-danger">Optional:</span>
    Hint* Share your Career Goals and Interests
        </small>
    <textarea class="form-control" name="about" id="about_textarea" rows="3">{{isset($profile_data->about)? $profile_data->about : ''}}</textarea>
    </div>


    <div class="input-group mb-3">
    <label for="about" class="form-label">visibility</label>
    <small class="text-secondary d-block mb-3"><span class="fw-bold text-danger">Optional:</span>
    Protect your privacy by hiding your user profile. When hidden, your profile will not be visible 
    to employers and recruiters
    </small>
    <div class="input-group-text">
        <input class="form-check-input mt-0" name="visibility" type="checkbox" 
        aria-label="Checkbox for following text input" 
        {{ 
        (isset($profile_data->visibility) && $profile_data->visibility == 0)? "checked" : ''
         }}>
    </div>
    <input type="text" class="form-control rounded-0 fs-9" value="Hide Profile"
     aria-label="select visibility" disabled>
    </div>
    <!--section-->
</div>
<!--switch form contact-->