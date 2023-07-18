<x-app-layout>
    <!--banner-->
    <div class="px border row mb-3">
        <div class="col-sm-12">
            <div class="px-3 py-3">
                <h3 class="fw-bold text-center">Post Opportunities</h3>
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

        <div class="col-sm-5">
            <!--content-->
                    <!--page alert notice-->
                    @if(isset($edits))
                    <div class="alert alert-warning">
                        <span class='d-block mb-2'>You're currently in edit mode</span>
                        <a href="{{route('admin.opp')}}" class="btn btn-dark fw-bold">Create new post</a>
                    </div>
                    @endif

                    <!--post form-->
                    <div class="border px-3 py-3 rounded bg-white">
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

                        <h5 class='fw-bold mb-3'>Create Opportunites</h5>
                        <form 
                        @if(isset($edits))
                        action="{{route('admin.update.opp', ['id'=> $edits[0]->id])}}" 
                        @else
                        action="{{route('admin.store')}}" 
                        @endif
                        method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class='fw-bold'>Title</label>
                                <input type="text" name="title" class="form-control" 
                                placeholder="Enter title" value="{{ isset($edits[0]->title)? $edits[0]->title : old('title')}}">
                            </div>

                            <div class="mb-3">
                                <label class='fw-bold'>Description</label>
                                <textarea name="description" class='form-control' id="description" rows="3">{{ isset($edits[0]->description)? $edits[0]->description : old('description')}}</textarea>
                            </div>

                            <div class="mb-3">
                                <label class='fw-bold'>Deadline</label>
                                <input type="date" name="deadline" class="form-control" 
                                placeholder="Enter Deadline"  value="{{ isset($edits[0]->deadline)? $edits[0]->deadline : old('deadline')}}">
                            </div>

                            <div class="mb-3">
                                <label class='fw-bold'>Reference URL</label>
                                <input type="text" name="reference" class="form-control" 
                                placeholder="Enter source url"  value="{{ isset($edits[0]->source_url)? $edits[0]->source_url : old('reference')}}">
                            </div>

                            <div class="mb-3">
                                <label class='fw-bold'>Region - Optional</label>
                                <select class="form-select" id="region">
                                    {{-- onchange="updateInputField(this)" --}}
                                    <option value="">Select Region--</option>
                                    <option value="northern_africa">Northern Africa</option>
                                    <option value="eastern_africa">Eastern Africa</option>
                                    <option value="western_africa">Western  Africa</option>
                                    <option value="central_africa">Central Africa</option>
                                    <option value="southern_africa">Southern Africa</option>
                                </select>
                                <input type="text" name="region" id="selectedRegions" value="{{ isset($edits[0]->region)? $edits[0]->region : old('region')}}" readonly>
                                <div id="outputRegionsList"></div>
                            </div>
                            
                            <div class="mb-3">
                                <label class='fw-bold'>Country - Optional</label>
                                <select class="form-select" id="country" >
                                    @include('components.countrylist')
                                </select>
                                <input type="text" name="country" id="selectedCountries" value="{{ isset($edits[0]->country)? $edits[0]->country : old('country')}}" readonly>
                                <div id="outputCountriesList"></div>
                            </div>

                            <div class="mb-3">
                                <label class='fw-bold'>Continent - Optional</label>
                                <select class="form-select" id="continent" >
                                    <option selected="selected" value="global">Select Continent--</option>
                                    <option value="africa">Africa</option>
                                    <option value="antarctica">Antarctica</option>
                                    <option value="asia">Asia</option>
                                    <option value="europe">Europe</option>
                                    <option value="north_america">North America</option>
                                    <option value="australia">Australia (or Oceania/Australasia)</option>
                                    <option value="south_america">South America</option>
                                </select>
                                <input type="text" name="continent" id="selectedContinents" value="{{ isset($edits[0]->continent)? $edits[0]->continent : old('continent')}}" readonly>
                                <div id="outputContinentsList"></div>
                            </div>

                            <button class="btn btn-primary py-3 w-100 d-block">Create Opportunity</button>
                        </form>
                    </div>
                    <!---post form-->
                </div>
                <div class="col-sm-5">
                    <!--side menu-->
                    <div class="px-3 py-3 bg-white rounded border">
                        <!--post content-->
                    <div class="row">
                        @foreach($opp_posts as $posts)
                            <div class='col-sm-12 mb-3'>
                            <div class='px-3 py-3 border rounded'>
                                <p class='fw-bold m-0 p-0'>{{$posts->title}}</p>
                                <p>{!! $posts->description !!}</p>
                                
                                <ul>
                                    <li>{{$posts->region}}</li>
                                    <li>{{$posts->country}}</li>
                                    <li>{{$posts->continent}}</li>
                                </ul>

                                <a class='d-block text-decoration-none mb-3' 
                                target="_blank"
                                href='{{$posts->source_url}}'>{{$posts->source_url}}</a>
    
                                <ul class='list-inline'>
                                    <li class='list-inline-item'><a href='{{route('admin.edit.opp', ['id'=> $posts->id])}}'>Edit</a></li>
                                    <li class='list-inline-item'><a href='{{route('admin.delete.opp', ['id'=> $posts->id])}}'>Delete</a></li>
                                </ul>
                            </div>
                            </div>
                        @endforeach
    
                        <!--pagination-->
                        <div class="row">
                            <div class="col-sm-12">
                            {{$opp_posts->links()}}
                            </div>
                        </div>
                        <!--pagination-->
                    </div>
                    <!--side menu-->
                </div>
            <!--content-->
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
initializeSelect('region', 'selectedRegions', 'outputRegionsList');
initializeSelect('country', 'selectedCountries', 'outputCountriesList');
initializeSelect('continent', 'selectedContinents', 'outputContinentsList');
</script>