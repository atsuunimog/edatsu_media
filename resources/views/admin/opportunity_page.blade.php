<x-app-layout>
<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <!--menu list-->
            @include('layouts.admin_side_menu')
             <!--menu list-->
        </div>

        <div class="col-sm-6">

        
            <!--banner-->
            <div class="px-3 py-3 rounded border text-center bg-white my-3">
                    <h2 class="fw-bold  custom-title-garamond m-0 p-0 py-3">Post Opportunites</h2>
            </div>
            <!--banner-->

            <!--content-->
                        <!--page alert notice-->
                        @if(isset($edits))
                        <div class="alert alert-warning my-3">
                            <span class='d-block mb-2 fs-9'>You're currently in edit mode</span>
                            <a href="{{route('admin.opp')}}" class="btn btn-dark fw-bold fs-9 px-4">Create new post</a>
                        </div>
                        @endif

                        @if($errors->any())
                                @foreach($errors->all() as $err)
                                <div class='alert alert-danger fs-9'>
                                    {{$err}}
                                </div>
                                @endforeach
                        @endif

                        @if (session('status'))
                            <div class="alert alert-success fs-9">
                                {{ session('status') }}
                            </div>
                        @endif

                    <!--post form-->
                    <div class="px-3  bg-white my-3 py-3 rounded border">
                        <form 
                        @if(isset($edits))
                        action="{{route('admin.update.opp', ['id'=> $edits[0]->id])}}" 
                        @else
                        action="{{route('admin.store')}}" 
                        @endif
                        method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class='mb-2'>Title</label>
                                <input type="text" name="title" class="form-control" 
                                placeholder="Enter title" value="{{ isset($edits[0]->title)? $edits[0]->title : old('title')}}">
                            </div>

                            <div class="mb-3">
                                <label class=''>Description</label>
                                <span class='d-block text-secondary mb-2 fs-9'>Provide detailed description for this opportunity</span>
                                <textarea name="description" class='form-control' id="description" rows="3">{{ isset($edits[0]->description)? $edits[0]->description : old('description')}}</textarea>
                            </div>

                            <div class="mb-3">
                                <label class=''>Deadline</label>
                                <span class='d-block text-secondary mb-2 fs-9'>Add a deadline for this opportunity *</span>
                                <input type="date" name="deadline" class="form-control fs-9" 
                                placeholder="Enter Deadline"  value="{{ isset($edits[0]->deadline)? $edits[0]->deadline : old('deadline')}}">
                            </div>

                            <div class="mb-3">
                                <label class=''>URL/Reference Link</label>
                                <span class='d-block text-secondary mb-2 fs-9'>Provide a link to learn more or apply for this opportunity</span>
                                <input type="text" name="reference" class="form-control" 
                                placeholder="Enter source url"  value="{{ isset($edits[0]->source_url)? $edits[0]->source_url : old('reference')}}">
                                {{-- <small class='my-1 d-block text-danger'>
                                Optional in future: allow business to cerate events page to apply directly on the platform. Use a url shortner or 
                                improve the url validation to accept querys
                                </small> --}}
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class=''>Categories</label>
                                        <span class='d-block text-secondary mb-2 fs-9'>Add categories</span>
                                        <select class="form-select fs-9" id="category">
                                            @include('components.categorylist')
                                        </select>
                                        <input type="hidden" name="category" id="selectedCategories" value="{{ isset($edits[0]->category)? $edits[0]->category : old('category')}}" readonly>
                                        <div id="outputCategoryList"></div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
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
                                </div>
                            </div>
                           
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class=''>Country</label>
                                        <span class='d-block text-secondary mb-2 fs-9'>Select a country</span>
                                        <select class="form-select fs-9" id="country" >
                                            @include('components.countrylist')
                                        </select>
                                        <input type="hidden" name="country" id="selectedCountries" value="{{ isset($edits[0]->country)? $edits[0]->country : old('country')}}" readonly>
                                        <div id="outputCountriesList"></div>
                                    </div>        
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class=''>Continent</label>
                                        <span class='d-block text-secondary mb-2 fs-9'>Select a continent</span>
                                        <select class="form-select fs-9" id="continent" >
                                            <option value="">Select Continent</option>
                                            <option value="global">Global</option>
                                            <option value="africa">Africa</option>
                                            <option value="antarctica">Antarctica</option>
                                            <option value="asia">Asia</option>
                                            <option value="europe">Europe</option>
                                            <option value="north_america">North America</option>
                                            <option value="australia">Australia (or Oceania/Australasia)</option>
                                            <option value="south_america">South America</option>
                                        </select>
                                        <input type="hidden" name="continent" id="selectedContinents" value="{{ isset($edits[0]->continent)? $edits[0]->continent : old('continent')}}" readonly>
                                        <div id="outputContinentsList"></div>
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-dark py-3 w-100 d-block fw-bold">Create</button>
                        </form>
                    </div>
                    <!---post form-->
                </div>


                <div class="col-sm-3">
                <!--see all --post-->
                <div class=" bg-white px-3 py-3 my-3 border rounded">
                    <a href="" class="text-dark">Manage Posts</a>
                </div>
                <!--see all --post-->

                <!--post content-->
                <div class="row">
                @foreach($opp_posts as $posts)
                    <div class='col-sm-12 mb-3'>
                    <div class='px-3 pt-3 border rounded mb-3 bg-white'>
                        <p class='fw-bold m-0 mb-3 p-0 fs-8'>{{$posts->title}}</p>

                        <ul class='list-inline fs-8'>
                            <li class='list-inline-item'><a class='btn btn-dark fs-9  px-3 text-decoration-none' href='{{route('admin.edit.opp', ['id'=> $posts->id])}}'>Edit</a></li>
                            <li class='list-inline-item'><a class='btn btn-dark fs-9  px-3 text-decoration-none' href='{{route('admin.delete.opp', ['id'=> $posts->id])}}'>Delete</a></li>
                            <li class='list-inline-item'>views {{$posts->views}}</li>
                        </ul>
                    </div>
                @endforeach
                </div>
                    <!--side menu-->
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
</script>