<x-app-layout>
    <div class="row">
        <div class="col-sm-3">
        <!--nav menu-->
        @include('subscriber.side_menu')
        <!--nav menu-->
        </div>
        <div class="col-sm-9 order-xs-2">
                <div class="text-center px-3 py-5 border rounded display-panel mb-3">
                <!--banner-->
                    <h2 class="mb-3">Profile</h2>
                    <p class="text-secondary m-0 p-0 d-flex align-items-center  justify-content-center">
                    Your profile is {{$data_count}}% complete 
                    {{-- <img width="25" height="25" src="{{asset('assets/img/hemba_business/blue_checkmark.png')}}" class="ms-1 d-block align-middle img-fluid"> --}}
                    </p>
                    <span class='d-block' style='font-size:2em;'>
                        @if ($data_count == 100)
                        😊
                        @elseif ($data_count >= 50)
                        😒
                        @elseif ($data_count >= 10)
                        😕
                        @else
                        😦
                        @endif
                    </span>
                <!--banner-->
                </div>

                <div class="row">
                    <div class="col-sm-8 ">

                        <!--error-->
         @if($errors->any())
         <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
           <strong>Oops!</strong>
           {{-- @foreach($errors->all() as $error) --}}
               <span class='d-block mb-1' style='font-size:.9em;'>{{ $errors->first() }}</span>
           {{-- @endforeach --}}
           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
           </div>
         @endif
         <!--//error-->

         @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
       
                        <form class='mb-3' method="post" id="jobseeker_profile" enctype="multipart/form-data"
                        action="{{route('subscriber.update-profile')}}"
                        {{-- onsubmit="UpdateProfile(event, this)" --}}
                        >
                            @csrf
                              <!--basic info-->
                              @include('subscriber.components.form_basic_info')
                              <!--basic info-->

                              <!--contact info-->
                              @include('subscriber.components.form_contact_info')
                              <!--contact info-->

                            <input type="submit" class="btn btn-primary" value="Update Profile">
                        </form>
                    </div>

                    <div class="col-sm-4 order-xs-1">
                      <!--button selector-->
                      <ul class="list-group mb-3">
                          <li class="tab-button list-group-item tab-active active" onclick="switchTab(0)">Basic Info</li>
                          <li class="tab-button list-group-item" onclick="switchTab(1)">Contact Info</li>
                          <li class="tab-button list-group-item" onclick="switchTab(2)">Bio Data</li>
                          <li class="tab-button list-group-item" onclick="switchTab(3)">Resume/CV</li>
                          <li class="tab-button list-group-item" onclick="switchTab(4)">References</li>
                      </ul>
                      <!--button selector-->
                  </div>


                </div>
        </div>
    </div>
    </x-app-layout>

<div class="modal-container">
  <div class="cropper-modal">
  </div>
  <div class="profile-crop-box">
    <div class="crop-img bg-white position-relative">
      <div class='text-center position-absolute bg-white  px-3 py-3  shadow rounded w-100' style='z-index:10; bottom:-120px;'>
        <button class="btn btn-primary d-inline-block mx-auto" id="crop-btn">Crop Image</button>
        <button class="btn btn-danger d-inline-block mx-auto" id="close-crop-btn" onclick="closeCropModal()">Close</button>
        <small class='d-block mt-2 text-secondary'>
          File size should not exceed 5MB
        </small>
      </div>
      <!--modal body-->
      <div id="image-container" class="" style="width:100% !important; height:500px !important;"><div>
      <!--modal body-->
    </div>
  </div>
  </div>

<script src="{{asset('assets/js/job_category.js')}}"></script>
<script>

document.addEventListener('DOMContentLoaded', function() {
    var keywords = [];

    // Check if there are existing keywords in the array
    var hiddenInput = document.getElementById('areaOfSpecialization');
    var storedKeywords = hiddenInput.value.trim();
    if (storedKeywords !== '') {
        keywords = storedKeywords.split(',');
    }

    // Function to update the hidden input value
    function updateHiddenInput() {
        hiddenInput.value = keywords.join(',');
    }

    // Function to generate the keyword list
    function generateKeywordList() {
        var keywordList = document.getElementById('keywordList');
        keywordList.innerHTML = '';

        keywords.forEach(function(keyword, index) {
            var span = document.createElement('div');
            span.classList.add("custom-tag");
            span.textContent = keyword;
            span.dataset.index = index;

            var deleteButton = document.createElement('button');
            deleteButton.classList.add('add-tag-btn');
            deleteButton.textContent = '\u2715';
            deleteButton.addEventListener('click', function() {
                deleteKeyword(index);
            });

            span.appendChild(deleteButton);
            keywordList.appendChild(span);
        });
    }

    // Function to add a keyword to the list
    function addKeyword(keyword) {
        keywords.push(keyword);
        generateKeywordList();
        updateHiddenInput();
    }

    // Function to delete a keyword from the list
    function deleteKeyword(index) {
        keywords.splice(index, 1);
        generateKeywordList();
        updateHiddenInput();
    }

    // Event handler for the Add Keyword button
    var addKeywordButton = document.getElementById('addKeywordButton');
    addKeywordButton.addEventListener('click', function(event) {
        event.preventDefault();
        var keywordInput = document.getElementById('keywordInput');
        var keyword = keywordInput.value.trim();

        if (keyword !== '') {
            addKeyword(keyword);
            keywordInput.value = '';
        }
    });

    // Event handler for pressing Enter in the keyword input
    var keywordInput = document.getElementById('keywordInput');
    keywordInput.addEventListener('keypress', function(event) {
        if (event.keyCode === 13) { // Enter key
            event.preventDefault();
            addKeywordButton.click();
        }
    });

    // Generate keyword list on page load
    generateKeywordList();
});



//summernote  
$('#about_textarea').summernote({
        placeholder: 'About us...',
        tabsize: 2,
        height: 120,
        fontNames: ['Montserrat'],
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          // ['table', ['table']],
          // ['insert', ['link', 'picture', 'video']],
          ['insert', ['link']],
          ['view', ['help']]
          // ['view', ['fullscreen', 'help']]
        ]
 });

 $('#reference_textarea').summernote({
        placeholder: 'Add Reference...',
        tabsize: 2,
        height: 120,
        fontNames: ['Montserrat'],
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          // ['table', ['table']],
          // ['insert', ['link', 'picture', 'video']],
          ['insert', ['link']],
          ['view', ['help']]
          // ['view', ['fullscreen', 'help']]
        ]
 });

 $('#achivement_textarea').summernote({
        placeholder: 'Add Reference...',
        tabsize: 2,
        height: 120,
        fontNames: ['Montserrat'],
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          // ['table', ['table']],
          // ['insert', ['link', 'picture', 'video']],
          ['insert', ['link']],
          ['view', ['help']]
          // ['view', ['fullscreen', 'help']]
        ]
 });

   //fetch all job tags...
   Object.keys(hembarecruiter_job_tags).forEach((prop)=>{
      document.querySelector("#industry").innerHTML += `<option id='${prop.toString()}' value='${prop.toString().toLowerCase().replace(/\s+/g, '-')}'> ${prop}</option>`;
  })

  function updateSubCategory(value){
      // console.log( hembarecruiter_job_tags["GENERAL SERVICES"]);
      value = value.toString().toUpperCase().replace(/-/g, ' ');
      document.querySelector("#role").innerHTML = "<option value='' selected>--Select Job Sub Sector--</option>";
      hembarecruiter_job_tags[`${value}`].forEach((val)=>{
          document.querySelector("#role").innerHTML += `<option value='${val.toString().toLowerCase().replace(/\s+/g, '-')}'> ${val}</option>`;
      })
  }

//close crop modal 
function closeCropModal(){
  document.querySelector('.modal-container').style.display = "none";
}

//reusable toast function
function Toast(message, color) {
  Toastify({
    text: message,
    duration: 3000,
    close: true,
    gravity: "top",
    position: "right",
    stopOnFocus: true,
    style: {
      background: color,
    },
  }).showToast();
}

window.addEventListener("load", function(){
  const inputElementId = 'profile_picture';
  const containerElementId = 'image-container';
  const options = {
    aspectRatio: 1,
    viewMode: 1,
    zoomable: false,
    cropBoxResizable: false,
    minCropBoxWidth: 300,
    minCropBoxHeight: 300,
    maxCropBoxWidth: 300,
    maxCropBoxHeight: 300,
    crop: function(e) {
        console.log(e.detail.x);
        console.log(e.detail.y);
        console.log(e.detail.width);
        console.log(e.detail.height);
        console.log(e.detail.rotate);
        console.log(e.detail.scaleX);
        console.log(e.detail.scaleY);
      }
  };
  createImageCropper(inputElementId, containerElementId, options);
})

//crop image 
function createImageCropper(inputElementId, containerElementId, options) {
  const inputElement = document.getElementById(inputElementId);
  const containerElement = document.getElementById(containerElementId);
  
  let cropper = null;
  
  inputElement.onchange = function(e) {
  // select the trigger button
  document.querySelector('.modal-container').style.display = "block";

    const file = e.target.files[0];
    

    if (!/^(image\/jpeg|image\/png|image\/gif)$/i.test(file.type)) {
      // console.error('Invalid file type. Only JPG, PNG, and GIF files are allowed.');
      Toast("Invalid file type. Only JPG, PNG, and GIF files are allowed", "#e63946");
      return;
    }

    if (file.size > 5 * 1024 * 1024) {
      // console.error('File size exceeds 5MB limit');
      Toast("File size exceeds 5MB limit", "#e63946");
      return;
    }
    
    const reader = new FileReader();
    
    reader.onload = function(e) {
      const img = new Image();
      img.src = e.target.result;
      
      containerElement.innerHTML = '';
      containerElement.appendChild(img);
      
      if (cropper) {
        cropper.destroy();
      }
      cropper = new Cropper(img, options);

      var cropBtn = document.getElementById('crop-btn');
      cropBtn.addEventListener('click', function() {
        var croppedImg = cropper.getCroppedCanvas().toDataURL();
        console.log(croppedImg);
        document.getElementById("profile-picture").src=croppedImg;
        document.getElementById("profile-picture-output").value = croppedImg;
        document.querySelector('.modal-container').style.display = "none";
        // Do something with croppedImg, like displaying it on the page or uploading it to a server
      });
  
    };
    
    reader.readAsDataURL(file);
  };
}



//update profile function
function UpdateProfile(event, f_data){
    event.preventDefault();
    let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    let profile_form = document.querySelector("#company_profile");
    let form_data = new FormData(profile_form);
    fetch('/subscriber/update-profile', {
        method: 'POST',
        body:form_data,
        headers: { 
            'X-CSRF-Token': '{{ csrf_token() }}'
            },
    })
    .then(response => response.json())
    .then(data => {
      // console.log(data);
      // return;
        if (data.errors) {
        // console.log(data.errors);
            Toast(data.errors, "red");
        } else if(data.status == "success") {
        // console.log('Data stored successfully');
            Toast('Data stored successfully', 'linear-gradient(to right, #00b09b, #96c93d)');
        } else if(data.status == "update") {
            Toast('Updated successfully', 'linear-gradient(to right, #00b09b, #96c93d)');
        }else{
            // console.log('Oops! Something went wrong. Try again');
            Toast(data.errors, "Oops! Something went wrong. Try again");
        }
    })
    .catch(error => {
        // Handle other errors
        console.error('An error occurred:', error);
    });
}

//swith profile tabs
function switchTab(tabIndex) {
  // Get all tab buttons and tab content elements
  var tabButtons = document.getElementsByClassName("tab-button");
  var tabContent = document.getElementsByClassName("tab");

  // Remove 'active' class from all tab buttons and tab content
  for (var i = 0; i < tabButtons.length; i++) {
    tabButtons[i].classList.remove("tab-active", "active");
    tabContent[i].classList.remove("tab-active");
  }

  // Add 'active' class to the selected tab button and tab content
  tabButtons[tabIndex].classList.add("tab-active", "active");
  tabContent[tabIndex].classList.add("tab-active");
}
    </script>