 <!--switch form contact-->
 <div id='tab-panel' class="border rounded display-panel tab px-3 py-3 mb-3">
    <!---section-->
    <p class="fw-bold">Contact Info</p>

    <div class="mb-3">
        <label for="linkedin_profile" class="form-label">Linkedin Profile</label>
        <small class="text-secondary d-block mb-3"><span class="fw-bold text-danger">Optional:</span>
          Add a LinkedIn URL in the format "https://linkedin.com/in/your-name"
          </small>
        <input type="text" class="form-control" name="linkedin_profile" placeholder=""
        value="{{isset($profile_data->linkedin_profile)? $profile_data->linkedin_profile : ''}}"
        placeholder=""
        id="linkedin_profile">
      </div>
      <div class="mb-3">
        <label for="company_email" class="form-label">Email</label>
        <small class="text-secondary d-block mb-3"><span class="fw-bold text-danger">Notification & Updates:</span>
        Please enter the email address where you would like to receive job notifications. We will use this email address to send you relevant job opportunities and updates
        </small>
        <input type="email" class="form-control" name="email" id="email"
        value="{{isset($profile_data->email)? $profile_data->email : Auth::user()->email}}">
      </div>


      <div class="mb-3">
        <label for="phone_no" class="form-label">Phone Number</label>
        <small class="text-secondary d-block mb-3"><span class="fw-bold text-danger">Important:</span>
          This information is exclusively accessible to verified businesses.
          Do not include country code when entering your phone number.
         </small>
        <input type="tel" class="form-control" name="phone_no" id="phone_no"
        value="{{isset($profile_data->phone_no)? $profile_data->phone_no : ''}}">
      </div>

      <div class="mb-3">
        <label for="whatsapp_no" class="form-label">Whatsapp Phone Number</label>
        <small class="text-secondary d-block mb-3"><span class="fw-bold text-danger">Optional:</span>
          This information is exclusively accessible to verified businesses.
          Do not include country code when entering your phone number.
         </small>
        <input type="tel" class="form-control" name="whatsapp_no" id="whatsapp_no"
        value="{{isset($profile_data->whatsapp_no)? $profile_data->whatsapp_no : ''}}">
      </div>

      <div class="mb-3">
        <label for="location" class="form-label">Location</label>
        <small class="text-secondary d-block mb-3"><span class="fw-bold text-danger">Important:</span>
          This information is exclusively accessible to verified businesses for enhanced security and privacy.
        </small>
        <input type="text" class="form-control" name="location" id="location"
        value="{{isset($profile_data->location)? $profile_data->location : ''}}">
      </div>

      <div class="mb-3">
        <label for="state_of_residence" class="form-label">State of Residence</label>
        <small class="text-secondary d-block mb-3"><span class="fw-bold text-danger">Important:</span>
         Please provide your current state of residence
        </small>
        <select  class="form-select"  id="state" name="state_of_residence">
          @if(isset($profile_data->state_of_residence))
            <option  
            value="{{$profile_data->state_of_residence}}" selected="selected">
            {{ str_replace('_', ' ', ucwords($profile_data->state_of_residence, '_')) }}
          </option>
          @else
             <option  selected="selected" value="">--Select State--</option> 
          @endif
        </select>
      </div>
    <!---section-->
 </div>
 <!--switch form contact-->
