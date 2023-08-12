<x-app-layout>
    <!--banner-->
    <div class="px border row ">
        <div class="col-sm-12">
            <div class="px-3 py-5">
                <h3 class="fw-bold text-center">Post Events</h3>
            </div>
        </div>
    </div>
    <!--banner-->

    <div class="row">
        <div class="col-sm-2">
            <!--menu list-->
            @include('layouts.admin_side_menu')
             <!--menu list-->
        </div>

        <div class="col-sm-10">
            <!--content-->
            <div class="row">
                <div class="col-sm-6">
                       <!--page alert notice-->
                       @if(isset($edits))
                       <div class="alert alert-warning">
                        <span class='d-block mb-2'>You're currently in edit mode</span>
                        <a href="{{route('admin.opp')}}" class="btn btn-dark fw-bold">Create new event</a>
                       </div>
                       @endif
   
                       <!--post form-->
                       <div class="px-3 py-3 my-3 bg-white">
                           @if($errors->any())
                                   @foreach($errors->all() as $err)
                                   <div class='alert alert-danger'>
                                       {{$err}}
                                   </div>
                                   @endforeach
                           @endif
   
                           @if (session('status'))
                               <div class="alert alert-success">
                                   {{ session('status') }}
                               </div>
                           @endif

                    <!--post form-->
                        <h5 class='fw-bold mb-3'>Create Events</h5>
                        <form 
                            @if(isset($edits))
                                action="{{route('admin.update.ev', ['id'=> $edits[0]->id])}}" 
                            @else
                                action="{{route('admin.store.ev')}}" 
                            @endif

                         method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class='fw-bold'>Title</label>
                                <input type="text" name="title" class="form-control" 
                                value="{{ isset($edits[0]->title)? $edits[0]->title : old('title')}}"
                                placeholder="Enter title">
                            </div>
                            <div class="mb-3">
                                <label class='fw-bold'>Description</label>
                                <textarea name="description" class='form-control' id="description">{{ isset($edits[0]->description)? $edits[0]->description : old('description')}}</textarea>
                            </div>

                            <div class="mb-3">
                            <label class='fw-bold'>Event Type</label>
                            <select class="form-select fs-9" name="event_type" id="event_type">
                                <option value="in_person">In-Person Gatherings</option>
                                <option value="virtual">Virtual Gatherings</option>
                                <option value="hybrid">Hybrid Events (Combining Online and Offline)</option>
                            </select>  
                            </div>                          

                            <div class="mb-3">
                                <label class='fw-bold'>Location/venue</label>
                                <textarea name="location" class='d-block form-control' id="location">{{ isset($edits[0]->location)? $edits[0]->location : old('location')}}</textarea>
                            </div>

                            <div class="mb-3">
                                <label class='fw-bold'>Event Date</label>
                                <small class="mb-2 text-secondary d-block">If event is more than 1 day, enter start date here</small>
                                <input type="date" class='form-control' name="event_date" 
                                value="{{ isset($edits[0]->event_date)? $edits[0]->event_date : old('event_date')}}"
                                class="form-control">
                            </div>

                            <div class="mb-3">
                                <label class='fw-bold'>Event Time</label>
                                <input type="time" name="event_time" 
                                value="{{ isset($edits[0]->event_time)? $edits[0]->event_time : old('event_date')}}"
                                class="form-control">
                            </div>

                            <div class="mb-3">
                                <label class='fw-bold'>Alternate Dates</label>
                                <input type="date" id="datePicker" class="form-control">
                                <button id="addDateButton" type="button" class="btn btn-primary mt-2">Add Date</button>
                                <div id="selectedDates" class="mt-2">
                                    <!-- Selected dates will be displayed here -->
                                </div>
                                <input type="hidden" name="alternate_dates" id="alternateDatesInput">
                            </div>
                            

                            <div class="mb-3">
                                <label class='fw-bold'>Reference URL</label>
                                <small class='d-block mb-2 '> Reference url is optional when we start creating business pages</small>
                                <input type="text" name="reference" class="form-control" 
                                placeholder="Enter title"  value="{{ isset($edits[0]->source_url)? $edits[0]->source_url : old('reference')}}">
                            </div>

                            <div class="mb-3">
                                <label class=''>Categories</label>
                                <span class='d-block text-secondary mb-2 fs-9'>Add categories</span>
                                <select class="form-select fs-9" id="category">
                                    @include('components.categorylist')
                                </select>
                                <input type="hidden" name="category" id="selectedCategories" value="{{ isset($edits[0]->category)? $edits[0]->category : old('category')}}" readonly>
                                <div id="outputCategoryList"></div>
                            </div>

                            <div class="mb-3">
                                <label class=''>Country</label>
                                <span class='d-block text-secondary mb-2 fs-9'>Select a country</span>
                                <select class="form-select fs-9" id="country" >
                                    @include('components.countrylist')
                                </select>
                                <input type="hidden" name="country" id="selectedCountries" value="{{ isset($edits[0]->country)? $edits[0]->country : old('country')}}" readonly>
                                <div id="outputCountriesList"></div>
                            </div>        

                            <div class="mb-3">
                                        <label class=''>Region</label>
                                        <span class='d-block text-secondary mb-2 fs-9'>Select a region</span>
                                        <select class="form-select fs-9" id="region">
                                            <option value="">Select Region</option>
                                            <option value="north_africa">North Africa</option>
                                            <option value="west_africa">West Africa</option>
                                            <option value="central_africa">Central Africa</option>
                                            <option value="east_africa">East Africa</option>
                                            <option value="southern_africa">Southern Africa</option>
                                            <option value="sahel_region">Sahel Region</option>
                                        </select>
                                        <input type="hidden" name="region" id="selectedRegions" value="{{ isset($edits[0]->region)? $edits[0]->region : old('region')}}" readonly>
                                        <div id="outputRegionsList"></div>
                                    </div>

                                    <div class="mb-3">
                                        <label class=''>Continent</label>
                                        <span class='d-block text-secondary mb-2 fs-9'>Select a continent</span>
                                        <select class="form-select fs-9" id="continent" >
                                            <option value="global">Select Continent</option>
                                            <option value="africa">Africa</option>
                                            <option value="antarctica">Antarctica</option>
                                            <option value="asia">Asia</option>
                                            <option value="europe">Europe</option>
                                            <option value="north_america">North America</option>
                                            <option value="oceania">Oceania</option>
                                            <option value="south_america">South America</option>
                                        </select>
                                        <input type="hidden" name="continent" id="selectedContinents" value="{{ isset($edits[0]->continent)? $edits[0]->continent : old('continent')}}" readonly>
                                        <div id="outputContinentsList"></div>
                                    </div>

                            <button class="btn btn-dark  py-3 w-100 d-block">Create Event</button>
                        </form>
                    </div>
                    <!---post form-->
                </div>
                <div class="col-sm-6">
                      <!--search filter-->
                      <form class="pt-3" method="GET" id="search_keyword" onsubmit='submitSearchQuery()'>
                        <div class="row">
                            <div class="col-sm-9 col-12">
                                <div class='mb-3'>
                                <input type='text' class="form-control py-3 fs-9 text-secondary" name="search_keyword" placeholder="Search Keywords" id="keyword">
                                </div>
                            </div>
                            <div class="col-sm-3 col-12">
                                <div class='mb-3'>
                                <button class="text-decoration-none btn btn-dark border-0 px-4 py-3 shadow-sm w-100">Search</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!--search filter-->
                    
                     <!--post content-->
                     <div class="row">
                        @foreach($ev_posts as $posts)
                            <div class='col-sm-12 mb-3'>
                            <div class='px-3 py-3 border rounded bg-white mb-3'>
                                <p class='fw-bold mb-0'>{{$posts->title}}</p>
                                
                                <a class='d-block text-decoration-none mb-3'
                                target="_blank"
                                href='{{$posts->source_url}}'>{{$posts->source_url}}</a>
    
                                <ul class='list-inline'>
                                    <li class='list-inline-item'><a class='btn btn-dark fs-9' href='{{route('admin.edit.ev', ['id'=> $posts->id])}}'>Edit</a></li>
                                    <li class='list-inline-item'><a class='btn btn-dark fs-9' href='{{route('admin.delete.ev', ['id'=> $posts->id])}}'>Delete</a></li>
                                    <li class='list-inline-item'>0</li>
                                </ul>
                            </div>
                            </div>
                        @endforeach
    
                        <!--pagination-->
                        <div class="row">
                            <div class="col-sm-12">
                            {{$ev_posts->links()}}
                            </div>
                        </div>
                        <!--pagination-->
                        </div>
                        <!--post content-->
                </div>
            </div>
            <!--content-->
        </div>
    </div>
</x-app-layout>
<script>
    //summernote  
$('#description').summernote({
  placeholder: 'About us...',
  tabsize: 2,
  height: 120,
  fontNames: ['Montserrat'],
  toolbar: [
    ['style', ['style']],
    ['font', ['bold', 'underline', 'clear']],
    ['color', ['color']],
    ['para', ['ul', 'ol', 'paragraph']],
    ['insert', ['link']],
  ],
  callbacks: {
    onPaste: function (e) {
     // Get the pasted content as plain text
     var pastedText = (e.originalEvent || e).clipboardData.getData('text/plain');

    // Convert the pasted content to HTML with the desired font style
    var convertedHtml = '<span style="font-family: Poppins, sans-serif;">' + pastedText + '</span>';

    // Insert the converted content into the editor
    $(this).summernote('pasteHTML', convertedHtml);

    // Prevent the default paste behavior
    e.preventDefault();
    }
  }
});


//
function initializeSelect(selectId, inputId, outputId) {
    const selectElement = document.getElementById(selectId);
    const inputField = document.getElementById(inputId);
    const outputList = document.getElementById(outputId);


    function updateInputField() {
        console.log('works');
        const selectedOptions = Array.from(selectElement.selectedOptions).map(option => option.value);
        const existingValues = inputField.value.split(',').map(value => value.trim());
        const uniqueValues = [...new Set([...existingValues, ...selectedOptions])];
        inputField.value = uniqueValues.filter(Boolean).join(', ');
        updateOutputList(uniqueValues);
    }

    function updateOutputList(values) {
        outputList.innerHTML = '';

        values.forEach(value => {
            const trimmedValue = value.trim();

            if (trimmedValue !== '') {
                const listItem = document.createElement('div');
                listItem.textContent = trimmedValue;

                const deleteButton = document.createElement('button');
                deleteButton.textContent = 'Delete';
                deleteButton.addEventListener('click', () => {
                    removeItem(trimmedValue);
                    listItem.remove();
                });

                listItem.appendChild(deleteButton);
                outputList.appendChild(listItem);
            }
        });
    }

    function removeItem(value) {
        const existingValues = inputField.value.split(',').map(val => val.trim());
        const updatedValues = existingValues.filter(val => val !== value);
        inputField.value = updatedValues.join(', ');
        updateOutputList(updatedValues);

        // Set the selectId to a default option
        selectElement.selectedIndex = 0;
    }

    selectElement.addEventListener('change', updateInputField);
}

// Example usage
initializeSelect('category', 'selectedCategories', 'outputCategoryList');
initializeSelect('region', 'selectedRegions', 'outputRegionsList');
initializeSelect('country', 'selectedCountries', 'outputCountriesList');
initializeSelect('continent', 'selectedContinents', 'outputContinentsList');

//MULTIPLE DATE PICKER FUNCTION 
const datePicker = document.getElementById("datePicker");
    const addDateButton = document.getElementById("addDateButton");
    const selectedDatesContainer = document.getElementById("selectedDates");
    const alternateDatesInput = document.getElementById("alternateDatesInput");
    
    const selectedDates = [];

    addDateButton.addEventListener("click", function() {
        const selectedDate = datePicker.value;
        
        if (selectedDate && !selectedDates.includes(selectedDate)) {
            selectedDates.push(selectedDate);
            updateSelectedDatesList();
        }
        
        datePicker.value = ""; // Clear the date picker after adding
    });

    function updateSelectedDatesList() {
        selectedDatesContainer.innerHTML = "";
        
        selectedDates.forEach((date, index) => {
            const dateItem = document.createElement("div");
            dateItem.innerHTML = `
                <span>${date}</span>
                <button type="button" class="btn btn-sm btn-danger ms-2"
                        onclick="removeDate(${index})">Delete</button>
            `;
            selectedDatesContainer.appendChild(dateItem);
        });

        alternateDatesInput.value = selectedDates.join(","); // Store dates in the hidden input
    }

    function removeDate(index) {
        selectedDates.splice(index, 1);
        updateSelectedDatesList();
    }











</script>
