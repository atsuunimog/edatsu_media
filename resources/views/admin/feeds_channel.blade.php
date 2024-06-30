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
                    <h2 class="fw-bold  custom-title-garamond m-0 p-0 py-3">
                        Create Channel
                    </h2>
            </div>
            <!--banner-->

                        <!--page alert notice-->
                        @if(isset($edits))
                        <div class="alert alert-warning my-3">
                            <span class='d-block mb-2 fs-9'>You're currently in edit mode</span>
                            <a href="{{route('admin.opp')}}" class="btn btn-dark fw-bold fs-9 px-4">Create new post</a>
                        </div>
                        @endif

                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if($errors->any())
                            @foreach($errors->all() as $err)
                                <div class='alert alert-danger fs-9'>
                                    {{$err}}
                                </div>
                            @endforeach
                        @endif

                    <!--post form-->
                    <div class="px-3  bg-white my-3 py-3 rounded border">
                        <form 
                            @if(isset($edits))
                            action="{{route('admin.update.channel', ['id'=> $edits->id])}}" 
                            @else
                            action="{{route('admin.store.channel')}}" 
                            @endif
                            method="POST"  enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label class='mb-2'>Image:</label>
                                <input type="file" name="channel_img">
                            </div>

                            <div class="mb-3">
                                <label class='mb-2'>channel Name</label>
                                <input type="text" name="title" class="form-control" 
                                placeholder="Enter title" value="{{ isset($edits->channel_name)? $edits->channel_name : old('title')}}">
                            </div>

                            <div class="mb-3">
                                <label class=''>channel Description</label>
                                <span class='d-block text-secondary mb-2 fs-9'>Provide detailed description for this opportunity</span>
                                <textarea name="description" class='form-control' id="description" rows="3">{{ isset($edits->channel_description)? $edits->channel_description : old('description')}}</textarea>
                            </div>

                            <div class="mb-3">
                                <label class=''>Country</label>
                                <select id="country" name="country" 
                                    class="form-control">
                                    @if(isset($edits->country) && ($edits->country != '')):
                                    <option value="{{$edits->country}}">{{$edits->country}}</option>
                                    @else
                                    @include('components/countrylist')
                                    @endif
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class=''>Regions</label>
                                <select id="region" name="region" class="form-control">
                                @if(isset($edits->country) && ($edits->country != '')):
                                    <option value="{{$edits->region}}">{{$edits->region}}</option>
                                @else
                                    <option value="north-africa">North Africa</option>
                                    <option value="west-africa">West Africa</option>
                                    <option value="central-africa">Central Africa</option>
                                    <option value="east-africa">East Africa</option>
                                    <option value="southern-africa">Southern Africa</option>
                                    <option value="horn-of-africa">Horn of Africa</option>
                                    <option value="sahel">The Sahel</option>
                                @endif
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class=''>channel Url</label>
                                <span class='d-block text-secondary mb-2 fs-9'>Provide a link to learn more or apply for this opportunity</span>
                                <input type="text" name="channel_url" class="form-control" 
                                placeholder="Enter source url"  value="{{ isset($edits->channel_url)? $edits->channel_url : old('channel_url')}}">
                            </div>

                            <button class="btn btn-dark py-3 w-100 d-block fw-bold">
                                @if(isset($edits))
                                    Editing
                                @else
                                    Save Data
                                @endif
                            </button>
                        </form>
                    </div>
                    <!---post form-->
                </div>

                <div class="col-sm-3">
                <!--see all --post-->
                <div class=" bg-white px-3 py-3 my-3 border rounded">
                    <a href="" class="text-dark">
                        Manage Channels
                    </a>
                </div>
                <!--see all--post-->

                <!--post content-->
                <div class="row">
                    @if(isset($data))
                        @foreach($data as $channels)
                            <div class='col-sm-12 mb-3'>
                                <div class='px-3 pt-3 border rounded mb-3 bg-white'>
                                <img src="{{asset('storage/uploads/channels/'.$channels->channel_image)}}" class="img-fluid mb-3" />
                                    <p class="m-0"><strong>Title:</strong> {{$channels->channel_name}}</p>
                                    <p class="m-0"><strong>Country:</strong> </p>
                                    <p class="m-0"><strong>Regions:</strong> </p>
                                    <ul class='list-inline fs-8 mt-3'>
                                        <li class='list-inline-item'><a class='btn btn-dark fs-9  px-3 text-decoration-none' href='{{route('admin.edit.channel', ['id'=> $channels->id])}}'>Edit</a></li>
                                        <li class='list-inline-item'><a class='btn btn-dark fs-9  px-3 text-decoration-none' href='{{route('admin.delete.channel', ['id'=> $channels->id])}}'>Delete</a></li>
                                    </ul>
                                </div>
                            </div>
                        @endforeach
                    @endif
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
// initializeSelect('channel', 'selectedCategories', 'outputchannelList');
initializeSelect('region', 'selectedRegions', 'outputRegionsList');
initializeSelect('country', 'selectedCountries', 'outputCountriesList');
initializeSelect('continent', 'selectedContinents', 'outputContinentsList');
</script>